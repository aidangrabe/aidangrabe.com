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

    public function getDescription($charLimit = 0) {
        $desc = preg_replace("/\<br \/\>\s+\<br \/\>/", "</p><p>", 
                nl2br($this->description));
        if ($charLimit > 0) {
            $desc = strip_tags($desc);
            $strippedLength = strlen($desc);
            if ($strippedLength > $charLimit) {
                $desc = substr($desc, 0, $charLimit);
                $desc = substr($desc, 0, strrpos($desc, " "));
                if (strlen($desc) < $strippedLength) $desc .= "...";
            }
        }
        return $desc;
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
