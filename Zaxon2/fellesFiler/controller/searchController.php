<?php

require_once("tempController.php");

/**
 * SearchController controll all the ..
 */
class searchController extends tempController {

    public function show($page) {

        switch ($page) {

            case($page == "searchMember"):
                $this->searchMember();
                break;

            case($page == "searchEmployee"):
                $this->searchEmployee();
                break;
        }
    }

    /**
     * Searches through all members in the db.
     * @return render the page searchMember and send with the $data
     * with the $searchResult, if no $searchResult returns nothing.
     */
    public function searchMember() {

        $memberModel = $GLOBALS["memberModel"];
        // determine if a variable is set and not NULL
        if (isset($_REQUEST['searchKeyword'])) {
            // collect value of input field.
            $searchKeyword = $_REQUEST['searchKeyword'];
            $members = $memberModel->searchMember($searchKeyword);
        } else {
            //return empty array.
            $members = array();
        }
        $data = array("searchResults" => $members);
        return $this->render("searchMember", $data);
    }

    /**
     * Searches through all of Employees in the db.
     * @return render page searchEmployee and send with $data with the $searchResult,
     *  if no $searchResult returns nothing. 
     */
    public function searchEmployee() {

        $employeeModel = $GLOBALS["employeeModel"];
        if (isset($_REQUEST['searchKeyword'])) {
            // collect value of input field.
            $searchKeyword = $_REQUEST['searchKeyword'];
            $employees = $employeeModel->searchEmployee($searchKeyword);
        } else {
            $employees = array();
        }
        $data = array("searchResults" => $employees);
        return $this->render("searchEmployee", $data);
    }

}
