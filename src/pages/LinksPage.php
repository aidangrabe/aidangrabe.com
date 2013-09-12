<?php

class LinksPage extends Page {

    const NAME = "LINKS";

    public function __construct() {
        parent::__construct(self::NAME, "Links");

        $this->setContent(new Template("Links"));
    }
    
    public function main($args) {
        $this->output();
    }

}

?>
