<?php

require_once("tempController.php");

//Represents home page
class memberController extends tempController {

    /**
     * Render "Home" View

     * @param string $page
     */
    public function show($page) {

        switch ($page) {
            case($page == "memberAdd"):
                $this->showMemberAction();
                break;

            case($page == "memberAdded"):
                $this->addMemberAction();
                break;
        }
    }

    /**
     * Gets cusomers from CustomerModel and inserts them into cusomer template
     */
    private function showMemberAction() {

        $data2 = array("feiltlf" => false, "tlfnummer" => 0);
        return $this->render("memberAdd", $data2);
    }

    /**
     * Adding a member to the database and checks if the number they try to type
     * is already used. 
     * @return 
     * if the Phone_Number is already used render to page memberAdd
     * if the Phone_Number is not ussed complete the adding of a member and render to memeberAdded
     */
    private function addMemberAction() {
        $givenFirst_Name = filter_input(INPUT_POST, "givenFirst_name");
        $givenLastName = filter_input(INPUT_POST, "givenLast_name");
        $givenBirth = filter_input(INPUT_POST, "givenBirth");
        $givenPhone_Number = filter_input(INPUT_POST, "givenPhone_Number");
        $givenLogin_Password = filter_input(INPUT_POST, "givenLogin_Password");    
        //The sha1() function calculates the SHA-1 hash of a string.
        $str = "$givenLogin_Password";
        $Login_Password_encrypted = sha1($str);

        $memberModel = $GLOBALS["memberModel"];
        $numbers = $memberModel->getAllNumbers();

        //check's if there are any phone number = $givePhone_number 
        // if true. Render the page again.   
        foreach ($numbers as $number) {

            if ($number["Phone_Number"] == $givenPhone_Number) {
                $data2 = array(
                    "feiltlf" => "true",
                    "tlfnummer" => $givenPhone_Number,
                );
                return $this->render("memberAdd", $data2);
            }
        }
        // Add the information about the member
        $added = $memberModel->add($givenFirst_Name, $givenLastName, $givenBirth, $givenPhone_Number, $Login_Password_encrypted);

        // put the information in an array 
        $data = array(
            "added" => $added,
        );

        // send the information to the page
        return $this->render("memberAdded", $data);
    }

}
