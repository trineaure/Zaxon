<main>
    <p>
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
?> </p> 
    
<p>
 <?php
echo "Din Employee er : " . $_SESSION['givenEmployeeID'];
?>
</p>  
  <p>  
    <?php
echo "Din dato er : " . $_SESSION['givenReservation_date'];
?>
</p>
    
<p>
    <?php 
    echo "Tid som er valgt allerede for denne datoen er : ";
    
 //printer ut tidene som er i bruk 
     foreach($unavailableTimes as $tempTime){
            
            echo date("H:i", strtotime($tempTime["Time_of_Day"]));
        }
        ?>
</p>


<script>
     
     // Det Trine skal gjøre:
     //
     
    
    for (i=1; i<17:30 ; i++ ) 
            {
                
                
            }
    
    
    
    
    var a = document.getElementById(<?php echo date("H:i", strtotime($tempTime["Time_of_Day"]));  ?>)
    
    
        
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
  
<?php $availableTimes = array("10:00", "10:30", "11:00", "11:30", "12:00", "12:30", "13:00", "13:30",
                              "14:00", "14:30", "15:00", "15:30", "16:00", "16:30", "17:00", "17:30");?>


 <div class="timeButton">

   <form action="?page=reservationComplete" method="post">
                            
        <p>Velg tid</p>
             <table style="width:10%"><p align='center'>

                  <tr>
                      <?php for($i = 0; $i <= 3; $i++) {
                          $time =  $availableTimes[$i]?>
                    <td><input type="radio" id="<?php echo $time?>" value="<?php echo $time?>" name="time"><label for="<?php echo $time?>"><?php echo $time ?></label></td>
                     <?php }?>
                  </tr>
                   <tr>
                       <?php for($i = 4; $i <= 7; $i++) {
                          $time = $availableTimes[$i]?>
                    <td><input type="radio" id="<?php echo $time?>" value="<?php echo $time?>" name="time"><label for="<?php echo $time?>"><?php echo $time ?></label></td>
                 <?php }?>
                   </tr>
                   <tr>
                       <?php for($i = 8; $i <= 11; $i++) {
                          $time = $availableTimes[$i]?>
                    <td><input type="radio" id="<?php echo $time?>" value="<?php echo $time?>" name="time"><label for="<?php echo $time?>"><?php echo $time ?></label></td>
                  <?php }?>
                   </tr>
                    <tr>
                     <?php for($i = 12; $i <= 15; $i++) {
                          $time = $availableTimes[$i]?>
                    <td><input type="radio" id="<?php  echo $time?>" value="<?php  echo $time?>" name="time"><label for="<?php  echo $time?>"><?php echo $time ?></label></td>   
                 <?php }?>
                    </tr>

        <input id="submit" type="submit" name="submit" value="Neste" />
    </form>
     
 </div>

</main>