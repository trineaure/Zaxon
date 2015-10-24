<?php
require_once("tempController.php");

class showController extends tempController {

   public function show($page) {
        if ($page == "showMembers") {
            $this->showMembers();
        } else if ($page == "memberAdded") {
            $this->addMemberAction();
        } else if ($page == "showEmployee") {
            $this->showEmployee();
        } else if ($page == "EmployeeAdded") {
            $this->addEmployeeAction();
        } else if ($page == "searchMember") {
            $this->searchMember();
        }
    }
  
     public function searchMember() {
        $memberModel = $GLOBALS["memberModel"];
        if(isset($_REQUEST['searchKeyword'])) {
        $searchKeyword = $_REQUEST['searchKeyword'];
        $members = $memberModel->searchMember($searchKeyword);
      }
      else {$members = array();
              
      } 

        $data = array("searchResults" => $members);
        return $this->render("searchMember", $data);
    }
    /**
     * Function that show all the members in Zaxon
     */
    public function showMembers() {
        $memberModel = $GLOBALS["memberModel"];
        $included_members = $memberModel->getAll();
        $data = array("included_members" => $included_members);
        return $this->render("showMembers", $data);
//       
    }

    /**
     * 
     * Function that shows all the employee's in Zaxon.
     */
    public function showEmployee() {
        $employeeModel = $GLOBALS["employeeModel"];
        $included_employee = $employeeModel->getAll();
        $data = array("included_employee" => $included_employee);
        return $this->render("showEmployee", $data);
    }

    /**
     * Get information about the Member.
     */
    function getUserInfo($Phone_Number) {
        $memberModel = $GLOBALS["memberModel"];

        $result = $memberModel->getOneByPhone();

        return $result;
    }

    /**
     * 
     * @param type $Phone_Number
     * @return $result about the Employee by getting it by the Phone Number
     */
    function getEmployeeInfo($Phone_Number) {
        $employeeModel = $GLOBALS[employeeModel];

        $result = $employeeModel->getOneByPhone();

        return result;
    }

    /**
     * getNumMembers - return the number of signed-up users
     * of the website
     *     
     *  
      public function getNumMembers() {
      if($thi->num_members < 0) {
      $q = "SELECT * FROM ". memberModel;
      $result
      }
      SKAL GJØRE OM I FUNKSJONEN
      function getNumMembers(){
      if($this->num_members < 0){
      $q = "SELECT * FROM ".TBL_USERS;
      $result = mysql_query($q, $this->connection);
      $this->num_members = mysql_numrows($result);
      }
      return $this->num_members;
      }
     */
}
