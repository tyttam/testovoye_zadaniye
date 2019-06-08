<?php
use app\lib\Dev;
use app\core\Router;

// Подключаем функционал для разработки
require 'lib/Dev.php';
// Подключаем автозагрузчик PSR-4
require  __DIR__ . '../vendor/autoload.php';

session_start();

$router = new Router;
$router->run();
