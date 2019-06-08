<?php
namespace app\core;

class Router
{
    protected $routers;
    protected $params;
    public $url_params = [];

    public function __construct()
    {
        $routers_arr = require 'config\routers.php';
        foreach ($routers_arr as $url => $path) {
            $this->add($url, $path);
        }
    }

    // Преобразуем роутер в регулярное выражение
    public function add($route, $params)
    {
        $route = "/^" . $route . "$/";
        $this->routers[$route] = $params;
    }

    public function match()
    {
        // убираем слеш перед юрлом
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routers as $route => $params) {
            // Проверяем REQUEST_URI и роутер через регулярное выражение
            if (preg_match($route, $url, $matches)) {
                if (count($matches) > 1) {
                    foreach ($matches as $key => $value) {
                        if ($key != 0) {
                            $this->url_params[] = $value;
                        }
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function run()
    {
        if ($this->match()) {
            // разбиваем параметр на контроллер и экшен
            $params = preg_split('/\//', $this->params);
            if (count($params) == 2) {
                $controller_path = "app\controllers\\" . ucfirst($params[0]) . "Conroller";
                // Проверяем на существование класса, он же контроллер
                if (class_exists($controller_path)) {
                    $action = 'action' . ucfirst($params[1]);
                    // Проверяем на существование метода в нашем контроллере, он же экшен
                    if (method_exists($controller_path, $action)) {
                        // Создаем экземпляр класса (controller)
                        $controller = new $controller_path($route = $params, $this->url_params);
                        // Вызываем в нем метод (action)
                        $controller->$action();
                    } else {
                        // TODO: Настроить 404
                        echo 'Не найден экшен: ' . $action;
                    }
                } else {
                    // TODO: Настроить 404
                    echo 'Не найден контроллер: ' . $controller_path;
                }
            } else {
                // TODO: Настроить 404
                echo 'Параметр в конфиге роутера указан не правильно. Должен быть такого вида : "controller/action". <br> Сейчас '. $this->params;
            }
        }
    }
}
