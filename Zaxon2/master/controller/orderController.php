<?php

require_once("tempController.php");

//Represents home page
class orderController extends tempController {
    /**
     * Render "Home" View
     *@param string $page
     */
    public function show($page) {
        if($page == "order")
            {
            $this ->render("order");
            }
        }
        
        
    public function getAllTreatments() {
        $treatmentModel = $GLOBALS["treatmentModel"];
        $allTreatments = $treatmentModel->getAll();
        $data = array("allTreatments" => $allTreatments);
        return $this->render("chooseTreament", $data);
    }
    
}