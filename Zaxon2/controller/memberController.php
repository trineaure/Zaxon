<?php

require_once("tempController.php");

//Represents home page
class memberController extends tempController {
    /**
     * Render "Home" View
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
    
    private function showCustomersAction() {
       }
    
    private function addCustomerAction(){
        // Find "2"customerName" in parameter in request.
        $custimerName = $_REQUEST["customerName"];
        if(!$customerName){
            // no customer name supplied, redirect to customer list
            return $this->showCustomersAction();
        }
        
        // Try to add new customers, Set action response code - success or not
        $customerModel = $GLOBALS["customerModel"];
        $added = $customerModel->add($customerName);
       
        // Render the page
        $data = array(
            "added"=> $added,
            "customerName" => $customerNaame,
            );
        return $this->render("customerAdd", $data);
    }
    }
    
    
    
    


/**    
  *  $fName = $_POST['First_name'];
  *  $lName = $_POST['Last_name'];
   * $birth = $_POST['Birth'];
   * $phone_Number = $_POST['Phone_Number'];
   * $Login_Password = $_POST['Login_Password'];
   * $confirm_password = $_POST['confirm_password'];
*/     
