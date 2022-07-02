<!-- Start of footer.php file -->
<footer>
	<div class="w3-third w3-left">
		Version: <?php echo version; ?>

	</div>
	<div class="w3-third">
		Built and maintained by <a href="http://www.sprousewebsites.co.uk/">Sprouse Websites</a> &copy; 2019-<?php echo date("Y");?>
	</div>
	<div class="w3-third w3-right">
		<a href="https://www.sprousewebsitestest.com/imperium/feedback.php" target="_blank">
			<i class="fas fa-comment"></i> Give Feedback
		</a>
		<a href="https://www.sprousewebsitestest.com/imperium/about.php" target="_blank">
			<i class="fas fa-question-circle"></i> About
			<!-- <span>Ctrl + ?!</span> -->
		</a>
		<a href="https://www.sprousewebsitestest.com/imperium/help.php" target="_blank">
			<i class="fas fa-info-circle"></i> Help
			<!-- <span>Ctrl + ?!</span> -->
		</a>
	</div>
</footer>
<script type="text/javascript">
load++;

function notLoad() {
	if (load < 8) {
		console.log(load);
		setTimeout(notLoad, 500);
	}
	else {
		document.getElementById("loadinfo").innerHTML = "Software loaded";
		document.getElementById("loading").style.display = "none";
	}
}
notLoad();
</script>
</body>
</html>
<!-- End of footer.php file -->
