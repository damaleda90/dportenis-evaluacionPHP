<?php
namespace App\Core;
class Router {
    private $routes = [];

    public function get($uri, $action) {
        $this->routes['GET'][$uri] = $action;
    }

    public function post($uri, $action) {
        $this->routes['POST'][$uri] = $action;
    }

    public function direct($uri, $method) {
        if (isset($this->routes[$method][$uri])) {
            [$controller, $method] = explode('@', $this->routes[$method][$uri]);
            require __DIR__ . '/../controllers/' . $controller . '.php';
            return (new $controller)->$method();
        }
        http_response_code(404);
        echo "404 Not Found";
    }
}