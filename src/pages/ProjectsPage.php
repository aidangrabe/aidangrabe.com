<?php

class ProjectsPage extends Page {

    const NAME = "PROJECTS";

    public function __construct() {
        parent::__construct(self::NAME, "Projects");

        $this->setContent(new Template("Projects"));
    }
    
    public function main($args) {

        $template = null;
        $db = new DB();
        $db->connect();

        switch (count($args)) {
        default:
        case 0:
            // show all the Projects
            $sql = "
                SELECT *
                FROM projects
                ORDER BY lang
            ";
            $res = $db->query($sql);
            $lang = "";
            $languages = array();
            while ($row = $res->fetch_assoc()) {
                // if this language has not been seen before, add a key to
                // the array
                if (!array_key_exists($row['lang'], $languages)) {
                    $languages[$row['lang']] = array();
                }
                // add this project to the array of this language
                $languages[$row['lang']][] = array(
                    "name" => $row['name'],
                    "description" => $row['description'],
                    "image" => $row['image'],
                    "link" => App::joinPaths("projects",
                        $row['lang'], $row['name'])
                );
            }

            $template = new Template("Projects", array(
                "languages" => $languages
            ));
            break;
        case 2:

            // show a single Project
            $lang = $db->escape($args[0]);
            $name = $db->escape($args[1]);
            $sql = "
                SELECT * FROM projects WHERE name='{$name}' AND lang='{$lang}'
            ";
            $res = $db->query($sql);
            $row = $res->fetch_assoc();
            $row['image'] = App::getResource($row['image']);

            $template = new Template("Project", $row);

            break;
        }

        $this->setContent($template);
        $this->output();
    }

}

?>
