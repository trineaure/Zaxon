<?php

require_once("tempController.php");

class updateController extends tempController {

    public function show($page) {
        if ($page == "updateMember") {
            $this->updateMemberShow();
        } 
        if ($page == "updateEmployee") {
            $this->updateEmployeeShow();
        } 
        if ($page == "updateMemberNow") {
            $this->updateMemberNow();
        } 
        if ($page == "updateEmployeeNow") {
            $this->updateEmployeeNow();
        }
        if($page == "updateInformation") {
            $this->updateOneMemberShow();
        }
        if ($page == "updateInformationNow") {
            $this->updateOneMemberNow();
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

        $updateFirst_name = filter_input(INPUT_POST,'First_name');
        $updateLast_name = filter_input(INPUT_POST,'Last_name');
        $updateBirth = filter_input(INPUT_POST,'Birth');
        $updatePhone_Number = filter_input(INPUT_POST,'Phone_Number');
        $Membership_number = filter_input(INPUT_POST,'Membership_number');

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

        $updateFirst_name =filter_input(INPUT_POST,'First_name');
        $updateLast_name = filter_input(INPUT_POST,'Last_name');
        $updateBirth = filter_input(INPUT_POST,'Birth');        
        $updatePhone_Number = filter_input(INPUT_POST,'Phone_Number');
        $updateHome_Address = filter_input(INPUT_POST,'Home_Address');
        $updateZip_Code = filter_input(INPUT_POST,'Zip_Code');
        $EmployeeID = filter_input(INPUT_POST,'EmployeeID');

        $employeeModel->updateEmployee($updateFirst_name, $updateLast_name, $updateBirth, $updatePhone_Number, $updateHome_Address, $updateZip_Code, $EmployeeID);
        $employees = $employeeModel->getAll();

        $data = array("employees" => $employees);
        return $this->render("listEmployees", $data);
    }   
    
    /**
     * The member can update the information about himself.
     * @return type
     */
      public function updateOneMemberNow() {

        $memberModel = $GLOBALS["memberModel"];

        $updateFirst_name = filter_input(INPUT_POST,'First_name');
        $updateLast_name = filter_input(INPUT_POST,'Last_name');
        $updateBirth = filter_input(INPUT_POST,'Birth');
        $updatePhone_Number = filter_input(INPUT_POST,'Phone_Number');
        $Membership_number = filter_input(INPUT_POST,'Membership_number');

        $update = $memberModel->updateMember($updateFirst_name, $updateLast_name, $updateBirth, $updatePhone_Number, $Membership_number);
        $members = $memberModel->getOneByMemberNumber($Membership_number);

        $data = array("members" => $members);
        return $this->render("updateInformation", $data);
    }
    
    /**
     * The member himself can update the information about him.
     * @return typ
     */
    public function updateOneMemberShow() {

        $memberModel = $GLOBALS["memberModel"];
        $Membership_number = filter_input(INPUT_POST, "Membership_number");

        // Get the member by the membership number
        $member = $memberModel->getOneByMemberNumber($Membership_number);

        $data = array("member" => $member);
        return $this->render("updateInformation", $data);
    }
    
    
}
