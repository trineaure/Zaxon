<?php

require_once("tempController.php");

class showController extends tempController {

    public function show($page) {
        if($page == "showMember")
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
        
        $members = $memberModel->getAll();
    }
    /**
     * Function that shows all the employee's in Zaxon
     */
    public function showEmloyee() {
    $employeeModel = $GLOBALS["employeeModel"];
    $employee = $employeeModel->getAll();
    }
    
    public function showEmployee(){
//        $employee = noe;
//        $employee = scandir($employee,1);        
//        print_r($employee);
//      
          $employeeModel = $GLOBALS["employeeModel"];
        
       $included_employee = $employeeModel->getAll();
       foreach ($included_employee as $employee) {
           echo "$employee\n"; 
    } 
}} 

