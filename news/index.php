<?php
$page_name = "News | Imperium Radio Software";
include '../includes/config.php';
include '../includes/session.php';
include '../includes/head.php';

$sql = "SELECT * FROM stations WHERE username = '$myusername' AND password = '$mypassword';";

if ($_SESSION['StationName'] == ) {
	// code...
}
?>
