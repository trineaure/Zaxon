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
        if($page == "memberAdd")
            {
            $this ->showMemberAction();
            }           
        else if ($page == "memberAdded")
            {
            $this ->addMemberAction();
            
            }
      
      }
      
    /**
     * Gets cusomers from CustomerModel and inserts them into cusomer template
     * @return bool true on success.
     */
    private function showMemberAction() {
        //Get all customers from database
        // @var CustomerModel $customerModel
        $memberModel = $GLOBALS["memberModel"];
        $memberAdd = $memberModel->getAll();
        
        // Get previously used name in the form
        //isset bestemmer om variabelen er ett sett og er ikke null. 
        $Phone_Number = isset($_REQUEST["Phone_Number"]) ? $_REQUEST["Phone_Number"] : "";
        // and secure it
        $Phone_Number = htmlspecialchars($Phone_Number);
        
        // i arrayen lå det orginalt bare member og phonenumber
        $data = array(
           "memberAdd" => $memberAdd,
           
                );
            return $this->render("memberAdd", $data);
       }
       
     /**
      * 
      * given
      * Adding a member to the database
      * @return type
      */       
    private function addMemberAction(){
        // Find "customerName" in parameter in request.
        $givenFirst_Name = $_POST['givenFirst_name'];
        $givenLastName = $_POST['givenLast_name'];
        $givenBirth = $_POST['givenBirth'];
        $givenPhone_Number = $_POST['givenPhone_Number'];
        $givenLogin_Password = $_POST['givenLogin_Password'];
        //$givenConfirm_password = $_POST['givenConfirm_password'];
        
        // Try to add new customers, Set action response code - success or not
        $memberModel = $GLOBALS["memberModel"];
       
        $added = $memberModel->add($givenFirst_Name, $givenLastName, $givenBirth, $givenPhone_Number, $givenLogin_Password);
       // echo $givenFirst_Name . $givenLastName . $givenBirth . $givenPhone_Number  . $givenLogin_Password;
        
       $data = array(
           "added" => $added,
           
                );
        
        return $this->render("memberAdded",$data);
    }
    
    

     
     }
