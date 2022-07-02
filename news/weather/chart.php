<?php
$page_name = "Weather Charts";
include '../../includes/head.php';
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<select onchange="chartMode()" id="chartSelector">
	<option value="temp" selected>Temperature</option>
	<option value="precipitation">Precipitation</option>
</select>

<script type="text/javascript">
function chartMode() {
	var modeSelected = document.getElementById("chartSelector").value;
	if (modeSelected == "temp") {
		document.getElementById("todayTemperature").style.display = "block";
		document.getElementById("todayPrecipitation").style.display = "none";
	}
	if (modeSelected == "precipitation") {
		document.getElementById("todayTemperature").style.display = "none";
		document.getElementById("todayPrecipitation").style.display = "block";
	}
}
chartMode();
</script>

<?php
include 'includes/todayTemp.php';
include 'includes/todayPrec.php';
?>
