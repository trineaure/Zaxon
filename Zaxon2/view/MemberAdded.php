.<?php
//////////////////////////////////////////
// Template for customer add result page
//////////////////////////////////////////

// Expected variables:
// $added - list of all customers
// $customerName - last value used in "Add customer" form
$added = $GLOBALS["added"];

?>

<?php if ($added) { ?>
    <h1>Customer added successfully!</h1>
<?php } else { ?>
    <h1>Could not add new customer!</h1>
    <p>Perhaps one with such name already exists?</p>
<?php } ?>

<a href="?page=customers">Go back to customer list</a>.
