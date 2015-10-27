<?php

require_once("tempController.php");

class deleteController extends tempController {

    public function show($page) {
        if ($page == "deleteMember") {
            $this->deleteMember();
        } else if ($page == "deleteEmployee") {
            $this->deleteEmployee();
        } else if ($page == "deleteMemberNow") {
            $this->deleteMemberNow();
        } else if ($page == "deleteEmployeeNow") {
            $this->deleteEmployeeNow();
        }
    }

    /**
     * 
     */
    public function deleteMemberNow() {

        $membershipnr = $_REQUEST['membershipnr'];

        $memberModel = $GLOBALS["memberModel"];

        $added = $memberModel->deleteMember($membershipnr);

        $this->deleteMember();
    }

    /**
     * 
     */
    public function deleteEmployeeNow() {

        $phonenr = $_REQUEST['phonenr'];

        $employeeModel = $GLOBALS["employeeModel"];

        $added = $employeeModel->deleteEmployee($phonenr);

        $this->deleteEmployee();
    }

    /**
     * 
     * @return type
     */
    public function deleteMember() {
        
        $memberModel = $GLOBALS["memberModel"];
        $members = $memberModel->getAll();

        $data = array("members" => $members);
        return $this->render("deleteMember", $data);
    }

    /**
     * 
     * @return type
     */
    public function deleteEmployee() {
        
        $employeeModel = $GLOBALS["employeeModel"];
        $employees = $employeeModel->getAll();

        $data = array("employees" => $employees);
        return $this->render("deleteEmployee", $data);
    }

}
