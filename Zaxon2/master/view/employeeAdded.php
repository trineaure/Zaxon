<!--MASTER-->
<main>
    <?php
    $added = $GLOBALS["added"];
    $uploadOk = $GLOBALS["uploadOk"];
// if everything is ok, but no photo uploaded.
    if (($added) && ($uploadOk == 0)) {
        ?>
        <p> Gratulerer! Du har lagt til en arbeidstaker uten bilde </p> 
        <a href="?page=home" class="smallButton">Tilbake til startsiden</a>
        <p> Mvh.Zaxon </p> 
    <?php
    }
// if everything is ok, and a photo is successfully uploaded.
    else if (($added) && ($uploadOk == 1)) {
        ?>
        <p> Gratulerer! Du har lagt til en arbeidstaker med bilde. </p> 
        <a href="?page=home" class="smallButton">Tilbake til startsiden</a>
        <p> Mvh.Zaxon </p>       
    <?php } else {
    ?>
        <p> Nei uff! Her skjedde det noe galt.</p> 
        <p> Vennligst gå tilbake og prøv igjen. </p> 
        <br> 
        <p> Mvh. </p> 
        <p>Zaxon </p> 
        <a href="?page=employeeAdd" class="smallButton">Gå tilbake</a>
<?php } ?>
</main>