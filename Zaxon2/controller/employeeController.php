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
            $this ->render("employeeAdd");
            }
        }
        
        
     private function showEmplyeeAction() {

        $employeeModel = $GLOBALS["employeeModel"];
        $employeeAdd = $employeeModel->getAll();
        $data = array("employeeAdd" => $employeeAdd);
            return $this->render("employeeAdd", $data);
       }
                      

        private function addEmployeerAction(){
            
            $givenF_Name = $_POST['First_name'];
            $givenL_Name = $_POST['Last_name'];
            $givenBirth = $_POST['Birth'];
            $givenPhone_Number = $_POST['Phone_Number'];
            $givenHome_Address = $_POST['Home_Address'];
            $givenZip_Code = $_POST['Zip_Code'];
            $givenLogin_Password = $_POST['Login_Password'];
        
        // Try to add new customers, Set action response code - success or not
        $employeeModel = $GLOBALS["employeeModel"];
        
        if ($employeeModel -> checkIfNumberIsUsed($givenPhone_Number))
        {
           return $this->render("home");
            
        }
        else
        {
 
            $added = $employeeModel->add($givenF_Name, $givenL_Name, $givenBirth, $givenPhone_Number, $givenLogin_Password);
        
       $data = array(
           "added" => $added,
           
                );
        
        return $this->render("login",$data);
            
            
        }
        
        }
       
     }

