<main>
<?php
//checks if a Member Are Logged In
$unavailableTimes = $_SESSION["timeIn"];

//skriver ut variablen
var_dump($unavailableTimes);

if ( empty($_SESSION["MemberAreLoggedIn"]))
{
    header("Location:../guest/?page=login");
}



echo "Ditt MemberID er: " . $_SESSION["MembershipNumber"];
?> <p></p>  <?php
echo "Din Employee er : " . $_SESSION['givenEmployeeID'];
?>
<p></p>  <?php
echo "Din dato er : " . $_SESSION['givenReservation_date'];
?>
<p></p><?php echo "Tid som er valgt allerede for denne datoen er : ";
    
 //printer ut tidene som er i bruk 
     foreach($unavailableTimes as $tempTime){
            
            echo date("H:i", strtotime($tempTime["Time_of_Day"]));
        }
        ?>
<p></p>


<script>
     
     // Det Trine skal gjøre:
     //
     
    
    for (i=1; i<17:30 ; i++ ) 
            {
                
                
            }
    
    
    
    
    var a = document.getElementById(<?php echo date("H:i", strtotime($tes["Time_of_Day"]));  ?>)
    
    
        
    var ha = document.getElementById(10:00)
    var b = document.getElementById(10:30)
    var c = document.getElementById(11:00)
    var d = document.getElementById(11:30)
    var e = document.getElementById(12:00)
    var f = document.getElementById(12:30)
    var g = document.getElementById(13:00)
    var h = document.getElementById(13:30)
    var i = document.getElementById(14:00)
    var j = document.getElementById(14:30)
    var k = document.getElementById(15:00)
    var l = document.getElementById(15:30)
    var m = document.getElementById(16:00)
    var n = document.getElementById(16:30)
    var o = document.getElementById(17:00)
    var p = document.getElementById(17:30)
    
}


</script>
  



 <div class="timeButton">

   <form action="?page=reservationComplete" method="post">
                            
        <p>Velg tid</p>
             <table style="width:10%"><p align='center'>
                  <tr>
                    <td><input type="radio" id="10:00" value="10:00" name="time"><label for="10:00">10:00</label></td>
                    <td><input type="radio" id="10:30" value="10:30" name="time"><label for="10:30">10:30</label></td>	
                    <td><input type="radio" id="11:00" value="11:00" name="time"><label for="11:00">11:00</label></td>
                    <td><input type="radio" id="11:30" value="11:30" name="time"><label for="11:30">11:30</label></td>
                  </tr>
                   <tr>
                    <td><input type="radio" id="12:00" value="12:00" name="time"><label for="12:00">12:00</label></td>
                    <td><input type="radio" id="12:30" value="12:30" name="time"><label for="12:30">12:30</label></td>	
                    <td><input type="radio" id="13:00" value="13:00" name="time"><label for="13:00">13:00</label></td>
                    <td><input type="radio" id="13:30" value="13:30" name="time"><label for="13:30">13:30</label></td>
                  </tr>
                   <tr>
                    <td><input type="radio" id="14:00" value="14:00" name="time"><label for="14:00">14:00</label></td>
                    <td><input type="radio" id="14:30" value="14:30" name="time"><label for="14:30">14:30</label></td>	
                    <td><input type="radio" id="15:00" value="15:00" name="time"><label for="15:00">15:00</label></td>
                    <td><input type="radio" id="15:30" value="15:30" name="time"><label for="15:30">15:30</label></td>
                  </tr>
                    <tr>
                    <td><input type="radio" id="16:00" value="16:00" name="time"><label for="16_00">16:00</label></td>
                    <td><input type="radio" id="16:30" value="16:30" name="time"><label for="16_30">16:30</label></td>	
                    <td><input type="radio" id="17:00" value="17:00" name="time"><label for="17_00">17:00</label></td>
                    <td><input type="radio" id="17:30" value="17:30" name="time"><label for="17_30">17:30</label></td>
                  </tr>

        <input id="submit" type="submit" name="submit" value="Submit" />
    </form>
     
 </div>

</main>