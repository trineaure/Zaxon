<?php

class reservationModel {
    /** @var PDO */
    private $dbConn;

    const TABLE = "Reservation";
    const SELECT_ALL_QUERY = "SELECT * FROM " . reservationModel::TABLE;
    const INSERT_QUERY = "INSERT INTO " . reservationModel::TABLE . " (Reservation_Date, Time_of_Day, Membership_number, EmployeeID) VALUES (:Reservation_Date,:Time_of_Day, :Membership_number, :EmployeeID)";

    /** @var PDOStatement Statement for selecting all entries */
    private $selStmt;
    /** @var PDOStatement Statement for adding new entries */
    private $addStmt;

    //Constructor for the class reservationModel
    /*
     * @param $dbConn - The connection to the database
     */
    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(reservationModel::INSERT_QUERY);
        $this->selStmt = $this->dbConn->prepare(reservationModel::SELECT_ALL_QUERY);
    }

    /**
     * Get all employee stored in the DB
     * @return array in associative form
     */
    public function getAll() {
        // Fetch all employee as associative arrays
        $this->selStmt->execute();
        return $this->selStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Try to add a new customer
     *
     * @param $name
     *
     * @return bool true on success, false otherwise
     */
        public function add($givenReservation_date,$givenTime, $givenMembership_number, $givenEmployeeID) {
        return $this->addStmt->execute(array("Reservation_Date"=> $givenReservation_date,"Time_of_Day" => $givenTime,"Membership_number" => $givenMembership_number, "EmployeeID" => $givenEmployeeID));
    }

    
}