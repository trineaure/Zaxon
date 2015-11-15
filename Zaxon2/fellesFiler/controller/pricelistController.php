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
                $this->showPricelist();
                break;
            
            case($page == "updatePricelist"):
                $this->getPricelistUpdate();
                break;
           
            case($page == "updatePricelistAction"):
                $this->updatePricelist();
                break;  
        }
    }
    
    /**
     * Update the pricelist.
     * @return Render to the new page updatePricelist 
     */
    public function getPricelistUpdate() {
        
        $treatmentModel = $GLOBALS["treatmentModel"];
        $treatment_Name = filter_input(INPUT_POST, "Treatment_Name");
    
        $GLOBALS["treatment"] = $treatmentModel->getByTreatment($treatment_Name);
               
        return $this->render("updatePricelist");
    }
    
    /**
     * Update the price in the pricelist.
     * Get the new input values from an external variable.
     * @return render to the new page pricelist. 
     */
    public function updatePricelist(){
        
        $treatmentModel = $GLOBALS["treatmentModel"];
        // set the values in the $update.
        $updatePrice = filter_input(INPUT_POST, 'Price');
        $Treatment = filter_input(INPUT_POST, 'Treatment_Name');
       
        $treatmentModel->updatePricelist($updatePrice, $Treatment);
        $this->showPricelist();       
    }

 /**
  * Show the pricelist from the db.
  * @return render to the page pricelist and return the $data
  * with the $pricelist and shows it on the page.
  */
   public function showPricelist() {
       
       $treatmentModel = $GLOBALS["treatmentModel"];
    
       $pricelist = $treatmentModel->getAll();
       $data = array("pricelist" => $pricelist);
       return $this->render("pricelist", $data);
   }
}
