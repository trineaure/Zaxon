<?php

require_once("tempController.php");

class updateController extends tempController {

    public function show($page) {

        switch ($page) {

            case($page == "updateMember"):
                $this->getMemberUpdate();
                break;

            case($page == "updateMemberAction"):
                $this->updateMember();
                break;

            case($page == "updateEmployee"):
                $this->getEmployeeUpdate();
                break;

            case($page == "updateEmployeeAction"):
                $this->updateEmployee();
                break;

            case($page == "updateInformation"):
                $this->getOneMemberUpdate();
                break;

            case($page == "addUpdate"):
                $this->updateOneMember();
                break;

            case($page == "myInfo"):
                $this->getMemberInfo();
                $this->render("myInfo");
                break;
            
            case($page == "listMembers"):
                $this->showMembers();
                break;

            case($page == "listEmployees"):
                $this->showEmployees();
                break;

            case($page == "deleteMemberNow"):
                $this->deleteMemberNow();
                break;

            case($page == "deleteEmployeeNow"):
                $this->deleteEmployeeNow();
                break;
        }
    }

    /**
     * Show the informatin about the Member in Zaxon.
     * @return the array with the member and render to the updateMember page.
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
     * Get the employee update. 
     * Get new input value from an external variable. 
     * @return render to the new page updateEmployee and return the $data
     * with the $employee 
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
     * Get the new input value from an external variable and stores 
     * it in the $update.. values and updates the db.
     * @return Render the updated listMembers page. 
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
        
        return $this->render("listMembers");
    }

    /**
     * Update the information about the Employee
     * Get the new input value from an external variable 
     * and saves it in $update... values and updates the db.
     * @return Render  the updated page listEmployees.
     */
    public function updateEmployee() {

        $employeeModel = $GLOBALS["employeeModel"];

        // set the value in the update...
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
     * Get the new input value and saves it in $update... values
     * Get information about one member by its $Membership_Number
     * @return render  to the new page myInfo and send with $data with the updated 
     * information about the $member
     */
    public function updateOneMember() {

        $memberModel = $GLOBALS["memberModel"];
        // set the value in the update
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
     * Returns the info of the member who is logged in.
     * @return Render to the new page updateInformation
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
     * @return Render to the new page listMembers and return with
     * $data with the $inluded_members from the db.
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
     * @return Render to the new page listEmployee and return with
     * $data with the $included_employees from the db.
     */
    public function showEmployees() {

        $employeeModel = $GLOBALS["employeeModel"];

        // get all the employees from the db.
        $included_employee = $employeeModel->getAll();
        $data = array("included_employees" => $included_employee);
        return $this->render("listEmployees", $data);
    }
    
    /**
     * Deltes one member from the db.
     */
    public function deleteMemberNow() {

        $memberModel = $GLOBALS["memberModel"];
        if (isset($_REQUEST['membershipnr'])) {
            $membershipnr = $_REQUEST['membershipnr'];
            $memberModel->deleteMember($membershipnr);
        }
        $this->showMembers();
    }

    /**
     * Deletes one employee from the db.
     */
    public function deleteEmployeeNow() {

        $employeeModel = $GLOBALS["employeeModel"];
        if (isset($_REQUEST['employeeID'])) {
            //collect value of input field.
            $employeeID = $_REQUEST['employeeID'];
            $employeeModel->deleteEmployee($employeeID);
        }
        $this->showEmployees();
    }
}
