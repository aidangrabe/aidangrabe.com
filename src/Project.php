<?php

class Project {

    private $lang;
    private $name;
    private $image;
    private $description;
    private $link;

    // path to image directory, relative to resource directory
    const IMG_PATH = "img/projects";
    
    public function __construct($row) {
        $this->name = $row['name'];
        $this->description = $row['description'];
        $this->image = $this->getImagePath($row['image']);
        $this->lang = $row['lang'];
        $this->link = App::joinPaths("projects", $row['lang'], $row['name']);
    }

    public function getDescription() {
        return $this->description;
    }

    public function getImage() {
        return $this->image;
    }

    private function getImagePath($path) {
        return App::getResource(App::joinPaths(self::IMG_PATH, $path));
    }

    public function getLang() {
        return $this->lang;
    }

    public function getLink() {
        return $this->link;
    }

    public function getName() {
        return $this->name;
    }

}

?>
