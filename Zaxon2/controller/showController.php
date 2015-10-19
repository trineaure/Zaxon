<?php

require_once("tempController.php");

class showController extends tempController {

    public function show($page) {
        if($page == "showMembers")
            {
            $this ->showMembers();
            }           
        else if ($page == "memberAdded")
            {
            $this ->addMemberAction();
            
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
//       
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
     * Get information about the user.
     */
    function getUserInfo($Phone_Number) {
         $memberModel = $GLOBALS["memberModel"];

        $result = $memberModel->getOneByPhone();
    
        return $result;
        
    }
   
    function getEmployeeInfo($Phone_Number) {
       $employeeModel = $GLOBALS[employeeModel];
       
       $result = $employeeModel->getOneByPhone();
       
       return result;
    }
    
   
   
    /**
     * getNumMembers - return the number of signed-up users
     * of the website
     *     
     *  
    public function getNumMembers() {
    if($thi->num_members < 0) {
        $q = "SELECT * FROM ". memberModel;
        $result 
    }
      SKAL GJØRE OM I FUNKSJONEN
      function getNumMembers(){
      if($this->num_members < 0){
         $q = "SELECT * FROM ".TBL_USERS;
         $result = mysql_query($q, $this->connection);
         $this->num_members = mysql_numrows($result);
      }
      return $this->num_members;
   }
     */
    
    /**
     * Catches informatiob about details 
     * like owner, gropu, size, time of last change etc.
     *
    public function catchAllInfoMembers() {
  
    print_r(stat('members'));
        $memberModel = $GLOBALS["memberModel"];   
        $resultSet = $memberModel->getAll();
    
        if($resultSet -> num_rows != 0){
            while($rows = $memberModel->fetch_assoc())
        {
            $givenFirst_Name = rows['First_Name'];
            $givenLastName = rows['Last_Name'];
            $givenBirth = rows['Birth'];
            $givenPhone_Number = rows['Phone_Number'];
            $givenLogin_Password = rows['Login_Password'];
         echo "<p>Name: $givenFirst_Name $givenLastName <br> $givenBirth $givenPhone_Number $givenLogin_Password";   
                
        }
          
        } 
             
        else {
            echo "No result.";
        }
        } 
        */


}

