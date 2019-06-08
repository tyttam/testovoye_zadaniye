<?php
namespace app\core;

use app\core\View;

class Controller
{
    public $route;
    public $view;

    public function __construct($route, $url_params)
    {
        $this->route = $route;
        /**
         * [$this->url_params [хранит дополнительные значения url'a]]
         */
        $this->url_params = $url_params;
        $this->view = new View($route);
    }

    public function referer($rout_ref)
    {
        header("Location: " . $rout_ref);
    }

}
