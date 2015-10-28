<?php
//checks if a Member Are Logged In
session_start();
if ( empty($_SESSION["MemberAreLoggedIn"]))
{
    header("Location:../guest/?page=login");
}
echo "Ditt MemberID er: " . $_SESSION["MembershipNumber"];
?>
<main>
 <div class="timeButton">
                    <div>
                        <b><p>Reserver en time</p></b><br>
                         
                         <form action="?page=reservationComplete" method="post">
                            <p>Reser vasjons Dato: <input type="text" id="datetimepicker3" placeholder="1995-06-26" name="givenReservation_date" class="register-input" required/></p>
                            
                            <p>EmployeeID: <input type="number"placeholder="321" name="givenEmployeeID" class="register-input" required/></p>
                            <input type="radio" id="10_00" value="10:00" name="time">
                            <label for="10_00">10:00</label>
                            
                            <input id="submit" type="submit" name="submit" value="Submit" />

                     
                         
                         </form>
                    </div>
</div>
     

           
</main>

<script>/*
window.onerror = function(errorMsg) {
	$('#console').html($('#console').html()+'<br>'+errorMsg)
}*/





//Viser kalenderen  

$('#datetimepicker3').datetimepicker({
	inline:true
});
//Viser bare uker
$('#datetimepicker3').datetimepicker({
	
	lang:'no',
	timepicker:false,
	format:'d-m-Y',
	formatDate:'Y-m-d'
        

});

</script>