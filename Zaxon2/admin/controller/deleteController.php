<!--ADMIN SIDE-->
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

        $memberModel = $GLOBALS["memberModel"];
        if (isset($_REQUEST['membershipnr'])) {
            $membershipnr = $_REQUEST['membershipnr'];
            $added = $memberModel->deleteMember($membershipnr);
        }

        $this->deleteMember();
    }

    /**
     * 
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