<?php
//////////////////////////////////////////
// Template for reservationComplete result page
//////////////////////////////////////////

// Expected variables:
// $added - list of all customers
// $customerName - last value used in "Add customer" form
$added = $GLOBALS["added"];

    
?>
<main>
<?php if ($added) { ?>
    
    <p>Her er en oversikt over din bestilling. Trykk "Fullfør" for å bekrefte  </p>
    
    <?php
           echo "<table>\n";
        echo "<tr> <td> Kunde nummer </td> <td> Arbeidsgiver </td> <td> Dato </td> <td> Behandling </td> ";
                Echo "<tr>"
                . "<td>" . $_SESSION["MembershipNumber"] . "</td>"
                . "<td>" . $_SESSION['givenEmployeeID'] . "</td>"
                . "<td>" . $_SESSION['givenReservation_date'] . "</td>"
                . "<td>" . $_SESSION["Treatment"] . "</td>"
               // . "<td>" . $member['Phone_Number'] . "</td>"
                . "</tr>";
                 echo "</table>\n"; 
    ?>
     <form action="?page=reservationTreatmentFinish" method="post">
     <input id="submit" type="submit" name="submit" value="Fullfør" />
     </form> 
    
    
<?php } else { ?>
    <p> Nei uff! Her skjedde det noe galt.</p> 
    <p> Venligs gå tilbake og prøv igjen. </p> 
    <br> 
    <p> Mvh. </p> 
    <p>Zaxon </p> 
    <a href="?page=home">Gå tilbake</a>
    <?php
    
     } ?>
</main>