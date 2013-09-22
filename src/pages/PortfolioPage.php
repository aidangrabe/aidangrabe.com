<?php

class PortfolioPage extends Page {

    const NAME = "PORTFOLIO";
    const TABLE_NAME = "portfolio";

    public function __construct() {
        parent::__construct(self::NAME, "Portfolio");
    }
    
    public function main($args) {
        $db = new DB();
        $db->connect();

        $sql = "
            SELECT *
            FROM " . self::getPortfolioTableName() . "
            ORDER BY title
        ";

        $projects = array();
        $res = $db->query($sql);
        while ($row = $res->fetch_assoc()) {
            $row['image'] = App::getResource(
                App::joinPaths("img", "portfolio", $row['image']));
            $row['description'] = preg_replace(
                "/\<br \/\>\s+\<br \/\>/", "</p><p>",
                nl2br($row['description']));
            $projects[] = $row;
        }

        $this->setContent(new Template("Portfolio", array(
            "projects" => $projects
        )));
        $this->output();
    }

    public static function getPortfolioTableName() {
        return DBConf::TABLE_PREFIX . self::TABLE_NAME;
    }

}

?>
