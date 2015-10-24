<-- MASTER SIDE -->
<?php

class memberModel {

    /** @var PDO */
    private $dbConn;

    const TABLE = "Member";
    const SELECT_ALL_QUERY = "SELECT * FROM " . memberModel::TABLE;
    const INSERT_QUERY = "INSERT INTO " . memberModel::TABLE . "(First_name,Last_name,Birth,Phone_Number,Login_Password) VALUES (:First_name,:Last_name,:Birth,:Phone_Number,:Login_Password)";
    const SELECT_QUERY = "SELECT Phone_Number FROM " . memberModel::TABLE;
    const SELECT_ONE_QUERY = "SELECT * FROM " . memberModel::TABLE . " WHERE Phone_Number = :Phone_Number";
    const SEARCH_QUERY = "SELECT * FROM" . memberModel::TABLE . " WHERE Phone_Number LIKE :search";

    /** @var PDOStatment Statment for selecting all enteries */
    private $selStmt;

    /** @var PDOStatement Statement for adding new entries */
    private $addStmt;
    // select a number
    private $selNumber;
    // select one 
    private $selOne;
    // search 
    private $search;

    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(memberModel::INSERT_QUERY);
        $this->selStmt = $this->dbConn->prepare(memberModel::SELECT_ALL_QUERY);
        $this->selNumber = $this->dbConn->prepare(memberModel::SELECT_QUERY);
        $this->selOne = $this->dbConn->prepare(memberModel::SELECT_ONE_QUERY);
        $this->search = $this->dbConn->prepare(memberModel::SEARCH_QUERY);
    }

    /**
     * 
     * @param type $searchKeyword
     * @return type
     */
    public function searchMember($searchKeyword) {
        $this->search->execute(array(":search" =>"%$searchKeyword%"));
        return $this->search->fetchAll(PDO::FETCH_ASSOC);
              
    }

    /**
     * Get one query by phone nymber.
     * @param type $Phone_Number
     * @return 
     */
    public function getOneByPhone($Phone_Number) {

        $this->selOne->execute(array(
            ':Phone_Number' => $Phone_Number,
                )
        );
        return $this->selOne->fetchAll(PDO::FETCH_ASSOC);
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
        return $this->addStmt->execute(array("First_name" => $givenFirst_Name, "Last_name" => $givenLastName, "Birth" => $givenBirth, "Phone_Number" => $givenPhone_Number, "Login_Password" => $givenLogin_Password));
    }

    public function getAllNumbers() {
        $this->selNumber->execute();
        return $this->selNumber->fetchAll(PDO::FETCH_ASSOC);
    }

}
