<?php
namespace app\lib;

class Router
{
    protected $routers;
    protected $params;
    public $url = [];

    public function __construct()
    {
        $this->routers = require 'config\routers.php';
        foreach ($this->routers as $url => $path) {
            $this->url = $url;
        }
    }

    public function add()
    {

    }

    public function match()
    {

    }

    public function run()
    {
        print_r($this->url);
    }
}
