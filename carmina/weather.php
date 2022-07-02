<!DOCTYPE html>
<html>
<head>
<title></title>
</head>

<body>

	<?php
	date_default_timezone_set("Europe/London");
	$apiKey1 = "bf06ed6c271fb0b0fa20525bfe56a1a6";
	$cityId1 = "2643743";
	$googleApiUrl1 = "https://api.openweathermap.org/data/2.5/weather?id=" . $cityId1 . "&lang=en&units=metric&APPID=" . $apiKey1;

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

	$apiKey2 = "bf06ed6c271fb0b0fa20525bfe56a1a6";
	$cityId2 = "2643743";
	$googleApiUrl2 = "https://datapoint.metoffice.gov.uk/public/data/resource?key=" . $apiKey2;


	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => "//api-metoffice.apiconnect.ibmcloud.com/metoffice/production/v0/forecasts/point/hourly?includeLocationName=Lewisham&latitude=51.4415&longitude=0.0117",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"accept: application/json",
			"x-ibm-client-id: 65d0105e-aad1-41ec-ad97-fb4bc49f85b6",
			"x-ibm-client-secret: C5oP0gU2eY1qR2bR7fU3iO6eS1nY8cL5nO6lB4lF1gK6eK7gJ7"
		),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
		// echo $response;
	}


	$ch2 = curl_init();

	curl_setopt($ch2, CURLOPT_HEADER, 0);
	curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch2, CURLOPT_URL, $googleApiUrl2);
	curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch2, CURLOPT_VERBOSE, 0);
	curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
	$response2 = curl_exec($ch2);

	curl_close($ch2);
	$data2 = json_decode($response2);
	$currentTime2 = time();
	?>

	<div id="weather" style="width:100%; text-align:center;">

		<div id="datetime">

		</div>

		<div id="weather-forecast" class="weather-forecast">
			<table style="text-align: center; margin-left: auto; margin-right: auto;">
				<tr>
					<td rowspan="2">
						<?php
						echo "<img src='//webprojectmanagement.site/imperium/media/weather/".$data1->weather[0]->icon.".png' class='weather-icon' title='".ucwords($data1->weather[0]->description)."'>";
						?>
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
						<div>Humidity: <?php echo $data1->main->humidity; ?>%</div>
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
					<td>Updated: <?php echo date("H:m:s"); ?></td>
				</tr>
			</table>
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

		if (rmilliseconds >= 100) {
			rmilliseconds = rmilliseconds / 10;
		}

		var dateTime = zd + date + "/" + zmo + month + "/" + year + " " + zh + hours + ":" + zmi + minutes + ":" + zs + seconds + ":" + zms + rmilliseconds;
		document.getElementById("datetime").innerHTML = dateTime;
		setTimeout(getDateTime, 50);
	};
	getDateTime();
	</script>

</body>
</html>
