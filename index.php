<?php

require 'src/ClassLoader.php';

use 
    controller\FrontController,
    model\App;

$classLoader = new ClassLoader();
$classLoader->register();

App::setRoot("/aidan");
//App::setPath();

$frontController = new FrontController();
$frontController->run();

?>
