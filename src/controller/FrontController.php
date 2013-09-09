<?php

namespace controller;

use 
    controller\interfaces\Controller,
    model\App;

class FrontController {

    const DEFAULT_CONTROLLER = "_404Controller";

    private $controller;
    private $params;

    public function __construct($options = array()) {
        if (!empty($options)) {
            $this->setController($options['controller']);
            $this->setParams($options['params']);
        } else {
            $this->parseUri();
        }
    }

    public function parseUri() {
        $uri = ltrim(substr($_SERVER["REQUEST_URI"], strlen(App::getRoot()),
                    strlen($_SERVER["REQUEST_URI"])), '/');
        $uriParts = explode("/", $uri);
        $this->setController($uriParts[0]);

        $params = array();
        for ($i = 1; $i < count($uriParts); $i++) {
            $params[] = $uriParts[$i];
        }
        $this->setParams($params);
    }
    
    public function run() {
        $controller = new $this->controller;
        $controller->main($this->params);
    }

    public function setController($controller) {
        $controller = ucfirst($controller) . "Controller";
        $controller = \ClassLoader::getClassFromPath("/controller/${controller}");
        if (!is_readable(\ClassLoader::getClassFromNamespace($controller))) {
            $controller = \ClassLoader::getClassFromPath("/controller/" . self::DEFAULT_CONTROLLER);
        }
        $this->controller = $controller;

    }

    public function setParams($params) {
        $this->params = $params;
    }

}

?>
