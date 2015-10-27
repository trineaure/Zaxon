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
        }
    }

    /**
     * Searches through all the members by phonenumber
     * @return type
     */
    public function searchMember() {
        $memberModel = $GLOBALS["memberModel"];
        if (isset($_REQUEST['searchKeyword'])) {
            $searchKeyword = $_REQUEST['searchKeyword'];
            $members = $memberModel->searchMember($searchKeyword);
        } else {
            $members = array();
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
        $employeeModel = $GLOBALS["employeeModel"];

        $result = $employeeModel->getOneByPhone();

        return result;
    }

}
