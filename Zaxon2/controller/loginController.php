<?php

require_once("tempController.php");

//Represents home page
class loginController extends tempController {
    /**
     * Render "Home" View
     *@param string $page
     */
    public function show($page) {
        if($page == "logindf")
            {
            $this ->loginConfig();
            }
            else {
                $this->showLogin();
            }
        }    
            
    public function showlogin() 
    {
        return $this->render("login");
    }
    
    
     

        private function loginConfig()
   {
     $Username = $_POST["Phone_number"];
      $Password = $_POST["Login_Password"];   
        // Get all members from database
       $memberModel = $GLOBALS["memberModel"];
        $Members = $memberModel->getAll(); //holds all members. + her skal jeg legge til emploees senere. -Gard
        
       foreach ($Members as $member){
            if ($member["Phone_number"] == $Username)
            {
                if($member["Login_Password"] == $Password)
                    {
                        $_SESSION["AreLoggedIn"] = "true";
                        echo 'yoooooooo, zaxon';
                    }
            }
       }
   }
}








    