<?php

class categoryModel {
    
    private $dbConn;
    private $selAll;
    
    const TABLE = "Treatment_category";
    const SELECT_ALL_QUARY = "SELECT * FROM " .categoryModel::TABLE;
    
    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->selAll = $this->dbConn->prepare(categoryModel::SELECT_ALL_QUARY);
    }
    
    public function getAll() {
        $this->selAll->execute();
        return $this->selAll->fetchAll(PDO::FETCH_ASSOC);
    }
}

