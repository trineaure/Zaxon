<?php

require_once("tempController.php");

//Represents home page
class employeeController extends tempController {
    /**
     * Render "Home" View
     *@param string $page
     */
    public function show($page) {
        if($page == "employeeAdd")
            {
            $this ->render("employeeAdd");
            }
        }
    
                         $fName = $_POST['First_name'];
                        $lName = $_POST['Last_name'];
                        $birth = $_POST['Birth'];
                        $Phone_Number = $_POST['Phone_Number'];
                        $Home_Address = $_POST['Home_Address'];
                        $Zip_Code = $_POST['Zip_Code'];
                        $Login_Password = $_POST['Login_Password'];
                        $confirm_password = $_POST['confirm_password'];
}

