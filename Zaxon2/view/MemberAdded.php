<?php
//////////////////////////////////////////
// Template for customer add result page
//////////////////////////////////////////

// Expected variables:
// $added - list of all customers
// $customerName - last value used in "Add customer" form
$added = $GLOBALS["added"];

?>

<?php if ($added) { ?>
<h1>Customer added successfully!</h1><br>
    <p> Click here to continue to the order page </p> <br>
<!--    <a href="?page=order"></a>-->
<?php } else { ?>
    <h1>Could not add new customer!</h1>
    <p>Perhaps one with such name already exists?</p>
    <a href="?page=customers">Go back to customer list</a>
<?php } ?>


