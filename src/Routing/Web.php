<?php
namespace UHA\Routing;

class Web {
    protected $routes = []; 

    public function addRoute(string $method, string $url, \Closure $target) {
        $this->routes[$method][$url] = $target;
    }

    public function processRequest() {
        $method = $_SERVER['REQUEST_METHOD'];
        $url = $_SERVER['REQUEST_URI'];
        if (isset($this->routes[$method])) {
            foreach ($this->routes[$method] as $routeUrl => $target) {
                if ($routeUrl === $url) {
                   echo call_user_func($target);
                }
            }
            exit;
        }
        throw new \Exception('Route not found');
    }
}










?>