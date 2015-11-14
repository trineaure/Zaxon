<!--ADMIN-->

<main>
    <p>Her ser du en liste over dine reservasjoner.</p>

    <?php
    $reservations = $GLOBALS["myCalendar"];
    if (!empty($reservations)) {
        ?>
        <table>
            <tr>
                <td>Dato:</td>
                <td>Tid:</td>
                <td>Kunde:</td>
                <td>Tlf:</td>
                <td>Behandling:</td>
            </tr>
            <?php
            $rNr = NULL;
            foreach ($reservations as $res) {
                ?>

        <?php if (($res["Reservation_number"] != $rNr) || ($rNr == NULL)) { ?>
                    <tr>
                        <td> <?php echo $res["Reservation_Date"] ?> </td>
                        <td> <?php echo "Kl. " . date("H:i", strtotime($res["Time_of_Day"])) ?> </td>
                        <td> <?php echo $res["First_Name"] ?> </td>
                        <td> <?php echo $res["Phone_Number"] ?> </td>
                            <?php $rNr = $res["Reservation_number"]; ?> 
                        <td> <?php
                        }
                        if ($res["Reservation_number"] == $rNr) {
                            echo $res["Treatment_Name"] . ", ";
                        } else {
                            ?>
                        </td> 
                    </tr> <?php }
                        ?>
    <?php } ?>
        </table> 

        <?php
    } else {
        echo "<br>"."Du har ingen reservasjoner."."<br>";
    }
    ?>

    <div  id="big">
        <a href="?page=home" class="button"><-Tilbake</a>
    </div>


</main>


