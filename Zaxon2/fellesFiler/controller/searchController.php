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
     * Check if $searchKeyword is determine and not null.
     * Get the $searchKeyword from $memberModel and saves it in
     * $searchResult.
     * @return render the page searchMember and sends the $data
     * with the $searchResult, if no $searchResult returns nothing.
     */
    public function searchMember() {

        $memberModel = $GLOBALS["memberModel"];
        // set the value in the $searchKeyword
        $searchKeyword = filter_input(INPUT_POST, "searchKeyword");
        if (isset($_POST['searchKeyword'])) {
            $searchResults = $memberModel->searchMember($searchKeyword);
        } else {
            //return empty array.
            $searchResults = array();
        }
        $data = array("searchResults" => $searchResults);
        return $this->render("searchMember", $data);
    }

    /**
     * Searches through all of Employees in the db.
     * Check if $searchKeyword is determine and not null.
     * @return render page searchEmployee and sends the $data with the $searchResult,
     *  if no $searchResult returns nothing. 
     */
    public function searchEmployee() {

        $employeeModel = $GLOBALS["employeeModel"];
        $searchKeyword = filter_input(INPUT_POST, "searchKeyword");
        if (isset($_POST['searchKeyword'])) {
            $searchResults = $employeeModel->searchEmployee($searchKeyword);
        } else {
            $searchResults = array();
        }
        $data = array("searchResults" => $searchResults);
        return $this->render("searchEmployee", $data);
    }

}
