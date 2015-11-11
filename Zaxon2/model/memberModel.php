<?php
class memberModel {
    /** @var PDO */
    private $dbConn;
    const TABLE = "Member";
    const SELECT_QUERY = "SELECT * FROM " . memberModel::TABLE;
    const INSERT_QUERY = "INSERT INTO " . memberModel::TABLE . "(First_name,Last_name,Birth,Phone_Number,Login_Password) VALUES (:First_name,:Last_name,:Birth,:Phone_Number,:Login_Password)";
    
    /** @var PDOStatment Statment for selecting all enteries */
    private $selStmt;
    
    /** @var PDOStatement Statement for adding new entries */
    private $addStmt;
    
    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(memberModel::INSERT_QUERY);
        $this->selStmt = $this->dbConn->prepare(memberModel::SELECT_QUERY);
        }
  
        /**
         * Get all customers stord in the database.
         * @return an array in associative arrays.
         */
        public function getAll() {
            $this->selStmt->execute();
            return $this->selStmt->fetchAll(PDO::FETCH_ASSOC);
        }
    
      
    public function add($givenFirst_Name, $givenLastName, $givenBirth, $givenPhone_Number, $givenLogin_Password) {
        return $this->addStmt->execute(array("First_name"=> $givenFirst_Name, "Last_name"=> $givenLastName,"Birth" => $givenBirth, "Phone_Number" => $givenPhone_Number, "Login_Password"=> $givenLogin_Password));
    }
  
    }
