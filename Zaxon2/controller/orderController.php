<?php

require_once("tempController.php");

//Represents home page
class orderController extends tempController {
    /**
     * Render "Home" View
     *@param string $page
     */
    public function show($page) {
        $this->render("order");
    }
    
}