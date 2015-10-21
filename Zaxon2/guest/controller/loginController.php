<?php

require_once("tempController.php");

//Represents home page
class loginController extends tempController {
    /**
     * Render "Home" View
     *@param string $page
     */
    public function show($page) {
        if($page == "login")
            {
            $this ->showlogin();
            }
         else if ($page == "loginConfig")
            {
            $this ->loginConfig();
            
            } 
            
        }   
        
        
        
    private function loginMember($givenUsername, $givenPassword) {
        
        $memberModel = $GLOBALS["memberModel"];
        $members = $memberModel->getAll();
        $_SESSION["MemberAreLoggedIn"] = "false";
        foreach ($members as $member) {
            if ($member['Phone_Number'] == $givenUsername) {
                if ($member['Login_Password'] == $givenPassword) {
                    //match
                    $_SESSION["MemberAreLoggedIn"] = "true";
                    header("Location:../user/?page=home");
                    
                }
            }
        }
        
    }

    private function loginEmployee($givenUsername, $givenPassword) {
        
        $employeeModel = $GLOBALS["employeeModel"];
        $employees = $employeeModel->getAll();
        $_SESSION["EmployeeAreLoggedIn"] = "false";
        $_SESSION["MasterAreLoggedIn"] = "false";
        $Extended_Access = 0;
        foreach ($employees as $employee) {
            if ($employee['Phone_Number'] == $givenUsername) {
                
                if ($employee['Login_Password'] == $givenPassword) {
                    
                    if(($employee['Extended_Access']) == $Extended_Access)
                    {
                        $_SESSION["MasterAreLoggedIn"] = "true";
                        header("Location:../master/?page=home");
                    }
                    else{

                   //match
                    $_SESSION["EmployeeAreLoggedIn"] = "true";
                    header("Location:../admin/?page=home");
                    }
                }
            }
        }
        
        
    }
    
    
        private function loginMaster($givenUsername, $givenPassword) {
        
        $employeeModel = $GLOBALS["employeeModel"];
        $employees = $employeeModel->getAll();
        $_SESSION["EmployeeAreLoggedIn"] = "false";
        foreach ($employees as $employee) {
            if ($employee['Phone_Number'] == $givenUsername) {
                
                if ($employee['Login_Password'] == $givenPassword) {
                    //match
                    $_SESSION["EmployeeAreLoggedIn"] = "true";
                    header("Location:../admin/?page=home");
                   
                }
            }
        }
        
        
    }
    
    

    private function showlogin() {
        return $this->render("login");
    }

    private function loginConfig() {
        $givenUsername = $_REQUEST['Phone_Number'];
        $givenPassword = $_REQUEST['Login_Password'];
        // Get all members from database

        session_start();
        $this->loginMember($givenUsername, $givenPassword);


        $this->loginEmployee($givenUsername, $givenPassword);
        
        $this->loginMaster($givenUsername, $givenPassword);
        
        //error message
        if (($_SESSION["MemberAreLoggedIn"] == "false") && ($_SESSION["EmployeeAreLoggedIn"] == "false")) {
            return $this->render("aboutus");
        }
    }

}

//        header("Location:order");









    

