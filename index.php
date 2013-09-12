<?php

require "src/App.php";
require "dbconf.php";

App::setRoot("/aidan");
App::setResourcePath("/res");
App::setIncludePath(__FILE__, "/src");
//set_include_path(App::getIncludePath());

$router = new Router(App::getRoot(),
    App::joinPaths(App::getIncludePath(), "pages"));

$router->defRoute("home", "IndexPage");
$router->addRoute("projects", "ProjectsPage");
$router->addRoute("portfolio", "PortfolioPage");
$router->addRoute("links", "LinksPage");

$router->run();
?>
