<?php

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

require 'src/router.php';
$router = new Router();

$router->get('/', ['controller' => 'home', 'action' => 'index']);
$router->get('/products', ['controller' => 'products', 'action' => 'index']);

$params = $router->match($path);

if($params == false) {
    exit("Page not found");
}

$action = $params['action'];
$controller = $params['controller'];

require "src/controllers/$controller.php";


$controller_object = new $controller();

$controller_object->$action();

