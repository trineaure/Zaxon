<main>
    <?php
    //Checks if $_SESSION["treatmentArray"] is set, if not print error
    foreach ($_SESSION["treatmentArray"] as $treatment) {
        $treatment;
    }
    if (isset($treatment)) { ?>

            <p>Velg en arbeidstaker og en dato</p>
             <div class="innerStructure">
            <form method="post" action="?page=reservationTime">
               
                <div id="big"><br>
                     <p><input type="text" id="datetimepicker3" placeholder="1995-06-26" name="givenReservation_date" required/></p>
                </div> 
                <div id="small">
                <?php
                $included_employee = $GLOBALS["included_employee"];
                foreach ($included_employee as $tempEmployee) {?>     

                                             <?php //echo $tempEmployee["EmployeeID"] ?>
                            
                                <label> <?php if ($tempEmployee["Employee_Photo"] == 1) { ?>  
                                    <input type="radio" value="<?php echo $tempEmployee["EmployeeID"] ?>" name="givenEmployeeID" required>
                                     <img src="../fellesFiler/bilder/employees/<?php echo $tempEmployee["Phone_Number"] ?>.jpg" title="<?php echo $tempEmployee["First_name"]?>" class="pictureBox" >
                                  <?php } 
                                  else { ?>
                                     <input type="radio" value="<?php echo $tempEmployee["EmployeeID"] ?>" name="givenEmployeeID" required>
                                     <img src="../fellesFiler/bilder/employees/noPhoto.jpg" title="<?php echo $tempEmployee["First_name"]?>" class="pictureBox" >
                                   <?php } echo $tempEmployee["First_name"];
                                    ?> </label> <?php
                                   } ?> 
                        
                            </div>  
<!--            </form>-->
                
<!--                </form> -->
             </div> 
            <div class="backandforth">
<!--                <form method="post" action="?page=reservationTime">-->
                    <input class="tinySubmit" type="submit" name="submit" value="Neste" >
                    <a href="?page=chooseTreatment" class="tinyButton" >Tilbake</a>
<!--                    <form method="post" action="?page=reservationTime">-->
                     

                 </form>   </div>
                   
               
             
                     
          

        <?php }
        else {?>

            <p> Nei uff! Her skjedde det noe galt.</p> 
            <p> Husk å velge en behandling! </p>
            <p> Venligs gå tilbake og prøv igjen. </p> 
            <p> Mvh. </p> 
            <p>Zaxon </p> 
            <div>
                <a href="?page=chooseTreatment" class="smallButton" >Tilbake</a>
            </div>

    <?php } ?>
</main>

<script>

//Viser kalenderen  

    $('#datetimepicker3').datetimepicker({
        inline: true

    });
//Viser bare uker
    $('#datetimepicker3').datetimepicker({
        lang: 'no',
        timepicker: false,
        format: 'Y-m-d',
        formatDate: 'Y-m-d',
        startDate: new Date(),
        scrollMonth: false


    });
    $('#datetimepicker3').datetimepicker({
        minDate: 0
    });

</script>
