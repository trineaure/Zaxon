<?php
class memberModel {
    /** @var PDO */
    private $dbConn;
    const TABLE = "Member";
    const SELCT_QUERY ="SELECT * FROM " . memberModel::TABLE;
    const INSERT_QUERY = "INSERT INTO " . memberModel::TABLE . "Membership_number,First_name,Last_name,Birth,Phone_Number,Login_Password VALUES(:Membership_number,:First_name,:Last_name,:Birth,:Phone_Number,:Login_Password)";
    
    /** @var PDOStatment Statment for selecting all enteries */
    private $selStmt;
    
    /** @var PDOStatement Statement for adding new entries */
    private $addStmt;
    
    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(memberModel::INSERT_QUERY);
        $this->selStemt = $this->dbConn->prepare(memberModel::SELECT_QUERY);
        }
  
        /**
         * Get all customers stord in the database.
         * @return an array in associative arrays.
         */
        public function getAll() {
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
    public function add($givenMembership_number, $givenFirst_name, $givenLast_name, $givenBirth, $givenPhone_Number, $givenLogin_Password) {
        return $this->addStmt->execute(array("Membership_Number, First_name,Last_name,Birth,Phone_Number,Login_Password"
            => $givenMembership_number, $givenFirst_name, $givenLast_name, $givenBirth, $givenPhone_Number, $givenLogin_Password));
    }
    }
