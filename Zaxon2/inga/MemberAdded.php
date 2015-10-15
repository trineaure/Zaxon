<main>
<?php

$added = $GLOBALS["added"];
$Phone_Number = $GLOBALS["Phone_Number"];
?>
<? if($added) { ?>
}<h1> Customer added sucessfully!</h1>
<? else { ?>
<h1> Could not add new Customer! </h1>
<p> Perhaps we do not want you as a member? </p>
<?} ?>

<a href="?page=memberAdd"> Go back to add member. </a>
*/

</main>