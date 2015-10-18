<?php

require_once("tempController.php");

class showController extends tempController {

    public function show($page) {
        if($page == "showMember")
            {
            $this ->showMembers();
            }           
//        else if ($page == "memberAdded")
//            {
//            $this ->addMemberAction();
//            
//            }
      
    }
      
    public function showMembers() {
        $memberModel = $GLOBALS["memberModel"];
        
        $members = $memberModel->getAll();
    }
}

