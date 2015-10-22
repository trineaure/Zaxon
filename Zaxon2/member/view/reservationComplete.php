<?php
//////////////////////////////////////////
// Template for reservationComplete result page
//////////////////////////////////////////

// Expected variables:
// $added - list of all customers
// $customerName - last value used in "Add customer" form
$added = $GLOBALS["added"];

    
?>

<?php if ($added) { ?>
    <p> Gratulerer! Du har nå bestillt en time hos Zaxon. </p>
    <p> Hvis du ønsker å endre på bestillingen gan du dra til helvete </p>
    <a href="?page=home"> Trykk her for å gå tilbake til startsiden</a>

    <p> Mvh.Zaxon </p> 
     
    
<?php } else { ?>
    <p> Nei uff! Her skjedde det noe galt.</p> 
    <p> Venligs gå tilbake og prøv igjen. </p> 
    <br> 
    <p> Mvh. </p> 
    <p>Zaxon </p> 
    <a href="?page=home">Gå tilbake</a>
    <?php
    
     } ?>