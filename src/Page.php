<?php

class Page {
    
    protected $template;

    public function __construct($page, $title) {

        $links = App::get("nav");
        foreach ($links as $label => $link) {
            $links[$label] = App::joinPaths(
                App::getRoot(), $link);
        }

        $nav = new Template("Nav");
        $nav->set(array(
            "links" => $links,
            "link_sel" => $page
        ));

        $this->template = new Template("Wrapper");
        $this->template->set(array(
            "title" => $title,
            "nav" => $nav
        ));
    }

    public function setContent($content) {
        $this->template->set(array(
            "content" => $content
        ));
    }

    public function output() {
        $this->template->output();
    }

}

?>
