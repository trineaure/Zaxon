<?php

require_once("tempController.php");

//Represents home page
class aboutusController extends tempController {

    /**
     * Render "Home" View
     * @param string $page
     */
    public function show($page) {

        switch ($page) {

            case($page == "aboutus"):
                $this->render("aboutus");
                break;
        }
    }
}
    