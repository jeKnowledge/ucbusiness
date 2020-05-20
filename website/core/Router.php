<?php

class Router {

    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    public function get($definitions) {
        foreach ($definitions as $uri => $controller) {
            $this->routes['GET'][$uri] = $controller;
        }
    }

    public function post($definitions) {
        foreach ($definitions as $uri => $controller) {
            $this->routes['POST'][$uri] = $controller;
        }
    }

    public function direct($uri, $type) {
        if (array_key_exists($uri, $this->routes[$type])) {
            return $this->routes[$type][$uri];
        }

        throw new Exception('404 no route defined!');
    }

}
