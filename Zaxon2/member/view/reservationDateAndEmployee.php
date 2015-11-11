<main>
    <?php
    //Checks if $_SESSION["treatmentArray"] is set, if not print error
    foreach ($_SESSION["treatmentArray"] as $treatment) {
        $treatment;
    }
    if (isset($treatment)) {
        ?>

            <div>
                <p>Velg en arbeidstaker og en dato</p>
                <form method="post" action="?page=reservationTime">

        <?php
        $included_employee = $GLOBALS["included_employee"];
        foreach ($included_employee as $tempEmployee) {
            ?>     
                <tr> <td>  <label<?php echo $tempEmployee["First_name"] ?> </td>                           
                    <td>  <input type="radio" class="regular-radio" value="<?php echo $tempEmployee["EmployeeID"]; ?>" name="givenEmployeeID" required></label>
                <?php if($tempEmployee["Employee_Photo"] == 1){ ?>  
                            <img src="../fellesFiler/bilder/employees/<?php echo $tempEmployee["Phone_Number"]; ?>.jpg" width="110" height="90"></td> </tr>          
                <?php } else { ?>
                            <img src="../fellesFiler/bilder/employees/noPhoto.jpg" width="110" height="90"></td> </tr>                        
                <?php }} ?>
                </table>   
                <p><input type="text" id="datetimepicker3" placeholder="1995-06-26" name="givenReservation_date" required/></p>
                <input id="submit" type="submit" name="submit" value="Neste" />
            </form>                     
        </div>
    
    <?php } else {
        ?>

        <p> Nei uff! Her skjedde det noe galt.</p> 
        <p> Venligs gå tilbake og prøv igjen. </p> 
        <br> 
        <p> Mvh. </p> 
        <p>Zaxon </p> 
        <a href="?page=chooseTreatment">Gå tilbake</a>

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
        formatDate: 'Y-m-d'


    });

</script>
