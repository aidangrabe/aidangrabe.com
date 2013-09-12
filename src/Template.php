<?php

class Template {
    
    private $data;
    private $template;

    public function __construct($template, $data = array()) {
        $this->template = App::joinPaths(
            App::getIncludePath(), 'templates', $template . ".php");
        if (!is_readable($this->template)) {
            throw new Exception("Template {$this->template} not found");
        }
        $this->data = $data;
    }

    public function set() {
        $args = func_get_args();
        switch (count($args)) {
        case 1:
            $this->data = array_merge($this->data, $args[0]);
            break;
        case 2:
            $this->data[$args[0]] = $args[1];
            break;
        default:
            throw new Exception("Incorrect number of arguments to function.");
            return;
        }
    }

    public function output() {
        extract($this->data);
        require $this->template;
    }

    public function __toString() {
        $this->output();
        return '';
    }

}

?>
