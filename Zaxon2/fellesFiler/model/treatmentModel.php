<?php

class treatmentModel {
    
    private $dbConn;
    private $selAll;
    private $selByCat;
    private $selByTreat;
    private $updPrice;
   
    
    const TABLE = "Treatment";
    const SELECT_ALL_QUERY = "SELECT * FROM " .treatmentModel::TABLE;
    const SELECT_ALL_BY_CAT_QUERY = "SELECT * FROM " .treatmentModel::TABLE . " WHERE Category_Name = ?";
    const SELECT_ALL_BY_TREA_QUERY = "SELECT * FROM " . treatmentModel::TABLE . " WHERE Treatment_Name = ?";
    const UPDATE_P_QUERY = "UPDATE " . treatmentModel::TABLE . " SET Price = :Price  WHERE Treatment_Name =:Treatment_Name";
    
    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->selAll = $this->dbConn->prepare(treatmentModel::SELECT_ALL_QUERY);
        $this->selByCat = $this->dbConn->prepare(treatmentModel::SELECT_ALL_BY_CAT_QUERY);
        $this->updPrice = $this->dbConn->prepare(treatmentModel::UPDATE_P_QUERY);
        $this->selByTreat = $this->dbConn->prepare(treatmentModel::SELECT_ALL_BY_TREA_QUERY);
    }
    
    /**
     * Update the price in the db.
     * @param String $updatePrice, $Category_Name,$updateTreatment
     * @return bool <b>TRUE</b> on success or <b>FALSE</b> on failure.
     */
    public function updatePricelist($updatePrice, $Treatment ) {
        
        return $this->updPrice->execute(array(
            ":Price" => $updatePrice,
            ":Treatment_Name" => $Treatment,
                ));   
    }
    
    /**
     * 
     * @return an array in associative arrays.
     */
    public function getAll() {
        $this->selAll->execute();
        return $this->selAll->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * 
     * @param String $category
     * @return type
     */
    public function getByCategory($category) {
         $this->selByCat->execute(array($category));
        return $this->selByCat->fetchAll(PDO::FETCH_ASSOC);   
    }
    
    
    /**
     * 
     * @param string $treatment
     * @return array with the price that matches the Price.
     */
    public function getByTreatment($treatment) {
        $this->selByTreat->execute(array($treatment));
        return $this->selByTreat->fetchAll(PDO::FETCH_ASSOC);
    }
}