<?php
//////////////////////////////////////////
// Template for Employee add result page
//////////////////////////////////////////

// Expected variables:
// $added - list of all customers
// $customerName - last value used in "Add customer" form
$added = $GLOBALS["added"];

 if ($added) { ?>
<p> Gratulerer! Du har lagt til en arbeidstaker </p> 
    <a href="?page=home"> gå tilbake til startsiden</a>
    
    <p> Mvh.Zaxon </p> 

<?php } else { ?>
    <p> Nei uff! Her skjedde det noe galt.</p> 
    <p> Venligs gå tilbake og prøv igjen. </p> 
    <br> 
    <p> Mvh. </p> 
    <p>Zaxon </p> 
    <a href="?page=employeeAdd">Gå tilbake</a>
<?php } ?>
