<?php

class reservation_treatmentModel {
    
    private $dbConn;
    private $addStmt;
    private $resStmt;
    //private $selAll;
    //private $selByNr;
    
    const TABLE = "Reservation_treatment";
    const INSERT_QUERY = "INSERT INTO " . reservation_treatmentModel::TABLE . " (Reservation_number, Treatment_Name) VALUES (:Reservation_number, :Treatment_Name)";
    const RESERVATION_QUERY = "SELECT ". reservation_treatmentModel::TABLE .".Reservation_number, Treatment_Name, EmployeeID, Reservation_Date, Time_of_Day
                              FROM ". reservation_treatmentModel::TABLE ."
                              LEFT JOIN ". reservation_treatmentModel::TABLE .".Reservation_number=Reservation.Reservation_number;";
   // const SELECT_ALL_QUERY = "SELECT * FROM " . reservation_treatmentModel::TABLE;
    //const SELECT_BY_NR_QUERY = "SELECT Treatment_Name FROM " . reservation_treatmentModel::TABLE . " WHERE Reservation_number = :Reservation_number";
    
    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(reservation_treatmentModel::INSERT_QUERY);
        $this->resStmt = $this->$dbConn->prepare(reservation_treatmentModel::RESERVATION_QUERY);
        //$this->selAll = $this->dbConn->prepare(reservation_treatmentModel::SELECT_ALL_QUERY);
        //$this->selByNr = $this->dbConn->prepare(reservation_treatmentModel::SELECT_BY_NR_QUERY);
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
    
    /*
     * Returns all the information a member needs to see for his reservation. 
     */
    public function getReservationInfo() {
        $this->resStmt->execute();
        return $this->selStmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}