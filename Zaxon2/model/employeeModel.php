<?php


class employeeModel {
    /** @var PDO */
    private $dbConn;

    const TABLE = "Employee";
    const SELECT_ALL_QUERY = "SELECT * FROM " . employeeModel::TABLE;
    const INSERT_QUERY = "INSERT INTO " . employeeModel::TABLE . "(First_name, Last_name, Birth, Phone_Number, Home_Address, Zip_Code, Login_Password) VALUES (:First_name, :Last_name, :Birth, :Phone_Number, :Home_Address, :Zip_Code, :Login_Password)";
    const SELECT_QUERY = "SELECT Phone_Number FROM " . employeeModel::TABLE;
    
    /** @var PDOStatement Statement for selecting all entries */
    private $selStmt;
    /** @var PDOStatement Statement for adding new entries */
    private $addStmt;
    
    private $selNumber;

    //Constructor for the class employeeModel
    /*
     * @param $dbConn - The connection to the database
     */
    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(employeeModel::INSERT_QUERY);
        $this->selStmt = $this->dbConn->prepare(employeeModel::SELECT_ALL_QUERY);
        $this->selNumber = $this->dbConn->prepare(employeeModel::SELECT_QUERY);
        
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
//    public function add($fName, $lName, $birth, $Phone_Number, $Home_Address, $Zip_Code, $Login_Password) { /*Confirm_Password er tatt vekk, da det ikke skal i db */
//        return $this->addStmt->execute(array("First_name", "Last_name", "Birth", "Phone_Number", "Home_Address", "Zip_Code", "Login_Password"
//                                            => $fName, $lName, $birth, $Phone_Number, $Home_Address, $Zip_Code, $Login_Password ));
//    }
    
    public function add($givenF_Name, $givenL_Name, $givenBirth, $givenPhone_Number, $givenHome_Address, $givenZip_Code, $givenLogin_Password ) {
        return $this->addStmt->execute
                (array("First_name"=> $givenF_Name, 
                        "Last_name"=> $givenL_Name,
                        "Birth" => $givenBirth, 
                        "Phone_Number" => $givenPhone_Number, 
                        "Home_Address"=> $givenHome_Address,
                        "Zip_Code"=> $givenZip_Code, 
                        "Login_Password"=> $givenLogin_Password));
    }
    
 public function getAllNumbers()
    {
        $this->selNumber->execute();
        return $this->selNumber->fetchAll(PDO::FETCH_ASSOC);
    }

    
}