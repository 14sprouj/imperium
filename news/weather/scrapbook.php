<!-- Start of weather.php file -->
<?php
$page_name = "Weather";
include '../../includes/head.php';
$apiKey1 = "bf06ed6c271fb0b0fa20525bfe56a1a6";
$cityId1 = "2643743";
$googleApiUrl1 = "https://api.openweathermap.org/data/2.5/weather?id=2643743&lang=en&units=metric&appid=bf06ed6c271fb0b0fa20525bfe56a1a6";

$ch1 = curl_init();

curl_setopt($ch1, CURLOPT_HEADER, 0);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch1, CURLOPT_URL, $googleApiUrl1);
curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch1, CURLOPT_VERBOSE, 0);
curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
$response1 = curl_exec($ch1);

curl_close($ch1);
$data1 = json_decode($response1);
$currentTime1 = time();

?>
<script type="text/javascript">
console.log("OpenWeatherAPI Data loaded");
document.getElementById("loadinfo").innerHTML = "Decks loaded";
</script>

<div id="weather" style="width:100%; text-align:center;">

	<?php
	if ($data1->weather[0]->icon == "01d") {
		echo "<i class='fas fa-sun weather-icon'></i>";
	}
	if ($data1->weather[0]->icon == "01n") {
		echo "<i class='fas fa-moon weather-icon'></i>";
	}
	if ($data1->weather[0]->icon == "02d") {
		echo "<i class='fas fa-cloud-sun weather-icon'></i>";
	}
	if ($data1->weather[0]->icon == "02n") {
		echo "<i class='fas fa-cloud-moon weather-icon'></i>";
	}
	if ($data1->weather[0]->icon == "03d") {
		echo "<i class='fas fa-cloud weather-icon'></i>";
	}
	if ($data1->weather[0]->icon == "03n") {
		echo "<i class='fas fa-cloud weather-icon'></i>";
	}
	echo "<img src='https://sprousewebsitestest.com/imperium/media/weather/".$data1->weather[0]->icon.".png' class='weather-icon' height='150px'>";
	?>

	<div class="weather-forecast">
		<table style="text-align: center; margin-left: auto; margin-right: auto;">
			<tr>
				<td rowspan="2">

					<br>
					<?php echo ucwords($data1->weather[0]->description); ?>
				</td>
				<td>
					Max: <?php echo $data1->main->temp_max; ?>°C
				</td>
				<td>
					Current: <?php echo $data1->main->temp; ?>°C
				</td>
				<td>
					<div>Humidity: <?php echo $data1->main->humidity; ?> %</div>
				</td>
			</tr>
			<tr>
				<td>
					<span class="min-temperature">
						Min: <?php echo $data1->main->temp_min; ?>°C
					</span>
				</td>
				<td>
					Feels Like: <?php echo $data1->main->feels_like; ?>°C
				</td>
				<td>
					<div>Wind: <?php echo $data1->wind->speed; ?> km/h</div>
				</td>
			</tr>
			<tr>
				<td>Updated: <?php echo date("d/m/y g:i:s a"); ?></td>
			</tr>
		</table>

		<div class="">
			<h3>Hourly</h3>
			<a href="hourly.php">Click Here</a>
		</div>
		<h3>Premaid</h3>
		<div id="openweathermap-widget-21"></div>
		<script src='//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/d3.min.js'></script>
		<script>
		window.myWidgetParam ? window.myWidgetParam : window.myWidgetParam = [];  window.myWidgetParam.push({id: 21,cityid: '2643743',appid: 'bf06ed6c271fb0b0fa20525bfe56a1a6',units: 'metric',containerid: 'openweathermap-widget-21',  });
		(function() {
			var script = document.createElement('script');
			script.async = true;
			script.charset = "utf-8";
			script.src = "//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/weather-widget-generator.js";
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(script, s);
		})();
		</script>

		<h3>Chart</h3>
		<a href="chart.php">Click Here</a> or <a href="chartjs.php">Click Here</a>
	</div>
</div>

<script type="text/javascript">
function getDateTime() {
	var today = new Date();
	var milliseconds = today.getMilliseconds();
	var rmilliseconds = Math.round(milliseconds / 10);
	var seconds = today.getSeconds();
	var minutes = today.getMinutes();
	var hours = today.getHours();
	var month = today.getMonth();
	var month = month + 1;
	var date = today.getDate();
	var year = today.getFullYear();

	var zd = "";
	var zmo = "";
	var zy = "";
	var zh = "";
	var zmi = "";
	var zs = "";
	var zms = "";

	if (date < 10) {
		zd = "0";
	}

	if (month < 10) {
		zmo = "0";
	}

	if (hours < 10) {
		zh = "0";
	}

	if (minutes < 10) {
		zmi = "0";
	}

	if (seconds < 10) {
		zs = "0";
	}

	if (rmilliseconds < 10) {
		zms = "0";
	}

	var dateTime = zd + date + "/" + zmo + month + "/" + year + " " + zh + hours + ":" + zmi + minutes + ":" + zs + seconds + ":" + zms + rmilliseconds;
	document.getElementById("datetime").innerHTML = dateTime;
	setTimeout(getDateTime, 50);
};

</script>
<script type="text/javascript">
console.log("Weather.php file loaded");
</script>
<!-- End of weather.php file -->
<?php
include '../../includes/footer.php';
?>
