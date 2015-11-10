<?php

class reservation_treatmentModel {
    
    private $dbConn;
    private $addStmt;
    private $resStmt;
    
    const TABLE = "Reservation_treatment";
    const INSERT_QUERY = "INSERT INTO " . reservation_treatmentModel::TABLE . " (Reservation_number, Treatment_Name) VALUES (:Reservation_number, :Treatment_Name)";
    const RESERVATION_QUERY = " SELECT ". reservation_treatmentModel::TABLE .".Reservation_number, Treatment_Name, Reservation_Date, Time_of_Day, Employee.First_Name "
                              . " FROM ". reservation_treatmentModel::TABLE  
                             . " INNER JOIN Reservation ON ". reservation_treatmentModel::TABLE .".Reservation_number = Reservation.Reservation_number "
                              . " INNER JOIN Employee ON Reservation.EmployeeID = Employee.EmployeeID "
                            . " WHERE Reservation.Membership_number = :memberID "
                            . " ORDER BY Reservation_Date DESC ";

    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(reservation_treatmentModel::INSERT_QUERY);
        $this->resStmt = $this->dbConn->prepare(reservation_treatmentModel::RESERVATION_QUERY);
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
     * Returns an array with all the members reservations. 
     * The array contains: Reservation number, Treatment name, EmployeeID, Reservation date, Time of Day
     * @param $memberID The membership ID number.
     * @return Array with reservations
     */
    public function getReservationInfo($memberID) {
        $this->resStmt->execute(array(":memberID" => $memberID));
        return $this->resStmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}