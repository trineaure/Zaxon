
<?php

class memberModel {

    /** @var PDO */
    private $dbConn;

    const TABLE = "Member";
    const SELECT_ALL_QUERY = "SELECT * FROM " . memberModel::TABLE;
    const INSERT_QUERY = "INSERT INTO " . memberModel::TABLE . "(First_name,Last_name,Birth,Phone_Number,Login_Password) VALUES (:First_name,:Last_name,:Birth,:Phone_Number,:Login_Password)";
    const SELECT_QUERY = "SELECT Phone_Number FROM " . memberModel::TABLE;
    const SELECT_ONE_MEMBER = "SELECT * FROM " . memberModel::TABLE . " WHERE Membership_number = :Membership_number";
    const SEARCH_QUERY = "SELECT * FROM " . memberModel::TABLE . " WHERE Phone_Number LIKE :search OR Birth LIKE :searchB OR First_name LIKE :searchFN OR Last_name LIKE :searchLN";
    const DELETE_QUERY = "DELETE FROM " . memberModel::TABLE . " WHERE Membership_number = ?";
    const UPDATE_QUERY = "UPDATE " . memberModel::TABLE . " SET First_name = :First_name, Last_name = :Last_name, Birth = :Birth, Phone_Number = :Phone_Number, Login_Password = :Login_Password WHERE Membership_number = :Membership_number";
   
    /** @var PDOStatment Statment for selecting all enteries */
    private $selStmt;

    /** @var PDOStatement Statement for adding new entries */
    private $addStmt;

    /** @var PDOStatment Statment for selecting entries by the Membership Nr. */
    private $selNumber;

    /** @var PDOStatment Statment for selecting an entrie by the Membership Number */
    private $selMember;

    /** @var PDOStatment Statment for searching an entrie by the firstname, lastname, birth, phonenumber */
    private $search;

    /** @var PDOStatment Statment for deleting an entrie by the Membership Number */
    private $delete;

    /** @var PDOStatment Statment for updating an entrie with all the information */
    private $update;

    /**
     * Constructor of the Class memberModel
     * @param PDO $dbConn - The connection to the database
     */
    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(memberModel::INSERT_QUERY);
        $this->selStmt = $this->dbConn->prepare(memberModel::SELECT_ALL_QUERY);
        $this->selNumber = $this->dbConn->prepare(memberModel::SELECT_QUERY);
        $this->selMember = $this->dbConn->prepare(memberModel::SELECT_ONE_MEMBER);
        $this->search = $this->dbConn->prepare(memberModel::SEARCH_QUERY);
        $this->delete = $this->dbConn->prepare(memberModel::DELETE_QUERY);
        $this->update = $this->dbConn->prepare(memberModel::UPDATE_QUERY);
    }

    /**
     * Update information about the member in the database.
     * @param String $updateFirst_name,$updateLast_name, $updateBirth,$updatePhone_Number, $updateLogin_Password
     * @return bool <b>TRUE</b> on success or <b>FALSE</b> on failure.
     */
    public function updateMember($updateFirst_name, $updateLast_name, $updateBirth, $updatePhone_Number, $Membership_number, $givenNewLogin_Password) {

        return $this->update->execute(array(
                    ":First_name" => $updateFirst_name,
                    ":Last_name" => $updateLast_name,
                    ":Birth" => $updateBirth,
                    ":Phone_Number" => $updatePhone_Number,
                    ":Membership_number" => $Membership_number,
                    ":Login_Password" => $givenNewLogin_Password
        ));
    }

    /**
     * Delete a member from the database.
     * @param String $deleteMember
     * @return bool <b>TRUE</b> on success or <b>FALSE</b> on failure.
     */
    public function deleteMember($deleteMember) {

        return $this->delete->execute(array($deleteMember));
    }

    /**
     * Search after a member by a searchkeyword
     * @param String $searchKeyword
     * @return array with the Member that matches the $searchKeyword's information that is given.
     */
    public function searchMember($searchKeyword) {

        $this->search->execute(array(":search" => "%$searchKeyword%",
            ":searchB" => "%$searchKeyword%",
            ":searchFN" => "%$searchKeyword%",
            ":searchLN" => "%$searchKeyword%"
        ));
        return $this->search->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Select one Member by its Membership Number
     * @param String $memberNumber
     * @return array with the Member that matches the Membership_Number
     */
    public function getOneByMemberNumber($memberNumber) {
        
        $this->selMember->execute(array(
            ':Membership_number' => $memberNumber
        ));
        return $this->selMember->fetch(PDO::FETCH_ASSOC);
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
     * Adds a new member to Zaxon 
     * @param $givenFirst_Name, $givenLastName, $givenBirth, $givenPhone_Number, $givenLogin_Password. 
     * @return bool <b>TRUE</b> on success or <b>FALSE</b> on failure.
     */
    public function add($givenFirst_Name, $givenLastName, $givenBirth, $givenPhone_Number, $Login_Password_encrypted) {

        return $this->addStmt->execute(array("First_name" => $givenFirst_Name, "Last_name" => $givenLastName, "Birth" => $givenBirth, "Phone_Number" => $givenPhone_Number, "Login_Password" => $Login_Password_encrypted));
    }

    /**
     * Get all the phone numbers of the members of Zaxon.
     * @return an array in associative array.
     */
    public function getAllNumbers() {

        $this->selNumber->execute();
        return $this->selNumber->fetchAll(PDO::FETCH_ASSOC);
    }

}
