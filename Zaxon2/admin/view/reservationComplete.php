<!--ADMIN-->
<main>

    <?php
    //Checks if $_SESSION['givenTime'] is set, if not print error
    if (isset($_SESSION["givenTime"])) {
        ?>

        <p>Her er en oversikt over din bestilling. Trykk Fullfør for å bekrefte</p>
        <table>
            <tr> <td>Kundenummer:</td> <td>Frisør:</td> <td>Dato:</td> <td>Tid:</td>  <td>Behandling:</td>
            <tr>
                <td> <?php echo $_SESSION["MembershipNumber"] ?> </td>
                <td> <?php echo $_SESSION["First_Name"] ?> </td>
                <td> <?php echo $_SESSION["givenReservation_date"] ?> </td>
                <td> <?php echo $_SESSION["givenTime"] ?> </td>
                <td> <?php foreach ($_SESSION["treatmentArray"] as $treatment) {
            ?> <?php echo "$treatment"; ?>  <?php }
        ?> </td>
            </tr>
        </table> <br>
        <div class="backandforth">
            <form action="?page=reservationTreatmentFinish" method="post">
                <input class="tinySubmit" type="submit" name="submit" value="Fullfør" />
                <a href="?page=chooseTreatment" class="tinyButton">Tilbake</a>
            </form> 
        </div>

    <?php } else { ?>

        <p> Nei uff! Her skjedde det noe galt.</p> 
        <p> Vennligst gå tilbake og prøv igjen. </p> 
        <br> 
        <p> Mvh. </p> 
        <p>Zaxon </p> 
        <div  id="big">
            <a href="?page=chooseTreatment" class="button"><-Tilbake</a>
        </div>
    <?php } ?>
</main>