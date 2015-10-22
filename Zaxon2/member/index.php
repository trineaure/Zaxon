<?php

//View layer - The same header for all pages
require ("view/header.html");

// Global config
require_once("config.php");

// Model layer - Database Functions
require_once("model/db.php");

//Controller layer - select page to display (controller will handle it)
//This will select necesseary $template and &data
require_once("controller/allControllers.php");
require_once("controller/router.php");

$router = new Router();
$controller = $router->getController();
if ($controller instanceof tempController) {
    //Show page content
    $controller->show($router->getPage());
}

//View layer - The same footer for all pages
 require("view/footer.html");  
