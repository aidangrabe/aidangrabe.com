<?php

require "src/App.php";
require "dbconf.php";

App::setRoot(ROOT);
App::setResourcePath("/res");
App::setIncludePath(__FILE__, "/src");

// nav menu
$nav = array(
    "Home" => "",
    "Projects" => "projects",
    "Portfolio" => "portfolio",
    "Links" => "links"
);
App::set("nav", $nav);

$router = new Router(App::getRoot(),
    App::joinPaths(App::getIncludePath(), "pages"));

$router->defRoute("404", "_404Page");
$router->addRoute("", "IndexPage");
foreach ($nav as $label => $link) {
    if ($link == "") $link = "index";
    $router->addRoute($link, ucfirst($link) . "Page");
}
$router->addRoute("cv", "ResumePage");
$router->addRoute("resume", "ResumePage");

$router->run();
?>
