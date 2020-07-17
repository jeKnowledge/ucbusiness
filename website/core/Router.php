<?php

/*
*   Router class to save routes and redirect the user.
*   GET uri's are saved on the GET array
*   POST uri's are saved on the POST array
*/

class Router {

    protected $database;
    protected $translations;
    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    function __construct($database, $translations) {
        $this->database = $database;
        $this->translations = $translations;
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

        require 'views/templates/error.php';
    }

    protected function call_action($controller, $action) {
        return (new $controller($this->database, $this->translations))->$action();
    }

}

?>
