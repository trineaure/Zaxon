<?php

require_once("tempController.php");

//Represents home page
class reservationController extends tempController {
    /**
     * Render "Home" View
     *@param string $page
     */
    public function show($page) {
        if($page == "reservationDateAndEmployee")
            {
            $this ->showReservationDateAndEmployeeAction();
            }   
        else if ($page == "reservationTime")    
            {
            $this ->showreservationTimeAction();
            }
            
        else if ($page == "reservationComplete")    
            {
            $this ->addReservationAction();
            }
            
        else if($page == "order")
            {
            $this ->render("order");
            }
            
        else if($page == "chooseTreatment")
           {
            $this->treatCat();
           }
        }
        
        
     private function showReservationDateAndEmployeeAction() {
         
         session_start();
        $_SESSION["Treatment"] = filter_input(INPUT_POST,"treatment");
         
        return $this->render("reservationDateAndEmployee");
        }
        
   
        
    private function showreservationTimeAction() {
        session_start();
        $_SESSION['givenEmployeeID'] = $_REQUEST["givenEmployeeID"];
        $_SESSION['givenReservation_date'] = $_REQUEST['givenReservation_date'];

        
        $reservationModel = $GLOBALS["reservationModel"];
        $_SESSION["timeIn"] = $reservationModel->getTimeOfDay($_SESSION['givenReservation_date'], $_SESSION['givenEmployeeID']);

        
        

//        foreach ($reservations as $reservation) {
//
//            if (($reservation["Reservation_Date"] == $_SESSION['givenReservation_date']) 
//                   && ($reservation["EmployeeID"] == $_SESSION['givenEmployeeID']))
//                {          
//                  $_SESSION['Time_In_Use'] = $reservation["Time_of_Day"];
//  
//                }
//        }
 return $this->render("reservationTime");
        }
        
        
        
        
    private function addReservationAction()
    {
        
        session_start();
        $givenReservation_date = $_SESSION['givenReservation_date'];
        $givenMembership_number = $_SESSION["MembershipNumber"];
        $givenEmployeeID = $_SESSION['givenEmployeeID'];
        $givenTime = filter_input(INPUT_POST,"time"); // denne skal vi bruke, istenden for $_REQUEST
        
        
        
        echo $givenReservation_date;
        // Try to add new customers, Set action response code - success or not
        $reservationModel = $GLOBALS["reservationModel"];
        
        
        
        $added = $reservationModel->add($givenReservation_date,$givenTime,$givenMembership_number, $givenEmployeeID);
        
        $data = array(
            "added" => $added,
        );

        return $this->render("reservationComplete", $data);
    }
    
           
    public function getAllTreatments() {
        $treatmentModel = $GLOBALS["treatmentModel"];
        $allTheTreatments = $treatmentModel->getAll();
        //$data = array("allTheTreatments" => $allTheTreatments);
        return $allTheTreatments;
    }
    
    public function getAllCategorys() {
        $categoryModel = $GLOBALS["categoryModel"];
        $allCategorys = $categoryModel->getAll();
        return $allCategorys;
//$data2 = array("allCategorys" => $allCategorys);
        //return $data2;
        //return $this->render("testTreatment", $data2);
    }
    
    
    public function treatCat() {
        $categorysWithTreatments = array();
        $allCategorys = $this->getAllCategorys();
        foreach($allCategorys as $category) {
            $treatmentsByCat = $this->getTreatmentsByCat($category["Category_Name"]);
           $categorysWithTreatments [ $category["Category_Name"]] =  $treatmentsByCat;
        }
        $GLOBALS["categorysWithTreatments"] = $categorysWithTreatments;
        
                
        return $this->render("chooseTreatment");
    }
    
    public function getTreatmentsByCat($category) {
        $treatmentModel = $GLOBALS["treatmentModel"];
        $treatmentsByCat = $treatmentModel->getByCategory($category);
        //$data3 = array("treatmentsByCat" => $treatmentsByCat );
        //return $data3;
        return $treatmentsByCat;
        //return $this->render("testTreatment", $data3);
    }
    

}

