<?php
class memberModel {
    /** @var PDO */
    private $dbConn;
    const TABLE = "Member";
    const INSERT_QUERY = "INSERT INTO " . CustomerModel::TABLE . " (name) VALUES (:name)";
    
    /** @var PDOStatement Statement for adding new entries */
    private $addStmt;
    
    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(CustomerModel::INSERT_QUERY);
        }
        
   // lage en funksjon inni controller å referere den til denne.
        
   /**
     * Try to add a new customer
     *
     * @param $name
     *
     * @return bool true on success, false otherwise
     */
    public function add($First_name, $Last_name, $Birth, $Phone_Number, $Login_Password) {
        return $this->addStmt->execute(array("First_name,Last_name,Birth,Phone_Number,Login_Password"
            => $First_name, $Last_name, $Birth, $Phone_Number, $Login_Password));
    }

    // TODO - create additional functions for customer model here
}     
