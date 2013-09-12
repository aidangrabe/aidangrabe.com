<?php

require "interfaces/RouterInterface.php";

class Router implements RouterInterface {
    
    private $args;
    private $controllerDir;
    private $controller;
    private $defaultRoute;
    private $root;
    private $routes;

    public function __construct($root = "/", $controllerDir = __DIR__) {
        $this->root = $root;
        $this->controllerDir = $controllerDir;
    }

    public function addRoute($src, $dst) {
        $this->routes[$src] = $dst;
    }

    public function defRoute($src, $dst) {
        $this->defaultRoute = $dst;
        $this->addRoute($src, $dst);
    }

    private function parseUri() {
        $uri = $_SERVER['REQUEST_URI'];
        //$this->root = "/";
        $uri = ltrim(substr($uri, strlen($this->root), strlen($uri)), "/");
    
        $args = explode("/", $uri);
        $this->controller = $args[0];
        $this->args = array_slice($args, 1);

    }

    public function run() {
        $this->parseUri();
        $route = "";

        if (!empty($this->routes)
                && array_key_exists($this->controller, $this->routes)) {
            $route = $this->routes[$this->controller];
        } else {
            $route = $this->defaultRoute;
        }

        $controller = App::joinPaths($this->controllerDir, $route) . ".php";
        if (is_readable($controller)) {
            require $controller;
            $reflector = new ReflectionClass(basename($controller, ".php"));
            $c = $reflector->newInstance();
            $c->main($this->args);
        } else {
            throw new Exception("Controller not found: {$controller}");
        }
    }

}

?>
