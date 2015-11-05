<?php
require_once("tempController.php");

class deleteController extends tempController {

    public function show($page) {
        if ($page == "listMembers") {
            $this->deleteMember();
        } 
        if ($page == "listEmployees") {
            $this->deleteEmployee();
        } 
        if ($page == "deleteMemberNow") {
            $this->deleteMemberNow();
        } 
        if ($page == "deleteEmployeeNow") {
            $this->deleteEmployeeNow();
        }
    }


    /**
     * Delete a member from the database
     * @return an array of the deleted member and render to the listMembers page.
     */
    public function deleteMember() {

        $memberModel = $GLOBALS["memberModel"];
        $members = $memberModel->getAll();

        $data = array("members" => $members);
        return $this->render("listMembers", $data);
    }
    
    /**
     * Delte the member from the database.
     * 
     */
    public function deleteMemberNow() {

        $memberModel = $GLOBALS["memberModel"];
        if (isset($_REQUEST['membershipnr'])) {
            $membershipnr = $_REQUEST['membershipnr'];
            $added = $memberModel->deleteMember($membershipnr);
        }
        $this->deleteMember();
    }


    /**
     * Delete an employee from the database.
     * @return an array of the deleted employee and render to the deleteEmployee page.
     */
    public function deleteEmployee() {

        $employeeModel = $GLOBALS["employeeModel"];
        $employees = $employeeModel->getAll();

        $data = array("employees" => $employees);
        return $this->render("listEmployees", $data);
    }
    
    /**
     * Delete a employee from the database.
     */
    public function deleteEmployeeNow() {

        $employeeModel = $GLOBALS["employeeModel"];
        if (isset($_REQUEST['employeeID'])) {
            $employeeID = $_REQUEST['employeeID'];
            $added = $employeeModel->deleteEmployee($employeeID);
        }
        $this->deleteEmployee();
    }


}