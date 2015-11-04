<?php
require_once("tempController.php");

class deleteController extends tempController {

    public function show($page) {
        if ($page == "listMembers") {
            $this->deleteMember();
        } else if ($page == "deleteEmployee") {
            $this->listEmployees();
        } else if ($page == "deleteMemberNow") {
            $this->deleteMemberNow();
        } else if ($page == "deleteEmployeeNow") {
            $this->deleteEmployeeNow();
        }
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
     * Delete a employee from the database.
     */
    public function deleteEmployeeNow() {

        $employeeModel = $GLOBALS["employeeModel"];
        if (isset($_REQUEST['phonenr'])) {
            $phonenr = $_REQUEST['phonenr'];

            $added = $employeeModel->deleteEmployee($phonenr);
        }
        $this->deleteEmployee();
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
     * Delete an employee from the database.
     * @return an array of the deleted employee and render to the deleteEmployee page.
     */
    public function deleteEmployee() {

        $employeeModel = $GLOBALS["employeeModel"];
        $employees = $employeeModel->getAll();

        $data = array("employees" => $employees);
        return $this->render("deleteEmployee", $data);
    }

}