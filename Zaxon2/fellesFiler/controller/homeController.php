<?php

require_once("tempController.php");

//Represents home page
class homeController extends tempController {

    /**
     * Render "Home" View
     * @param string $page
     */
    public function show($page) {

        switch ($page) {
            case($page == "home"):
                $this->render("home");
                break;
        }
    }
}
    