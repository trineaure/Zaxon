<?php

require_once("tempController.php");

class showController extends tempController {

    public function show($page) {
        if ($page == "showMembers") {
            $this->showMembers();
        }
        if ($page == "showEmployee") {
            $this->showEmployee();
        }
        if ($page == "myReservations")
            {
            $this ->showMyReservationsAction();
            }    
      
    }

    /**
     * Function that show all the members in Zaxon
     */
    public function showMembers() {
        $memberModel = $GLOBALS["memberModel"];
        $included_members = $memberModel->getAll();
        $data = array("included_members" => $included_members);
        return $this->render("showMembers", $data);
    }

    /**
     * 
     * Function that shows all the employee's in Zaxon.
     */
    public function showEmployee() {
        $employeeModel = $GLOBALS["employeeModel"];

        $included_employee = $employeeModel->getAll();
        $data = array("included_employee" => $included_employee);
        return $this->render("showEmployee", $data);
    }
    /**
     * Shows the reservations to a member,
     * where $_SESSION["MemberAreLoggedIn"] is the MemberNumber
     * @return $this->render("myReservations")
     */
    public function showMyReservationsAction(){
        $memberModel = $GLOBALS["memberModel"];
//        $included_members = $memberModel->getOneByMemberNumber($_SESSION["MemberAreLoggedIn"]);
//        var_dump($included_members);
        return $this->render("myReservations");
    }
    
            

}
