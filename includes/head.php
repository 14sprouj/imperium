<?php
// include 'config.php';
?>
<!-- Start of head.php -->
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
	var load = 0;
	</script>

	<title>
		<?php
		echo $page_name;
		?>
	</title>
	<link rel="icon" href="/imperium/media/icon.png">
	<meta charset="UTF-8">
	<!-- <meta http-equiv="refresh" content="15"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self'">
	<meta http-equiv="X-Content-Security-Policy" content="default-src 'self'; script-src 'self'"> -->

	<!-- Analytics -->
	<script src="https://www.sprousewebsitestest.com/js/analytics.js" charset="utf-8"></script>
	<script async src="//static.getclicky.com/js"></script>

	<!-- Imperium CSS -->
	<link rel="stylesheet" href="/imperium/css/style.css">
	<link rel="stylesheet" href="/imperium/css/autocomplete.css">
	<link rel="stylesheet" href="/imperium/css/search.css">
	<link rel="stylesheet" href="/imperium/css/songlist.css">
	<link rel="stylesheet" href="/imperium/css/decks.css">
	<link rel="stylesheet" href="/imperium/css/rcm.css">
	<link rel="stylesheet" href="/imperium/css/fa.css">
	<link rel="stylesheet" href="/imperium/css/snackbar.css">
	<link rel="stylesheet" href="https://www.sprousewebsitestest.com/resources/css/size-fractions.css">
	<link rel="stylesheet/css" href="/imperium/css/input-range.css">
	<link rel="stylesheet/css" href="/imperium/css/countries-dropdown.css">
	<style>
	. {
		padding: 4px 6px !important;
	}
	</style>

	<!-- Sprouse Websites CSS -->
	<link rel="stylesheet" href="https://www.sprousewebsitestest.com/resources/css/index.css">

	<!-- Third Party CSS -->
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/xcode.min.css" />
	<link rel="stylesheet" href="/imperium/includes/dist/css/bootstrap-select-country.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">

	<!-- Font Awesome -->
	<script src="https://kit.fontawesome.com/e8abc56752.js" crossorigin="anonymous"></script>

	<!-- Imperium JS -->
	<script src="/imperium/js/load.js" charset="utf-8"></script>
	<script src="/imperium/js/decks.js" charset="utf-8"></script>
	<script src="/imperium/js/filter.js" charset="utf-8"></script>
	<!-- <script src="/imperium/js/refresh.js" charset="utf-8"></script> -->
	<script src="/imperium/js/sorttable.js" charset="utf-8"></script>
	<script src="/imperium/js/modules.js" charset="utf-8"></script>
	<script src="/imperium/js/jcontrols.js" charset="utf-8"></script>
	<script src="/imperium/js/playlists.js" charset="utf-8"></script>
	<script src="/imperium/js/snackbar.js" charset="utf-8"></script>
	<script src="/imperium/js/notifications.js"></script>
	<script src="/imperium/js/decksprogress.js" charset="utf-8"></script>

	<!-- Third Party JS and JS Libraries -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js" ></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" charset="utf-8"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js" charset="utf-8"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="/imperium/js/jsmediatags.min.js"></script>
	<script type="text/javascript" src="https://unpkg.com/album-art"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" charset="utf-8"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
	<script>hljs.initHighlightingOnLoad();</script>
	<script src="/imperium/includes/dist/js/bootstrap-select-country.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>

</head>

<body onload="load()" onoffline="offline()" ononline="online()">
	<div id="showbox" class="w3-bar w3-purple" style="position: sticky; top: 0pt; width: 100%; padding: 3pt; padding-left: 7pt; display:none; z-index:100;">

		<?php
		if ($_SESSION['imperium_login_user'] != NULL) {
			echo "<div class=\"w3-right w3-dropdown-hover\">";
			echo "<button class=\"w3-button\" style=\"padding: 6px 12px;\">";
			echo "<i class='fas fa-user'></i> " . $_SESSION['imperium_login_user'];
			echo "</button>";
			echo "<div class=\"w3-dropdown-content w3-bar-block w3-card-4\" style=\"position: fixed; max-width: 80px;\">";
			echo "<a href=\"/imperium/settings.php\" class=\"w3-button\" onmouseover=\"SettingsHoverStartRotate()\" onmouseout=\"SettingsHoverStopRotate()\">";
			echo "<i id=\"settingiconspin\" class=\"fas fa-cog\"></i> Settings";
			echo "</a>";
			echo "<a href=\"/imperium/logout.php\" class=\"w3-button\">";
			echo "<i class=\"fas fa-sign-out-alt\"></i>";
			echo "Logout";
			echo "</a>";
			echo "</div>";
		}
		else {
			echo "button class=\"w3-button\" style=\"padding: 6px 12px;\"";
			echo "<a href='login.php'>Login</a>";
			echo "</button>";
		}
		?>

	</div>
</div>
<script type="text/javascript">
function SettingsHoverStartRotate() {
	document.getElementById("settingiconspin").classList.add("fa-spin");
}
function SettingsHoverStopRotate() {
	document.getElementById("settingiconspin").classList.remove("fa-spin");
}
</script>

<script type="text/javascript">
load++;
</script>
<!-- End of head.php -->
