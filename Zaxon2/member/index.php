<?php
//MEMBER

//sjekker om session er startet eller ikke
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//checks if a Member Are Logged In
if ((!isset($_SESSION["MemberAreLoggedIn"]) || ($_SESSION["MemberAreLoggedIn"])  != true))
{   session_destroy();
    header("Location:../guest/?page=login");
     return;
}


//View layer - The same header for all pages
require ("view/header.html");

// Global config
require_once("../fellesFiler/config.php"); //kan hende at skråstrekene (pathen) er feil...

// Model layer - Database Functions
require_once("../fellesFiler/model/db.php");

//Controller layer - select page to display (controller will handle it)
//This will select necesseary $template and &data
require_once("../fellesFiler/controller/allControllers.php");
require_once("controller/router.php");

$router = new Router();
$controller = $router->getController();
if ($controller instanceof tempController) {
    //Show page content
    $controller->show($router->getPage());
}

//View layer - The same footer for all pages
 require("view/footer.html");  
