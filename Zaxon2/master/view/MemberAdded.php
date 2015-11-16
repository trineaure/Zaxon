<?php
//////////////////////////////////////////
// Template for Member add result page
//////////////////////////////////////////

// Expected variables:
// $added - list of all customers
// $customerName - last value used in "Add customer" form
$added = $GLOBALS["added"];

    
?>

<?php if ($added) { ?>
    <p> Gratulerer! Du er nå medlem av Zaxon frisørsalong. </p> 
    <p> Hvis du har noen spørsmål, kan du kontakte oss. </p> 
    <p> Se kontaktfeltet neders på siden.  </p> 
    <a href="?page=order" class="smallButton"> Trykk her hvis du ønsker å bestille time</a>


    <a href="?page=showMembers" class="smallButton"> trykk for å vise medlemmer </a>


    <p> Mvh.Zaxon </p> 
     
    
<?php } else { ?>
    <p> Nei uff! Her skjedde det noe galt.</p> 
    <p> Venligs gå tilbake og prøv igjen. </p> 
    <br> 
    <p> Mvh. </p> 
    <p>Zaxon </p> 
    <a href="?page=memberAdd" class="smallButton">Gå tilbake</a>
    <?php
    
     }
      ?>


