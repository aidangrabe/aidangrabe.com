<?php

namespace controller;

use 
    \controller\interfaces\Controller,
    \view\View;

class TestController implements Controller {

    private $wrapper;
    
    public static function main() {
        $args = func_get_args();

        $data = [
            "title" => "Test Page",
            "content" => "Hello There!"
        ];

        $view = new View("Wrapper", $data);
        $view->output();
    }

}

?>
