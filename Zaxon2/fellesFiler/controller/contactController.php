<?php

require_once("tempController.php");

//Represents home page
class contactController extends tempController {
    /**
     * Render "Home" View
     *@param string $page
     */
    public function show($page) {
        if($page == "contact")
            {
            $this ->render("contact");
            }
        }
    
}