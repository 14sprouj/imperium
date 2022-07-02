<?php
$page_name = "Carmina";
// include '../includes/config.php';
// include '../includes/session.php';
include '../includes/head.php';
// require 'includes/loading.php';
include '../includes/alpha.php';
include 'includes/vars.php';
include 'includes/decks.php';
?>
<style media="screen">
.weatherbox:hover {
	border: 1pt grey solid;
	border: 19px;
}
</style>
<a href="weather.php" class="hidden weatherbox hover-full-border" target="_blank">
	<?php
	// include 'includes/widget.php';
	?>
</a>
<?php
include 'includes/playlist.php';
include 'jingles.php';
include 'includes/rcm.php';
include '../includes/footer.php';
 ?>
