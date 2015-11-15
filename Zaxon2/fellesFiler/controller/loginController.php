<?php

require_once("tempController.php");

//Represents home page
class loginController extends tempController {

    /**
     * Render "Home" View
     * @param string $page
     */
    public function show($page) {

        switch ($page) {
            case($page == "login"):
                $this->showlogin();
                break;
            
            case($page == "loginConfig"):
                $this->loginConfig();
                break;
        }
    }
/**
 * 
 * @param String $givenUsername
 * @param String $Login_Password_encrypted
 */
    private function loginMember($givenUsername, $Login_Password_encrypted) {
        $_SESSION["MasterAreLoggedIn"] = false;
        $memberModel = $GLOBALS["memberModel"];
        $members = $memberModel->getAll();
        foreach ($members as $member) {
           
            if (($member["Phone_Number"] == $givenUsername) && ($member["Login_Password"] == $Login_Password_encrypted)) {
                //match
                $_SESSION["MemberAreLoggedIn"] = true;
                $_SESSION["MemberFirstName"] = $member['First_name'];
                $_SESSION["MembershipNumber"] = $member['Membership_number'];
                $_SESSION["MemberLastName"] = $member['Last_name'];
                $_SESSION["MemberBirth"] = $member['Birth'];
                $_SESSION["MemberPhone"] = $member['Phone_Number'];
                header("Location:../member/?page=home");
            }
        }
    }
/**
 * 
 * @param String $givenUsername
 * @param String $Login_Password_encrypted
 */
    private function loginEmployee($givenUsername, $Login_Password_encrypted) {

        $employeeModel = $GLOBALS["employeeModel"];
        $employees = $employeeModel->getAll();
        $Extended_Access = 1;
        $_SESSION["MasterAreLoggedIn"] = false;
        $_SESSION["EmployeeAreLoggedIn"] = false;
        foreach ($employees as $employee) {
            if (($employee['Phone_Number'] == $givenUsername) && ($employee['Login_Password'] == $Login_Password_encrypted)) {
                echo "Brukernavn eller passord stemmer ikke. :)";
                if (($employee['Extended_Access']) == $Extended_Access) {
                    $_SESSION["MasterAreLoggedIn"] = true;
                    $_SESSION["workerID"] = $employee['EmployeeID'];
//                    $_SESSION["MasterFirstName"] = $employee['First_name'];
//                    $_SESSION["MasterLastName"] = $employee['Last_name'];
//                    $_SESSION["MasterBirth"] = $employee['Birth'];
//                    $_SESSION["MasterPhone"] = $employee['Phone_Number'];
//                    $_SESSION["MasterHome_Address"] = $employee['Home_Address'];
//                    $_SESSION["MasterZip_Code"] = $employee['Zip_Code'];
                    header("Location:../master/?page=home");
                } else {

                    //match
                    $_SESSION["EmployeeAreLoggedIn"] = true;
                    $_SESSION["workerID"] = $employee['EmployeeID'];
                    header("Location:../admin/?page=home");
                }
            }
        }
    }
/**
 * Show the login.
 * @return Render to the login page.
 */
    private function showlogin() {
        return $this->render("login");
    }

    /**
     * 
     * @return Render to the loginError page.
     */
    private function loginConfig() {
        $givenUsername = filter_input(INPUT_POST,"Phone_Number");
        $givenPassword = filter_input(INPUT_POST,"Login_Password");
        // Get all members from database
        
       //The sha1() function calculates the SHA-1 hash of a string.
        $str = "$givenPassword";
        $Login_Password_encrypted = sha1($str);

        $this->loginMember($givenUsername, $Login_Password_encrypted);

        $this->loginEmployee($givenUsername, $Login_Password_encrypted);

        //error message
        if (($_SESSION["MemberAreLoggedIn"] == false) || ($_SESSION["EmployeeAreLoggedIn"] == false) || ($_SESSION["MasterAreLoggedIn"] == false)) {
            return $this->render("loginError");
        }
    }

}
