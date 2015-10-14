<?php
session_start();

if (isset($_REQUEST['navn'])) {

	$to = "roger.kolseth@gmail.com";
	$from = $_REQUEST['email'];
    $navn = $_REQUEST['navn'];
	$subject = "BESTILLING: " . $navn;
	$message = "Navn: " . $_REQUEST['name'] . "\nEpost: " . $from . "\n Telefon: " . $_REQUEST['telefon'] . "Ønsker time: " . $_REQUEST['time'] . "\n\nEventuell melding:\n" . $_REQUEST['message'];

	mail($to, "$subject", $message, "From:" . $from);

	$_SESSION['info'] = "Tusen takk, " . $navn . ". Din time er bestillt.";

} else {

	$_SESSION['error'] = "Feil! Din bestilling blei ikke gjennomført. Prøv igjen.";
}

header('Location: bestille.php');
?>
