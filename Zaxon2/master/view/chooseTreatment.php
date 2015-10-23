<?php
// Start the session
session_start();
?>

<main>
     <form action="#" method="post">
    
 <?php 
    $allTreatments = $GLOBALS["allTreatments"];
    foreach ($allTreatments as $treatment)
        {?>
            <p><?php echo $treatment['Treatment_Name'] ?> <input type="radio" name="<?php $treatment['Treatment_Name']?>"/> </p>
        <?php } ?>
    <input id="submit" type="submit" name="submit" value="Submit"  required/>
    </form>
    
    <?php
        if (isset($_POST['submit'])) {
            if(isset($_POST['radio'])) {
                $_SESSION[$treats] = [array("Treatment_Name" => $_POST['radio'])];
            }
        }
    ?>
</main>
