<?php

require_once("tempController.php");

class updateController extends tempController {

    public function show($page) {
        if ($page == "updateMember") {
            $this->updateMemberShow();
        } else if ($page == "updateMemberNow") {
            $this->updateMemberNow();
        }
    }

    /**
     * Show the informatin about the Member in Zaxon.
     * 
     */
    public function updateMemberShow() {

        $memberModel = $GLOBALS["memberModel"];

        $updateFirst_name = filter_input(INPUT_POST, "First_name");
        $updateLast_name = filter_input(INPUT_POST, "Last_name");
        $updateBirth = filter_input(INPUT_POST, "Birth");
        $updatePhone_Number = filter_input(INPUT_POST, "Phone_Number");
        $Membership_Number = filter_input(INPUT_POST, "Membership_Number");

        $data = array(
            "First_name" => $updateFirst_name,
            "Last_name" => $updateLast_name,
            "Birth" => $updateBirth,
            "Phone_Number" => $updatePhone_Number,
            "Membership_Number" => $Membership_Number
        );
        return $this->render("updateMember", $data);
    }

    /**
     * Update the information about the member
     * @return type
     */
    public function updateMemberNow() {

        $memberModel = $GLOBALS["memberModel"];

        $updateFirst_name = $_REQUEST['First_name'];
        $updateLast_name = $_REQUEST['Last_name'];
        $updateBirth = $_REQUEST['Birth'];
        $updatePhone_Number = $_REQUEST['Phone_Number'];
        $Membership_Number = $_REQUEST['Membership_Number'];

        $update = $memberModel->updateMember($updateFirst_name, $updateLast_name, $updateBirth, $updatePhone_Number, $Membership_Number);
        $data = array("update" => $update,);
        return $this->render("updateMemberNow", $data);
    }

}
