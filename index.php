<?php
use app\lib\Dev;
use app\lib\Router;

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Подключаем автозагрузчик PSR-4
require  __DIR__ . '../vendor/autoload.php';

$dev = new Dev;
$router = new Router;

$router->run();
