<?php

require_once("tempController.php");

/**
 * Class that controlls all the function with searching
 */
class searchController extends tempController {

    public function show($page) {
        if ($page == "searchMember") {
            $this->searchMember();
        }
        if ($page == "searchEmployee") {
            $this->searchEmployee();
        }
    }

    /**
     * Searches through all the members by its Membership_Number
     * @return bool <b>TRUE</b> on success or <b>FALSE</b> on failure.
     * if true; render page searchMember, else return empty array
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
     * Searches through all of the Employee's and shows the correct employee
     * by its EmployeeID
     * @return bool <b>TRUE</b> on success or <b>FALSE</b> on failure.
     * if true; render page searchEmployee, else return empty array.
     */
    public function searchEmployee() {
        $employeeModel = $GLOBALS["employeeModel"];
        if (isset($_REQUEST['searchKeyword'])) {
            $searchKeyword = $_REQUEST['searchKeyword'];
            $employees = $employeeModel->searchEmployee($searchKeyword);
        } else {
            $employees = array();
        }
        $data = array("searchResults" => $employees);
        return $this->render("searchEmployee", $data);
    }
}
