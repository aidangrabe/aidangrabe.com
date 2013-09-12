<?php

interface RouterInterface {

    public function addRoute($src, $dst);
    public function run();

}

?>
