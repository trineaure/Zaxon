<?php
//checks if a Master are logged in 
session_start();
if ( empty($_SESSION["MasterAreLoggedIn"]))
{
    header("Location:../guest/?page=login");
}

?>

<!-- START: Main area where content goes -->
                <main>
    <p> Velkommen Master </p>
    
<div id="small">
        <p> Ansatt</p>

                 <a href="?page=showEmployee" class="smallButton">Vis ansatte</a>
                <a href="?page=searchEmployee" class="smallButton">Søk i ansatte</a>
                <a href="?page=deleteEmployee" class="smallButton">Slett ansatt</a>
                <a href="?page=employeeAdd" class="smallButton">Legg til ansatt</a>
                
    </div>



    <div id="small">
        <p> Kunde </p>

                 <a href="?page=showMembers" class="smallButton">Vis kunder</a>
                 <a href="?page=searchMember" class="smallButton">Søk i kunder</a>
                 <a href="?page=deleteMember" class="smallButton">Slett kunde</a>
                <a href="?page=memberOrder" class="smallButton">Legg inn bestilling</a>
               
    </div>



</main>
                <!-- END -->
