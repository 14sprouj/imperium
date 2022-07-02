<?php
session_start();
$link = new mysqli(servername, username, password, dbname);

if ($link -> connect_errno) {
	echo "ERROR: Could not connect. " . mysqli_connect_errno() . mysqli_connect_error();
	exit();
}

$link -> real_query("SELECT username FROM users WHERE username = '$user_check';");

if ($link -> field_count) {
	$result = $link -> store_result();
	$row = $result -> fetch_row();
	$result -> free_result();
}

$link -> close();

function ForceLogin() {
	$URL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	if ($URL !== "https://www.sprousewebsitestest.com/imperium/login.php") {
		echo "<script>window.location.href = 'https://www.sprousewebsitestest.com/imperium/login.php';</script>";
	}
}

if ($_SESSION['imperium_login_user'] == "") {
	ForceLogin();
} elseif ($_SESSION['imperium_login_user'] == NULL) {
	ForceLogin();
}
?>
<script type="text/javascript">
	load++;
</script>
