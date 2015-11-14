<?php

require_once("tempController.php");

//Represents home page
class pricelistController extends tempController {

    /**
     * Render "Home" View
     * @param string $page
     */
    public function show($page) {

        switch ($page) {

            case($page == "pricelist"):
                $this->render("pricelist");
                break;
        }
    }

}
