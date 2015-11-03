<?php

class reservation_treatmentModel {
    
    private $dbConn;
    private $addStmt;
    private $selAll;
    private $selByNr;
    
    const TABLE = "Reservation_treatment";
    const INSERT_QUERY = "INSERT INTO " . reservation_treatmentModel::TABLE . " (Reservation_number, Treatment_Name) VALUES (:Reservation_number, :Treatment_Name)";
    const SELECT_ALL_QUERY = "SELECT * FROM " . reservation_treatmentModel::TABLE;
    const SELECT_BY_NR_QUERY = "SELECT Treatment_Name FROM " . reservation_treatmentModel::TABLE . " WHERE Reservation_number = :Reservation_number";
    
    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(reservation_treatmentModel::INSERT_QUERY);
        $this->selAll = $this->dbConn->prepare(reservation_treatmentModel::SELECT_ALL_QUERY);
        $this->selByNr = $this->dbConn->prepare(reservation_treatmentModel::SELECT_BY_NR_QUERY);
    }
    
    /*
     * Adds all the chosen treament to the database with the same reservation Number. 
     */
    public function addTreatmentsToRes($resNr, $treatNames) {
 
        foreach ($treatNames as $treatment) {
            $success = $this->addStmt->execute(array(":Reservation_number" => $resNr, ":Treatment_Name" => $treatment));

        }
        
        return $success;
    }
    
}