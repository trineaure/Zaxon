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
            
        if($page == "chooseTreatment")
           {
            $this->getAllTreatments();
//            $this->render("chooseTreatment");
           }
           
        }
        
        
 
        
    public function getAllTreatments() {
        $treatmentModel = $GLOBALS["treatmentModel"];
        $allTreatments = $treatmentModel->getAll();
        $data = array("allTreatments" => $allTreatments);
        return $this->render("chooseTreatment", $data);
    }
    
}