<?php
namespace app\core;

class View
{
    public $path;
    public $layout = 'main';

    public function __construct($route)
    {
        $this->path = $route;
    }

    public function render($view, $vars = [])
    {
        extract($vars);
        if (file_exists('views/' . $this->path[0] . '/' . $view . '.php')) {
            ob_start();
            require 'views/' . $this->path[0] . '/' . $view . '.php';
            $content = ob_get_clean();
            require 'views/layout/' . $this->layout . '.php';
        } else {
            // Исправить !!!
            echo "Не найден вид: " . $this->path[0] . '/' . $view . '.php';
        }
    }
}
