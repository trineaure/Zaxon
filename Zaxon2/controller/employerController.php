<?php

require_once("tempController.php");

//Represents home page
class employerController extends tempController {
    /**
     * Render "Home" View
     *@param string $page
     */
    public function show($page) {
        if($page == "employerAdd")
            {
            $this ->render("employerAdd");
            }
        }
    
}

