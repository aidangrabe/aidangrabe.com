<?php

namespace view;

use \model\App;

class View {

    private $data;
    private $view;

    public function __construct($view, $data = array()) {
        $this->data = $data;
        $this->view = \ClassLoader::getClassFromPath("view/{$view}");
        $this->view = \ClassLoader::getClassFromNamespace($this->view);
        if (!is_readable($this->view)) {
            throw new \Exception("View <b>{$view}</b> not found");  # TODO
        }
    }
    
    public function output() {
        extract($this->data);
        require $this->view;
    }

    public function __toString() {
        $this->output();
    }

}

?>
