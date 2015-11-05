<?php

class employeeModel {

    /** @var PDO */
    private $dbConn;

    const TABLE = "Employee";
    const SELECT_ALL_QUERY = "SELECT * FROM " . employeeModel::TABLE;
    const INSERT_QUERY = "INSERT INTO " . employeeModel::TABLE . " (First_name, Last_name, Birth, Phone_Number, Home_Address, Zip_Code, Login_Password, Extended_Access) VALUES (:First_name, :Last_name, :Birth, :Phone_Number, :Home_Address, :Zip_Code, :Login_Password, :Extended_Access)";
    const SELECT_QUERY = "SELECT Phone_Number FROM " . employeeModel::TABLE;
    const SELECT_ONE_EMPLOYEE = "SELECT * FROM " . employeeModel::TABLE . " WHERE EmployeeID = :EmployeeID";
    const SEARCH_QUERY = "SELECT * FROM " . employeeModel::TABLE . " WHERE Phone_Number LIKE :search OR EmployeeID LIKE :searchE OR First_name LIKE :searchFN OR Last_name LIKE :searchLN OR Birth LIKE :searchB";
    const DELETE_QUERY = "DELETE FROM " . employeeModel::TABLE . " WHERE EmployeeID = ?";
    const UPDATE_QUERY = "UPDATE " . employeeModel::TABLE . " SET First_name = :First_name, Last_name = :Last_name, Birth = :Birth, Phone_Number = :Phone_Number, Home_Address = :Home_Address, Zip_Code = :Zip_Code WHERE EmployeeID = :EmployeeID";

    /** @var PDOStatement Statement for selecting all entries */
    private $selStmt;

    /** @var PDOStatement Statement for adding new entries */
    private $addStmt;
    // select one number in the database.
    private $selNumber;
    // select one query in the database
    private $selOne;
    // select one employee bu the EmployeeID
    private $selEmployee;
    // search on query in the database. 
    private $search;
    // delete on query in the database. 
    private $delete;
    // update on query in the database.
    private $update;

    //Constructor for the class employeeModel
    /*
     * @param $dbConn - The connection to the database
     */
    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(employeeModel::INSERT_QUERY);
        $this->selStmt = $this->dbConn->prepare(employeeModel::SELECT_ALL_QUERY);
        $this->selNumber = $this->dbConn->prepare(employeeModel::SELECT_QUERY);
        $this->selEmployee = $this->dbConn->prepare(employeeModel::SELECT_ONE_EMPLOYEE);
        $this->search = $this->dbConn->prepare(employeeModel::SEARCH_QUERY);
        $this->delete = $this->dbConn->prepare(employeeModel::DELETE_QUERY);
        $this->update = $this->dbConn->prepare(employeeModel::UPDATE_QUERY);
    }

    /**
     * Update information about the employee in the database.
     * @param type $updateFirst_name,$updateLast_name,$updateBirth,$updatePhone_Number,$updateHome_Address
     * @param type $updateZip_Code,$EmployeeID
     */
    public function updateEmployee($updateFirst_name, $updateLast_name, $updateBirth, $updatePhone_Number, $updateHome_Address, $updateZip_Code, $EmployeeID){
       
        return $this->update->execute(array(
            ":First_name" => $updateFirst_name,
            ":Last_name" => $updateLast_name,
            ":Birth" => $updateBirth,
            ":Phone_Number" => $updatePhone_Number,
            ":Home_Address" => $updateHome_Address,
            ":Zip_Code" => $updateZip_Code,
            ":EmployeeID" => $EmployeeID         
        ));
    }
    
    /**
     * Deletes an employee from the database.
     * @param type $deleteEmployee
     * @return type
     */
    public function deleteEmployee($deleteEmployee) {

        return $this->delete->execute(array($deleteEmployee));
    }
    
/**
 * Search through the employees in the database.
 * @param type $searchKeyword
 * @return type
 */
    public function searchEmployee($searchKeyword) {

        $this->search->execute(array(":search" => "%$searchKeyword%",
            ":search" => "%$searchKeyword%",
            ":searchLN" => "%$searchKeyword%",
            ":searchFN" => "%$searchKeyword%",
            ":searchB" => "%$searchKeyword%",
            ":searchE" => "%$searchKeyword%"
        ));
        return $this->search->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Get one Employee by the employeeID
     * @param type $employeeID
     * @return type
     */
    public function getOneByEmployeeID($EmployeeID) {
        $this->selEmployee->execute(array(
            ":EmployeeID" => $EmployeeID
        ));
        return $this->selEmployee->fetch(PDO::FETCH_ASSOC);
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
    public function add($givenF_Name, $givenL_Name, $givenBirth, $givenPhone_Number, $givenHome_Address, $givenZip_Code, $givenLogin_Password, $givenExtended_Access) {
        return $this->addStmt->execute
                        (array("First_name" => $givenF_Name,
                    "Last_name" => $givenL_Name,
                    "Birth" => $givenBirth,
                    "Phone_Number" => $givenPhone_Number,
                    "Home_Address" => $givenHome_Address,
                    "Zip_Code" => $givenZip_Code,
                    "Login_Password" => $givenLogin_Password,
                    "Extended_Access" => $givenExtended_Access));
    }

    /**
     * Get all the phoneNumbers in the database. 
     * @return type
     */
    public function getAllNumbers() {
        $this->selNumber->execute();
        return $this->selNumber->fetchAll(PDO::FETCH_ASSOC);
    }

}
