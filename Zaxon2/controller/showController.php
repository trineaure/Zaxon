<?php

require_once("tempController.php");

class showController extends tempController {

    public function show($page) {
        if($page == "memberAdd")
            {
            $this ->showMemberAction();
            }           
        else if ($page == "memberAdded")
            {
            $this ->addMemberAction();
            
            }
      
      }
}

