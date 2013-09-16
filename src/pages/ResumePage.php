<?php

class ResumePage extends Page {

    public function __construct() {
        parent::__construct("HOME", "Resume (CV)");

        $this->setContent(new Template("Resume"));
    }

    public function main($args) {
        $this->output();
    }

}

?>
