<main>
    <?php
    echo "Ditt MemberID er: " . $_SESSION["MembershipNumber"];
    ?>
    <div>
        <p>Reserver en time</p>
        <form method="post" action="?page=reservationTime">

            <?php
            $included_employee = $GLOBALS["included_employee"];
            foreach ($included_employee as $tempEmployee) {
                ?>     
                <tr> <td>  <label<?php echo $tempEmployee["First_name"] ?> </td>  
                   <td>  <input type="radio" class="regular-radio" value="<?php echo $tempEmployee["EmployeeID"]; ?>" name="givenEmployeeID"></label>
                    <img src="../fellesFiler/bilder/employees/<?php echo $tempEmployee["Phone_Number"]; ?>.jpg" width="110" height="90"></td> </tr>          
        <?php } ?>
                
                    </table>   
                    <p><input type="text" id="datetimepicker3" placeholder="1995-06-26" name="givenReservation_date" required/></p>
                    <input id="submit" type="submit" name="submit" value="Neste" />
        </form>                     
    </div>
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