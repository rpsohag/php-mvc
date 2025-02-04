<?php

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

spl_autoload_register(function (string $class_name) {
    require "src/". str_replace('\\', '/', $class_name) . ".php";
});
$router = new Framework\Router();

$router->get('/', ['controller' => 'home', 'action' => 'index']);
$router->get('/products', ['controller' => 'products', 'action' => 'index']);

$params = $router->match($path);

if($params == false) {
    exit("Page not found");
}

$action = $params['action'];
$controller = "App\Controllers\\" . ucwords($params['controller']);


$controller_object = new $controller();

$controller_object->$action();

