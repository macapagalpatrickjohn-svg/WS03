<?php 
    define('BASE_PATH', dirname(__DIR__));
    require BASE_PATH . '/helpers.php';

   
    require basePath('Router.php');

    $router = new Router();

   $routes = require basePath('routes.php');

    $uri = $_SERVER['REQUEST_URI'];

    $method = $_SERVER['REQUEST_METHOD'];
    // loadView('home');
   $router->route($uri, $method);

?>