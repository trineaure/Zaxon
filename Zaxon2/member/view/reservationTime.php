<main>
    <p>
<?php
//checks if a Member Are Logged In
$unavailableTimes = $_SESSION["timeIn"];

////skriver ut variablen
//var_dump($unavailableTimes);

if ( empty($_SESSION["MemberAreLoggedIn"]))
{
    header("Location:../guest/?page=login");
}

//echo "Ditt MemberID er: " . $_SESSION["MembershipNumber"];
//?> </p> 
    
<!--<p>
 <?php
//echo "Din Employee er : " . $_SESSION['givenEmployeeID'];
?>
</p>  
  <p>  
    <?php
//echo "Din dato er : " . $_SESSION['givenReservation_date'];
?>
</p>
    
<p>
    //<?php 
//    echo "Tid som er valgt allerede for denne datoen er : ";
    
 //printer ut tidene som er i bruk 
//     foreach($unavailableTimes as $tempTime){
//            
//            echo date("H:i", strtotime($tempTime["Time_of_Day"]));
//        }
//        ?>
</p>-->


<script>
     
$(document).ready(function() {
    updateTimes();
    });
     
     function updateTimes()
    {
        var availableTimes = ["10:00", "10:30", "11:00", "11:30", "12:00", "12:30", "13:00", "13:30",
                              "14:00", "14:30", "15:00", "15:30", "16:00", "16:30", "17:00", "17:30"];
        
        
        <?php foreach($unavailableTimes as $tempTime): ?>
         for(i=0;i<16;i++)
         {
              var x = document.getElementById(availableTimes[i]);
              if(x.value == <?php echo date("'H:i'", strtotime($tempTime["Time_of_Day"])) ?> )
              {
                  var xLabel = document.getElementById('label' + x.value);
                  xLabel.style.backgroundColor = "#ff8888";
                  x.disabled=true;
              }
         }
    
         <?php endforeach; ?>
        
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
                    <td><input type="radio" id="<?php echo $time?>" value="<?php echo $time?>" name="time"><label id="<?php echo "label" . $time ?>" for="<?php echo $time?>"><?php echo $time ?></label></td>
                     <?php }?>
                  </tr>
                   <tr>
                       <?php for($i = 4; $i <= 7; $i++) {
                          $time = $availableTimes[$i]?>
                    <td><input type="radio" id="<?php echo $time?>" value="<?php echo $time?>" name="time"><label id="<?php echo "label" . $time ?>" for="<?php echo $time?>"><?php echo $time ?></label></td>
                 <?php }?>
                   </tr>
                   <tr>
                       <?php for($i = 8; $i <= 11; $i++) {
                          $time = $availableTimes[$i]?>
                    <td><input type="radio" id="<?php echo $time?>" value="<?php echo $time?>" name="time"><label id="<?php echo "label" . $time ?>" for="<?php echo $time?>"><?php echo $time ?></label></td>
                  <?php }?>
                   </tr>
                    <tr>
                     <?php for($i = 12; $i <= 15; $i++) {
                          $time = $availableTimes[$i]?>
                    <td><input type="radio" id="<?php  echo $time?>" value="<?php  echo $time?>" name="time"><label id="<?php echo "label" . $time?>" for="<?php echo $time?>"><?php echo $time ?></label></td>   
                 <?php }?>
                    </tr>

        <input id="submit" type="submit" name="submit" value="Neste" />
    </form>
     
 </div>

</main>