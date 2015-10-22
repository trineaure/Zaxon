<?php

class treatmentModel {
    
    private $dbConn;
    private $selAll;
    
    const TABLE = "Treatment";
    const SELECT_ALL_QUARY = "SELECT * FROM " .treatmentModel::TABLE;
    
    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->selAll = $this->dbConn->prepare(treatmentModel::SELECT_ALL_QUARY);
    }
    
    public function getAll() {
        $this->selAll->execute();
        return $this->selAll->fetchAll(PDO::FETCH_ASSOC);
    }
}