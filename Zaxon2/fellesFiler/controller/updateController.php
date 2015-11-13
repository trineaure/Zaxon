<?php

require_once("tempController.php");

class updateController extends tempController {

    public function show($page) {
        if ($page == "updateMember") {
            $this->getMemberUpdate();
        }
        if ($page == "updateMemberAction") {
            $this->updateMember();
        }
        if ($page == "updateEmployee") {
            $this->getEmployeeUpdate();
        }
        if($page == "updateEmployeeAction") {
            $this->updateEmployee();
        }
        if ($page == "updateInformation") {
            $this->getOneMemberUpdate();
        } 
        if ($page == "addUpdate") {
            $this->updateOneMember();
        }
        if ($page == "myInfo") {
            $this->getMemberInfo();
            $this->render("myInfo");
        }
        if ($page == "myReservations") {
            $this->showMyReservations($_SESSION["MembershipNumber"]);
        }
        if ($page == "listMembers") {
            $this->showMembers();
        } 
        if ($page == "listEmployees") {
            $this->showEmployee();
        } 
        if ($page == "deleteMemberNow") {
            $this->deleteMemberNow();
        } 
        if ($page == "deleteEmployeeNow") {
            $this->deleteEmployeeNow();
        }
    }

    /**
     * Show the informatin about the Member in Zaxon.
     * @return the array with the member and render to the updateMember page.
     * @return bool <b>TRUE</b> on success or <b>FALSE</b> on failure.
     */
    public function getMemberUpdate() {

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
    public function getEmployeeUpdate() {

        $employeeModel = $GLOBALS["employeeModel"];
        $employeeID = filter_input(INPUT_POST, "EmployeeID");

        // Get the employee by the EmployeeID
        $employee = $employeeModel->getOneByEmployeeID($employeeID);

        $data = array("employee" => $employee);
        return $this->render("updateEmployee", $data);
    }

    /**
     * Update the information about the member
     * @return type
     */
    public function updateMember() {

        $memberModel = $GLOBALS["memberModel"];

        // set the values in the $update... 
        $updateFirst_name = filter_input(INPUT_POST, 'First_name');
        $updateLast_name = filter_input(INPUT_POST, 'Last_name');
        $updateBirth = filter_input(INPUT_POST, 'Birth');
        $updatePhone_Number = filter_input(INPUT_POST, 'Phone_Number');
        $Membership_number = filter_input(INPUT_POST, 'Membership_number');

        $memberModel->updateMember($updateFirst_name, $updateLast_name, $updateBirth, $updatePhone_Number, $Membership_number);
        $GLOBALS["included_members"] = $memberModel->getAll();

        //$data = array("members" => $members);
        return $this->render("listMembers");
    }

    /**
     * Update the information about the Employee
     * @return type
     */
    public function updateEmployee() {

        $employeeModel = $GLOBALS["employeeModel"];

        $updateFirst_name = filter_input(INPUT_POST, 'First_name');
        $updateLast_name = filter_input(INPUT_POST, 'Last_name');
        $updateBirth = filter_input(INPUT_POST, 'Birth');
        $updatePhone_Number = filter_input(INPUT_POST, 'Phone_Number');
        $updateHome_Address = filter_input(INPUT_POST, 'Home_Address');
        $updateZip_Code = filter_input(INPUT_POST, 'Zip_Code');
        $EmployeeID = filter_input(INPUT_POST, 'EmployeeID');

        $employeeModel->updateEmployee($updateFirst_name, $updateLast_name, $updateBirth, $updatePhone_Number, $updateHome_Address, $updateZip_Code, $EmployeeID);
        $GLOBALS["included_employees"] = $employeeModel->getAll();

        return $this->render("listEmployees");
    }

    /**
     * The member can update the information about himself.
     * @return type
     */
    public function updateOneMember() {

        $memberModel = $GLOBALS["memberModel"];

        $updateFirst_name = filter_input(INPUT_POST, 'First_name');
        $updateLast_name = filter_input(INPUT_POST, 'Last_name');
        $updateBirth = filter_input(INPUT_POST, 'Birth');
        $updatePhone_Number = filter_input(INPUT_POST, 'Phone_Number');
        $Membership_number = filter_input(INPUT_POST, 'Membership_number');

        $memberModel->updateMember($updateFirst_name, $updateLast_name, $updateBirth, $updatePhone_Number, $Membership_number);
        $member = $memberModel->getOneByMemberNumber($Membership_number);

        $data = array("member" => $member);
        return $this->render("myInfo", $data);
    }

    /**
     * The member himself can update the information about him.
     * @return typ
     */
    public function getOneMemberUpdate() {
        // Get the member by the membership number
        $this->getMemberInfo();
        return $this->render("updateInformation");
    }
    
    /*
     * Returns the info of the member who is logged in. 
     */
    public function getMemberInfo() {
        $memberModel = $GLOBALS["memberModel"];
        // Get the member by the membership number
        $GLOBALS["member"] = $memberModel->getOneByMemberNumber($_SESSION["MembershipNumber"]);
    }
    
    /**
     * Show all the Members in the database.
     * @return bool <b>TRUE</b> on success or <b>FALSE</b> on failure.
     * Render to the new page, listMembers
     */
    public function showMembers() {
        $memberModel = $GLOBALS["memberModel"];
        // Get all of the members from the db.
        $included_members = $memberModel->getAll();
        $data = array("included_members" => $included_members);
        return $this->render("listMembers", $data);
    }

    /**
     * Shows all the employee's in Zaxon.
     * @return bool <b>TRUE</b> on success or <b>FALSE</b> on failure.
     * Render to the new page, listEmployee
     */
    public function showEmployee() {
        $employeeModel = $GLOBALS["employeeModel"];

        // get all the employees from the db.
        $included_employee = $employeeModel->getAll();
        $data = array("included_employees" => $included_employee);
        return $this->render("listEmployees", $data);
    }

    /**
     * Shows the reservations to a member,
     * @return bool <b>TRUE</b> on success or <b>FALSE</b> on failure.
     * Render to the new page, myReservations
     * @return $this->render("myReservations")
     */
    public function showMyReservations($memberID) {
        $reservation_treatmentModel = $GLOBALS["reservation_treatmentModel"];
        $GLOBALS["reservations"] = $reservation_treatmentModel->getReservationInfo($memberID);
        return $this->render("myReservations");
    }
    
    /**
     * Delte the member from the database.
     * 
     */
    public function deleteMemberNow() {

        $memberModel = $GLOBALS["memberModel"];
        if (isset($_REQUEST['membershipnr'])) {
            $membershipnr = $_REQUEST['membershipnr'];
            $memberModel->deleteMember($membershipnr);
        }
        $this->deleteMember();
    }
    
    /**
     * Delete a employee from the database.
     */
    public function deleteEmployeeNow() {

        $employeeModel = $GLOBALS["employeeModel"];
        if (isset($_REQUEST['employeeID'])) {
            $employeeID = $_REQUEST['employeeID'];
            $employeeModel->deleteEmployee($employeeID);
        }
        $this->deleteEmployee();
    }

}
