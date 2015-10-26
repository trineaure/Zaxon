<?php

require_once("tempController.php");

//Represents home page
class reservationController extends tempController {
    /**
     * Render "Home" View
     *@param string $page
     */
    public function show($page) {
        if($page == "reservation")
            {
            $this ->showReservationAction();
            }   
        else if ($page == "reservationComplete")    
            {
            $this ->addReservationAction();
            }
        }
        
        
     private function showReservationAction() {
         
          
         
        return $this->render("reservation");
        }
        
    private function addReservationAction()
    {
        
        session_start();
        $givenReservation_date = $_REQUEST['givenReservation_date'];
        $givenMembership_number = $_SESSION["MembershipNumber"];
        $givenEmployeeID = $_REQUEST["givenEmployeeID"];
        $givenTime = $_REQUEST["time"];
        // Try to add new customers, Set action response code - success or not
        $reservationModel = $GLOBALS["reservationModel"];
        
        
        
        $added = $reservationModel->add($givenReservation_date,$givenTime,$givenMembership_number, $givenEmployeeID);

        $data = array(
            "added" => $added,
        );

        return $this->render("reservationComplete", $data);
    }

}

