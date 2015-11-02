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
        //er bare for Master og Admin
        else if($page == "memberOrder")
            {
            $this ->showMemberOrder();
            }    
            
        else if($page == "chooseTreatment")
           {
            $this->treatCat();
           }
    }
     
    
    private function showMemberOrder(){
             $memberModel = $GLOBALS["memberModel"];
        $members = $memberModel->getAll();

        $data = array("members" => $members);
        
        $memberModel2 = $GLOBALS["memberModel"];
            if (isset($_REQUEST['searchKeyword'])) {
                $searchKeyword = $_REQUEST['searchKeyword'];
                $members2 = $memberModel2->searchMember($searchKeyword);
            } 
            else {
                $members2 = array();
            }
            $data2 = array("searchResults" => $members2);
        return $this->render("memberOrder", $data, $data2);       
    }
        
        
        
    public function searchMember() {
        $memberModel = $GLOBALS["memberModel"];
        if (isset($_REQUEST['searchKeyword'])) {
            $searchKeyword = $_REQUEST['searchKeyword'];
            $members = $memberModel->searchMember($searchKeyword);
        } else {
            $members = array();
        }
        $data = array("searchResults" => $members);
        return $this->render("searchMember", $data);
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

        return $this->render("reservationTime");
    }
        
        
        
        
    private function addReservationAction(){
        session_start();
        $givenReservation_date = $_SESSION['givenReservation_date'];
        $givenMembership_number = $_SESSION["MembershipNumber"];
        $givenEmployeeID = $_SESSION['givenEmployeeID'];
        $givenTime = filter_input(INPUT_POST,"time"); // denne skal vi bruke, istenden for $_REQUEST

        echo $givenReservation_date;
        // Try to add new customers, Set action response code - success or not
        $reservationModel = $GLOBALS["reservationModel"];
        
        $added = $reservationModel->add($givenReservation_date,$givenTime,$givenMembership_number, $givenEmployeeID);
        $data = array("added" => $added);
        return $this->render("reservationComplete", $data);
    }
    
           
    public function getAllTreatments() {
        $treatmentModel = $GLOBALS["treatmentModel"];
        $allTheTreatments = $treatmentModel->getAll();
        return $allTheTreatments;
    }
    
    public function getAllCategorys() {
        $categoryModel = $GLOBALS["categoryModel"];
        $allCategorys = $categoryModel->getAll();
        return $allCategorys;
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
        return $treatmentsByCat;
    }
    

}

