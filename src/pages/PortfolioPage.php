<?php

class PortfolioPage extends Page {

    const NAME = "PORTFOLIO";

    public function __construct() {
        parent::__construct(self::NAME, "Portfolio");

        $this->setContent(new Template("Portfolio"));
    }
    
    public function main($args) {
        $this->output();
    }

}

?>
