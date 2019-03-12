<?php
use app\lib\Dev;
use app\core\Router;

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Подключаем автозагрузчик PSR-4
require  __DIR__ . '../vendor/autoload.php';

session_start();

// $dev = new Dev;

$router = new Router;
$router->run();
