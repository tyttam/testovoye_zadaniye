<?php
namespace app\core;

use app\core\View;

class Controller
{
    public $view;

    public function __construct($route)
    {
        $this->view = new View($route);
    }
}
