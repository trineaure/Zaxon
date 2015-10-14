<?php

require_once("tempController.php");

//Represents home page
class homController extends tempController {
    /**
     * Render "Home" View
     *@param string $page
     */
    public function show($page) {
        $this->render("home");
    }
    
}