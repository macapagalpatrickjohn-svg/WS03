<?php
//   $routes = require basePath('routes.php');

//    if (array_key_exists($uri, $routes)) {
//         require basePath($routes[$uri]);
//     } else {
//         http_response_code(404);
//         require basePath($routes['404']);
//     }

class Router {  
    protected $routes = [];

    public function registerRoute($method, $uri, $controller) {
            $this->routes []= [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller
        ];
    }
    /**
     * add get route 
     * 
     * @param string $uri
     * @param string $controller
     * return void
     * 
     */

    public function get(string $uri, string $controller) {
    $this->registerRoute('GET', $uri, $controller);
    }

        /**
     * add post route 
     * 
     * @param string $uri
     * @param string $controller
     * return void
     * 
     */

    public function post(string $uri, string $controller) {
        $this->registerRoute('POST', $uri, $controller);
    }

        /**
     * add put route 
     * 
     * @param string $uri
     * @param string $controller
     * return void
     * 
     */

    public function put(string $uri, string $controller) {
        $this->registerRoute('PUT', $uri, $controller);
    }

        /**
     * add delete route 
     * 
     * @param string $uri
     * @param string $controller
     * return void
     * 
     */

    public function delete(string $uri, string $controller) {
        $this->registerRoute('DELETE', $uri, $controller);
    }

            /**
     * load error page  
     * 
     * @param int $httpCode
     * return void
     * 
     */

    public function error(int $httpCode = 404) {
        http_response_code($httpCode);
        loadView("error/{$httpCode}");
        exit;
    }

    /**
     * Route the request 
     * 
     * @param string $uri
     * @param string $method
     * return void
     * 
     */
    public function route(string $uri, string $method) {
        foreach($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                require basePath($route['controller']);
                return;
            }
        }
       $this->error();

    }
}
?>