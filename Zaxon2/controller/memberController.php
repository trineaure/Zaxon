<?php

require_once("tempController.php");

//Represents home page
class memberController extends tempController {
    /**
     * Render "Home" View
     * Checks if the page is member or memberAdd, and if it is
     * 
     *@param string $page
     */
    public function show($page) {
        if($page == "member")
            {
            $this ->render("member");
            }           
        else if ($page == "memberAdd")
            {
            $this ->render("memberAdd"); 
      }
           
    }
   /**Samme som eksemplet. 
    public function show($page) {
        if($page == "memberAdd") {
            $this->addMemberAction();
        } else if ($page == "member"){
            $this->showMembersAction();
        }
    }
    */
    
    /**
     * Gets cusomers from CustomerModel and inserts them into cusomer template
     * @return bool true on success.
     */
    private function showMemberAction() {
        //Get all customers from database
        // @var CustomerModel $customerModel
        $memberModel = $GLOBALS["memberModel"];
        $member = $memberModel->getAll();
        
        // Get previously used name in the form
        //isset bestemmer om variabelen er ett sett og er ikke null. 
        $tempPhone_Number = isset($_REQUEST["phone_Number"]) ? $_REQUEST["phone_Number"] : "";
        // and secure it
        $phone_Number = htmlspecialchars($phone_Number);
        
        $data = array(
            "member" => member,
            "phone_Number" => $phone_Number);
            return $this->render("member", $data);
       }
       
     /**
      * 
      * given
      * Adding a member to the database
      * @return type
      */  
    private function addMemberAction(){
        // Find "customerName" in parameter in request.
       // $memberName = $_REQUEST["memberName"];
        $givenMemberShip_number = $_REQUEST['givenMembership_number'];
        $givenFirst_Name = $_REQUEST['givenFirst_name'];
        $givenLastName = $_REQUEST['givenLast_name'];
        $givenbirth = $_REQUEST['givenBirth'];
        $givenPhone_Number = $_REQUEST['givenPhone_Number'];
        $givenLogin_Password = $_REQUEST['givenLogin_Password'];
        $givenConfirm_password = $_REQUEST['givenConfirm_password'];
        if(!$Phone_Number){
            // no customer name supplied, redirect to customer list
            return $this->showMemberAction();
        }
        // Try to add new customers, Set action response code - success or not
        $memberModel = $GLOBALS["memberModel"];
        $added = $memberModel->add( $givenMembership_number, $givenFirst_name, $givenLast_name, $givenBirth, $givenPhone_Number, $givenLogin_Password);
       
        // Render the page
        $data = array(
            "added"=> $added,
            "Phone_Number" => $givenPhone_Number,
            );
        return $this->render("Phone_Number", $data);
    }
    
    protected function render($templateName, $data = array()) {
        // Store data in global variables
        foreach ($data as $dataKey => $dataValue) {
            $GLOBALS[$dataKey] = $dataValue;
        }
        // Include template
        $templatePath = "view/{$templateName}.php";
        $success = true;
        if (!file_exists($templatePath)) return false;
        include($templatePath);
        return true;
    }
     }
