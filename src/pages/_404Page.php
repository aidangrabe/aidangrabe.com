<?php

class _404Page extends Page {

    public function __construct() {
        parent::__construct("HOME", "404");

        header('HTTP/1.0 404 Not Found');
        if (isset($_SERVER["HTTP_REFERER"])) die();

        $content = "<h1>404</h1>";
        $content .= "<p>That's a 404!</p>";

        $this->setContent($content);
    }
    
    public function main($args) {
        $this->output();
    }

}

?>
