<!--MASTER SIDE-->
<?php

require_once("tempController.php");

class searchController extends tempController {

    public function show($page) {
        if ($page == "searchMember") {
            $this->searchMember();
        } else if($page == "searchEmployee") {
            $this->searchEmployee();
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
         * 
         * @return search through the Employee's by ID. 
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