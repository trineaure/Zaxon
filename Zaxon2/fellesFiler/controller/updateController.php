<?php

require_once("tempController.php");

class updateController extends tempController {

    public function show($page) {
        if ($page == "updateMember") {
            $this->updateMemberShow();
        } else if ($page == "updateEmployee") {
            $this->updateEmployeeShow();
        }  else if ($page == "updateMemberNow") {
            $this->updateMemberNow();
        } else if ($page == "updateEmployeeNow") {
            $this->updateEmployeeNow();
        } 
    }

    /**
     * Show the informatin about the Member in Zaxon.
     * @return the array with the member and render to the updateMember page.
     */
    public function updateMemberShow() {

        $memberModel = $GLOBALS["memberModel"];
        $Membership_number = filter_input(INPUT_POST, "Membership_number");

        // Get the member by the membership number
        $member = $memberModel->getOneByMemberNumber($Membership_number);

        $data = array("member" => $member);
        return $this->render("updateMember", $data);
    }
    
     /**
     * Shows the information about the employee before we can change it.
     * @return type
     */
      public function updateEmployeeShow() {

        $employeeModel = $GLOBALS["employeeModel"];
        $employeeID = filter_input(INPUT_POST, "EmployeeID");
        
        // Get the member by the membership number
        $employee = $employeeModel->getOneByEmployeeID($employeeID);

        $data = array("employee" => $employee); 
        return $this->render("updateEmployee", $data);
    }

    /**
     * Update the information about the member
     * @return type
     */
    public function updateMemberNow() {

        $memberModel = $GLOBALS["memberModel"];

        $updateFirst_name = $_REQUEST['First_name'];
        $updateLast_name = $_REQUEST['Last_name'];
        $updateBirth = $_REQUEST['Birth'];
        $updatePhone_Number = $_REQUEST['Phone_Number'];
        $Membership_number = $_REQUEST['Membership_number'];

        $update = $memberModel->updateMember($updateFirst_name, $updateLast_name, $updateBirth, $updatePhone_Number, $Membership_number);
        $members = $memberModel->getAll();

        $data = array("members" => $members);
        return $this->render("listMembers", $data);
    }
    
        /**
     * Update the information about the Employee
     * @return type
     */
       public function updateEmployeeNow() {

        $employeeModel = $GLOBALS["employeeModel"];

        $updateFirst_name = $_REQUEST['First_name'];
        $updateLast_name = $_REQUEST['Last_name'];
        $updateBirth = $_REQUEST['Birth'];        
        $updatePhone_Number = $_REQUEST['Phone_Number'];
        $updateHome_Address = $_REQUEST['Home_Address'];
        $updateZip_Code = $_REQUEST['Zip_Code'];
        $EmployeeID = $_REQUEST['EmployeeID'];

        $update2 = $employeeModel->updateEmployee($updateFirst_name, $updateLast_name, $updateBirth, $updatePhone_Number, $updateHome_Address, $updateZip_Code, $EmployeeID);
        $employees = $employeeModel->getAll();

        $data = array("employees" => $employees);
        return $this->render("listEmployees", $data);
    }   

   
    
    

}
