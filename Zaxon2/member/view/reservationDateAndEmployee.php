<main>
    <?php
    echo "Ditt MemberID er: " . $_SESSION["MembershipNumber"];
    ?>
    <div>
        <b><p>Reserver en time</p></b>
        <form method="post" action="?page=reservationTime">

            <?php
            $included_employee = $GLOBALS["included_employee"];
            foreach ($included_employee as $tempEmployee) 
                { ?>
                    <tr>
                        <td> <?php echo $tempEmployee["First_name"] ?> </td>
                        <td> <input type="radio" class="regular-radio" value="<?php echo $tempEmployee["EmployeeID"]; ?>" name="givenEmployeeID">
                            
                            
                            <a target="_blank">
                                    <img src="../fellesFiler/bilder/employees/<?php echo $tempEmployee["Phone_Number"];?>.jpg" alt="Klematis" width="110" height="90">
                                </a>

                            
                            <br>     
                            
<!--                            <label id="<?php echo "label" . $tempEmployee["First_name"] ?>" for="<?php echo $tempEmployee["First_name"]?>"><?php echo $tempEmployee["First_name"] ?></label></td>
                        -->
                        <?php
                }
            echo "</table>\n";?>    
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