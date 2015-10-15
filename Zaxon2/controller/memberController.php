<?php

require_once("tempController.php");

//Represents home page
class memberController extends tempController {
    /**
     * Render "Home" View
     *@param string $page
     */
    public function show($page) {
        if($page == "member"){
           $this ->render("member");
        }           
        else if ($page == "memberAdd"){
        $this ->render("memberAdd");}
        
    }
    
}
