<?php

/*
*   Router class to save routes and redirect the user.
*   GET uri's are saved on the GET array
*   POST uri's are saved on the POST array
*/

class Router {

    protected $database;
    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    function __construct($database) {
        $this->database = $database;
    }

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
            return $this->call_action(
                ...explode('@', $this->routes[$type][$uri])
            );
        }

        throw new Exception('404 no route defined!');
    }

    protected function call_action($controller, $action) {
        return (new $controller($this->database))->$action();
    }

}

?>
