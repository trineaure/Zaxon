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
        
           $data2 = array(
                  "feiltlf" => "false",
                  "tlfnummer" => 0,
                  
              );
        
            return $this->render("memberAdd",$data2);
       }
       
     /**
      * 
      * given
      * Adding a member to the database
      * @return type
      */       
    private function addMemberAction(){
        // Find "customerName" in parameter in request.
        $givenFirst_Name = $_REQUEST['givenFirst_name'];
        $givenLastName = $_REQUEST['givenLast_name'];
        $givenBirth = $_REQUEST['givenBirth'];
        $givenPhone_Number = $_REQUEST["givenPhone_Number"];
        $givenLogin_Password = $_REQUEST['givenLogin_Password'];
        
        
        // Try to add new customers, Set action response code - success or not
        $memberModel = $GLOBALS["memberModel"];

//        if ($memberModel->checkIfNumberIsUsed($givenPhone_Number)) {
//            return $this->render("home");
//        } else {
//
//            $added = $memberModel->add($givenFirst_Name, $givenLastName, $givenBirth, $givenPhone_Number, $givenLogin_Password);
//
//            $data = array(
//                "added" => $added,
//            );
//
//            return $this->render("memberAdded", $data);
//        }
        
        
        
        
        $numbers = $memberModel->getAllNumbers();

        foreach ($numbers as $number) {

            if ($number["Phone_Number"] == $givenPhone_Number) {
                $data2 = array(
                    "feiltlf" => "true",
                    "tlfnummer" => $givenPhone_Number,
                );
                return $this->render("memberAdd", $data2);
            }
        }
        $added = $memberModel->add($givenFirst_Name, $givenLastName, $givenBirth, $givenPhone_Number, $givenLogin_Password);

        $data = array(
            "added" => $added,
        );

        return $this->render("memberAdded", $data);
    }

}
