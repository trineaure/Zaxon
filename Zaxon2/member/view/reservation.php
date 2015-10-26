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

                    <div>
                        <b><p>Reserver en time</p></b><br>
                         
                         <form action="?page=reservationComplete" method="post">
                            <p>Reser vasjons Dato: <input type="text" id="datetimepicker3" placeholder="1995-06-26" name="givenReservation_date" class="register-input" required/></p>
                            
                            <p>EmployeeID: <input type="number"placeholder="321" name="givenEmployeeID" class="register-input" required/></p>
                            <p>TID: <input type="button" value="10:00" name="time"/></p>
                            
                            <style>
                    table, th, td {
                        border: 1px solid black;
                        padding: 5px;
                    }
                    table {
                        border-spacing: 30px;
                    }
                    </style>
                    </head>
                    <p>Velg tid</p>
                    <table style="width:10%"><p align='center'>
                      <tr>
                        <td><input type="button" value="10:00" name="time"></td>
                        <td><input type="button" value="10:30" name="time"></td>	
                        <td><input type="button" value="11:00" name="time"></td>
                        <td><input type="button" value="11:30" name="time"></td>
                      </tr>
                       <tr>
                        <td><input type="button" value="12:00" name="time"></td>
                        <td><input type="button" value="12:30" name="time"></td>	
                        <td><input type="button" value="13:00" name="time"></td>
                        <td><input type="button" value="13:30" name="time"></td>
                      </tr>
                       <tr>
                        <td><input type="button" value="14:00" name="time"></td>
                        <td><input type="button" value="14:30" name="time"></td>	
                        <td><input type="button" value="15:00" name="time"></td>
                        <td><input type="button" value="15:30" name="time"></td>
                      </tr>
                        <tr>
                        <td><input type="button" value="16:00" name="time"></td>
                        <td><input type="button" value="16:30" name="time"></td>	
                        <td><input type="button" value="17:00" name="time"></td>
                        <td><input type="button" value="17:30" name="time"></td>
                      </tr>
                      
                    </table>
                            
                            
                            
                            <input id="submit" type="submit" name="submit" value="Submit" />
                        </form>
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
	format:'d/m/Y',
	formatDate:'Y/m/d'
        

});

</script>