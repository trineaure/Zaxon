<?php


class employeeModel {
    /** @var PDO */
    private $dbConn;

    const TABLE = "Employee";
    const SELECT_ALL_QUERY = "SELECT * FROM " . employeeModel::TABLE;
    const INSERT_QUERY = "INSERT INTO " . employeeModel::TABLE . "(First_name, Last_name, Birth, Phone_Number, Home_Address, Zip_Code, Login_Password, Extended_Access) VALUES (:First_name, :Last_name, :Birth, :Phone_Number, :Home_Address, :Zip_Code, :Login_Password, :Extended_Access)";
    const SELECT_QUERY = "SELECT Phone_Number FROM " . employeeModel::TABLE;
    const SELECT_ONE_QUERY = "SELECT * FROM " . employeeModel::TABLE . "WHERE Phone_Number = :Phone_Number";
    /** @var PDOStatement Statement for selecting all entries */
    private $selStmt;
    /** @var PDOStatement Statement for adding new entries */
    private $addStmt;
    
    private $selNumber;
    
    // select one query
    private $selOne;
    
    //Constructor for the class employeeModel
    /*
     * @param $dbConn - The connection to the database
     */
    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(employeeModel::INSERT_QUERY);
        $this->selStmt = $this->dbConn->prepare(employeeModel::SELECT_ALL_QUERY);
        $this->selNumber = $this->dbConn->prepare(employeeModel::SELECT_QUERY);
        $this->selOne = $this->dbConn->prepare(employeeModel::SELECT_ONE_QUERY);
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
     * Get one query by phone number
     */
    public function getOneByPhone($Phone_Number) {
      $this->selOne->execute(array(
          ':Phone_Number' => $Phone_Number,
      )
              );  
      return $this->selOne->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Try to add a new customer
     *
     * @param $name
     *
     * @return bool true on success, false otherwise
     */
        public function add($givenF_Name, $givenL_Name, $givenBirth, $givenPhone_Number, $givenHome_Address, $givenZip_Code, $givenLogin_Password, $givenExtended_Access ) {
        return $this->addStmt->execute
                (array("First_name"=> $givenF_Name, 
                        "Last_name"=> $givenL_Name,
                        "Birth" => $givenBirth, 
                        "Phone_Number" => $givenPhone_Number, 
                        "Home_Address"=> $givenHome_Address,
                        "Zip_Code"=> $givenZip_Code, 
                        "Login_Password"=> $givenLogin_Password,
                         "Extended_Access"=>$givenExtended_Access));
    }
    
 public function getAllNumbers()
    {
        $this->selNumber->execute();
        return $this->selNumber->fetchAll(PDO::FETCH_ASSOC);
    }

    
}