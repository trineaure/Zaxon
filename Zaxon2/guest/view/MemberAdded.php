<!--GUEST-->
<?php
$added = $GLOBALS["added"];   
?>
<main>
<?php if ($added) { ?>
    <div>
    <p> Gratulerer! Du er nå medlem av Zaxon frisørsalong. </p> 
    <p> Hvis du har noen spørsmål, kan du kontakte oss. </p> 
    <p> Se kontaktfeltet neders på siden.  </p> <br>
    <a href="?page=login" class="smallButton"> Logg inn</a> <br>

    <p> Mvh.Zaxon </p> 
    </div>
    
<?php } else { ?>
    <div>
    <p> Nei uff! Her skjedde det noe galt.</p> 
    <p> Venligs gå tilbake og prøv igjen. </p> 
    <br> 
    <p> Mvh. </p> 
    <p>Zaxon </p> 
    <a href="?page=memberAdd" class="smallButton">Tilbake</a>
    </div>
    <?php } ?>

</main>