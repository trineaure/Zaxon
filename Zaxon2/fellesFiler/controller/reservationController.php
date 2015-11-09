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
        if ($page == "reservationTime")    
            {
            $this ->showreservationTimeAction();
            }
            
       if ($page == "reservationComplete")    
            {
            $this ->addReservationAction();
            }
            
        if($page == "order")
            {
            $this ->render("order");
            }
        //er bare for Master og Admin
        if($page == "memberOrder")
            {
            $this ->searchMemberOrder();
            }    
            
        if($page == "chooseTreatment")
           {
            $this->treatCat();
           }
        if($page == "reservationTreatmentFinish")
        {            
            $this->showFinish();
        }
           
    }
    
    public function searchMemberOrder() {
        $memberModel = $GLOBALS["memberModel"];
        if (isset($_REQUEST["searchKeyword"])) {
            $searchKeyword = $_REQUEST["searchKeyword"];
            $members = $memberModel->searchMember($searchKeyword);
        } else {
            $members = array();
        }
        $data = array("searchResults" => $members);
        return $this->render("memberOrder", $data);
    }

    /*
     * Stores the chosen treatments from all off the categorys in a session. 
     */
    private function showReservationDateAndEmployeeAction() {  
        $categorys = $this->getAllCategorys();
        $treatmentArray = array();
        foreach ($categorys as $category) {
            $temp = filter_input(INPUT_POST, $category["Category_Name"]);
            if($temp != null){
                array_push($treatmentArray, $temp);
           }
        }
        $_SESSION["treatmentArray"] = $treatmentArray;
        $employeeModel = $GLOBALS["employeeModel"];
        $included_employee = $employeeModel->getAll();
        $data = array("included_employee" => $included_employee);
        return $this->render("reservationDateAndEmployee", $data);
    }
        
   
        
    private function showreservationTimeAction() {
        //session_start();
        $_SESSION["givenEmployeeID"] = $_REQUEST["givenEmployeeID"];
        $_SESSION["givenReservation_date"] = $_REQUEST["givenReservation_date"];

        $reservationModel = $GLOBALS["reservationModel"];
        $_SESSION["timeIn"] = $reservationModel->getTimeOfDay($_SESSION['givenReservation_date'], $_SESSION['givenEmployeeID']);

        return $this->render("reservationTime");
    }
        
        
        
        
    private function addReservationAction(){
        $_SESSION["givenTime"] = filter_input(INPUT_POST,"time"); // denne skal vi bruke, istenden for $_REQUEST
        
        return $this->render("reservationComplete");
    }
    
    /*
     * Returns all the categorys stored in the database
     */
    public function getAllCategorys() {
        $categoryModel = $GLOBALS["categoryModel"];
        $allCategorys = $categoryModel->getAll();
        return $allCategorys;
    }
    
    /*
     * Returns an array with the all the treatments organized by category.
     * The categorys are the keys for other arrays wich contains the treatments.
     */
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
    
    /*
     * Returns all the treatments from a chosen category
     */
    public function getTreatmentsByCat($category) {
        $treatmentModel = $GLOBALS["treatmentModel"];
        $treatmentsByCat = $treatmentModel->getByCategory($category);
        return $treatmentsByCat;
    }
    /*
     * Shows reservationTreatmentFinish
     */
    public function showFinish(){
        $givenReservation_date = $_SESSION["givenReservation_date"];
        $givenMembership_number = $_SESSION["MembershipNumber"];
        $givenEmployeeID = $_SESSION["givenEmployeeID"];
        $givenTime = $_SESSION["givenTime"];

        // Try to add new customers, Set action response code - success or not
        $reservationModel = $GLOBALS["reservationModel"];
        $reservation_treatmentModel = $GLOBALS["reservation_treatmentModel"];
        
        $added = $reservationModel->add($givenReservation_date,$givenTime,$givenMembership_number, $givenEmployeeID);
        //If true, the reservation number is fetched by using the given time, date and employeeID.
        //The reservation number is then used to add all the treatments the user has chosen. 
        if($added == true) {
            $resID = $reservationModel->getReservationNr($givenReservation_date, $givenTime, $givenEmployeeID);
            $added = $reservation_treatmentModel->addTreatmentsToRes($resID, $_SESSION["treatmentArray"]);
        }
        return $this->render("reservationTreatmentFinish");
    }
    

}

