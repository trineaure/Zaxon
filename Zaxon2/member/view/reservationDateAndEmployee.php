<?php
//checks if a Member Are Logged In

if ( empty($_SESSION["MemberAreLoggedIn"]))
{
    header("Location:../guest/?page=login");
}
echo "Ditt MemberID er: " . $_SESSION["MembershipNumber"];

?> 
<main> <?php var_dump($_SESSION["treatmentArray"]);?>

        <div>
            <b><p>Reserver en time</p></b>

             <form action="?page=reservationTime" method="post">
                <p>EmployeeID: <input type="number"placeholder="321" name="givenEmployeeID" class="input-textarea" required/></p>
                <br>
                <p><input type="text" id="datetimepicker3" placeholder="1995-06-26" name="givenReservation_date" required/></p>
                <input id="submit" type="submit" name="submit" value="Neste" />
                </form>                     
        </div>
     

           
</main>

<script>





//Viser kalenderen  

$('#datetimepicker3').datetimepicker({
	inline:true
});
//Viser bare uker
$('#datetimepicker3').datetimepicker({
	
	lang:'no',
	timepicker:false,
	format:'Y-m-d',
	formatDate:'Y-m-d'
        

});

</script>