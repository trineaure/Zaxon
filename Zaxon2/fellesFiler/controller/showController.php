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
            $this ->showMyReservations($_SESSION["MembershipNumber"]);
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
     * @return $this->render("myReservations")
     */
    public function showMyReservations($memberID){
       $reservation_treatmentModel = $GLOBALS["reservation_treatmentModel"];
       $GLOBALS["reservations"] = $reservation_treatmentModel->getReservationInfo($memberID);
        return $this->render("myReservations");
    }         

}
