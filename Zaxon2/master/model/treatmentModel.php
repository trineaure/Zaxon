<?php

class treatmentModel {
    
    private $dbConn;
    private $selAll;
    private $selByCat;
    
    const TABLE = "Treatment";
    const SELECT_ALL_QUARY = "SELECT * FROM " .treatmentModel::TABLE;
     const SELECT_ALL_BY_CAT_QUARY = "SELECT * FROM " .treatmentModel::TABLE . " WHERE Category_Name = ?";
    
    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->selAll = $this->dbConn->prepare(treatmentModel::SELECT_ALL_QUARY);
        $this->selByCat = $this->dbConn->prepare(treatmentModel::SELECT_ALL_BY_CAT_QUARY);
    }
    
    public function getAll() {
        $this->selAll->execute();
        return $this->selAll->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getByCategory($category) {
         $this->selByCat->execute(array($category));
        return $this->selByCat->fetchAll(PDO::FETCH_ASSOC);
    }
}