<?php

require_once("tempController.php");

//Represents home page
class employeeController extends tempController {
    /**
     * Render "Home" View
     *@param string $page
     */
    public function show($page) {
        if($page == "employeeAdd")
            {
            $this ->showEmployeeAction();
            }   
        else if ($page == "employeeAdded")    
            {
            $this ->addEmployeeAction();
            }
        }
        
        
     private function showEmployeeAction() {
         
          $data2 = array("feiltlf" => false,"tlfnummer" => 0,
                  
              );
         
        return $this->render("employeeAdd",$data2);
        }


    private function addEmployeeAction(){
            
            $givenF_Name = $_REQUEST['First_name'];
            $givenL_Name = $_REQUEST['Last_name'];
            $givenBirth = $_REQUEST['Birth'];
            $givenPhone_Number = $_REQUEST['Phone_Number'];
            $givenHome_Address = $_REQUEST['Home_Address'];
            $givenZip_Code = $_REQUEST['Zip_Code'];
            $givenLogin_Password = $_REQUEST['Login_Password'];
            $givenExtended_Access = $_REQUEST['Extended_Access'];
        // Try to add new customers, Set action response code - success or not
        $employeeModel = $GLOBALS["employeeModel"];
        $numbers = $employeeModel->getAllNumbers();
        
        //check's if there are any phone number = $givePhone_number 
        // if true. Render the page again.   
        foreach ($numbers as $number) {

            if ($number["Phone_Number"] == $givenPhone_Number) {
                $data2 = array(
                    "feiltlf" => "true",
                    "tlfnummer" => $givenPhone_Number,
                );
                return $this->render("employeeAdd", $data2);
            }
        }
 
        $added = $employeeModel->add
                ($givenF_Name, $givenL_Name, $givenBirth, $givenPhone_Number, $givenHome_Address, $givenZip_Code, $givenLogin_Password, $givenExtended_Access );
        
       $data = array(
           "added" => $added,
           
                );
        
        return $this->render("employeeAdded",$data);
           // skal brukes til å liste alle employees        
        
//         $employeeModel = $GLOBALS["employeeModel"];
//        $employeeAdd = $employeeModel->getAll();
//        $data = array("employeeAdd" => $employeeAdd);
//        return $this->render("employeeAdd",$data); 
        }
     }

