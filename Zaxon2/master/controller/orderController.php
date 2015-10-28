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
            $this->treatCat();
//            $this->render("chooseTreatment");
           }
           
        }
        
        
 
        
    public function getAllTreatments() {
        $treatmentModel = $GLOBALS["treatmentModel"];
        $allTheTreatments = $treatmentModel->getAll();
        //$data = array("allTheTreatments" => $allTheTreatments);
        return $allTheTreatments;
    }
    
    public function getAllCategorys() {
        $categoryModel = $GLOBALS["categoryModel"];
        $allCategorys = $categoryModel->getAll();
        return $allCategorys;
//$data2 = array("allCategorys" => $allCategorys);
        //return $data2;
        //return $this->render("testTreatment", $data2);
    }
    
    
    public function treatCat() {
        $categorysWithTreatments = array();
        $allCategorys = $this->getAllCategorys();
        foreach($allCategorys as $category) {
            $treatmentsByCat = $this->getTreatmentsByCat($category["Category_Name"]);
           $categorysWithTreatments [ $category["Category_Name"]] =  $treatmentsByCat;
        }
        $GLOBALS["categorysWithTreatments"] = $categorysWithTreatments;
        
                
        return $this->render("chooseTreatment");
    }
    
    public function getTreatmentsByCat($category) {
        $treatmentModel = $GLOBALS["treatmentModel"];
        $treatmentsByCat = $treatmentModel->getByCategory($category);
        //$data3 = array("treatmentsByCat" => $treatmentsByCat );
        //return $data3;
        return $treatmentsByCat;
        //return $this->render("testTreatment", $data3);
    }
}