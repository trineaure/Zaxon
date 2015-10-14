<?php

require_once("tempController.php");

//Represents home page
class pricelistController extends tempController {
    /**
     * Render "Home" View
     *@param string $page
     */
    public function show($page) {
        $this->render("pricelist");
    }
    
}