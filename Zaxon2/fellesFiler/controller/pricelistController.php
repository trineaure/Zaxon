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
             //   $this->showPricelist();
                $this->treatmentCategory();
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
    public function updatePricelist() {

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

    /*
     * Returns an array with the all the treatments organized by category.
     * The categorys are the keys for other arrays wich contains the treatments.
     */
    public function treatmentCategory() {
        $categorysWithTreatments = array();
        $allCategorys = $this->getAllCats();
        foreach ($allCategorys as $category) {
            $treatmentsByCat = $this->getTreatByCat($category["Category_Name"]);
            $categorysWithTreatments [$category["Category_Name"]] = $treatmentsByCat;
        }
        $GLOBALS["catsWithTreatments"] = $categorysWithTreatments;
        return $this->render("pricelist");
    }

    /*
     * Returns all the categorys stored in the database
     */
    public function getAllCats() {
        $categoryModel = $GLOBALS["categoryModel"];
        $allCategorys = $categoryModel->getAll();
        return $allCategorys;
    }

    /*
     * Returns all the treatments from a chosen category
     */
    public function getTreatByCat($category) {
        $treatmentModel = $GLOBALS["treatmentModel"];
        $treatmentsByCat = $treatmentModel->getByCategory($category);
        return $treatmentsByCat;
    }

}
