<?php
//////////////////////////////////////////
// Template for reservationComplete result page
//////////////////////////////////////////

// Expected variables:
// $added - list of all customers
// $customerName - last value used in "Add customer" form

?>
<main>
    
    <?php
        //Checks if $_SESSION['givenTime'] is set, if not print error
       if(isset($_SESSION["givenTime"]))
           { ?>
           
    <p>Her er en oversikt over din bestilling. Trykk Fullfør for å bekrefte</p>
    <table>
               <tr> <td> Kunde nummer </td> <td> Arbeidsgiver </td> <td> Dato </td> <td> Tid </td>  <td> Behandling </td>
                <tr>
                <td> <?php echo $_SESSION["MembershipNumber"] ?> </td>
                <td> <?php echo $_SESSION["givenEmployeeID"] ?> </td>
                <td> <?php echo $_SESSION["givenReservation_date"] ?> </td>
                <td> <?php echo $_SESSION["givenTime"] ?> </td>
                 <td> <?php foreach ($_SESSION["treatmentArray"] as $treatment){
                    ?> <?php echo "$treatment"; ?>  <?php
                }?> </td>
                </tr>
    </table> 
     <form action="?page=reservationTreatmentFinish" method="post">
     <input id="submit" type="submit" name="submit" value="Fullfør" />
     </form> 
       <div  id="big">
                <a href="?page=chooseTreatment" class="button"><-Tilbake</a>
            </div>
    
     <?php }else {?>
    
    <p> Nei uff! Her skjedde det noe galt.</p> 
    <p> Venligs gå tilbake og prøv igjen. </p> 
    <br> 
    <p> Mvh. </p> 
    <p>Zaxon </p> 
       <div  id="big">
                <a href="?page=chooseTreatment" class="button"><-Tilbake</a>
            </div>
    <?php
    
     } ?>
</main>