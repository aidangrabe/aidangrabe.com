<?php

class IndexPage extends Page {

    const NAME = "HOME";

    public function __construct() {
        parent::__construct(self::NAME, "Home");

        $content = new Template("Home");

        $this->setContent($content);
    }
    
    public function main($args) {
        $this->output();
    }

}

?>
