<?php 
    define('BASE_PATH', dirname(__DIR__));

    require __DIR__ . '/../vendor/autoload.php';
    require '../helpers.php';

    use Framework\Router;

    $router = new Router();
    $routes = require basePath('routes.php');

    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $method = $_SERVER['REQUEST_METHOD'];
    // loadView('home');
   $router->route($uri, $method);

?>