<?php


class empoyeeModel {
    /** @var PDO */
    private $dbConn;

    const TABLE = "Empolyee";
    const SELECT_QUERY = "SELECT * FROM " . empoyeeModel::TABLE;
    const INSERT_QUERY = "INSERT INTO " . empoyeeModel::TABLE . " (name) VALUES (:name)";

    /** @var PDOStatement Statement for selecting all entries */
    private $selStmt;
    /** @var PDOStatement Statement for adding new entries */
    private $addStmt;

    //Constructor for the class employeeModel
    /*
     * @param $dbConn - The connection to the database
     */
    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(empoyeeModel::INSERT_QUERY);
        $this->selStmt = $this->dbConn->prepare(empoyeeModel::SELECT_QUERY);
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
    public function add($fName, $lName, $birth, $Phone_Number, $Home_Address, $Zip_Code, $Login_Password) { /*Confirm_Password er tatt vekk, da det ikke skal i db */
        return $this->addStmt->execute(array("First_name", "Last_name", "Birth", "Phone_Number", "Home_Address", "Zip_Code", "Login_Password"
                                            => $fName, $lName, $birth, $Phone_Number, $Home_Address, $Zip_Code, $Login_Password ));
    }

    
}