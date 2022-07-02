<div id="todayPrecipitation" style="width: 900px; height: 500px;">
</div>

<?php
$json = file_get_contents('http://api.weatherunlocked.com/api/forecast/51.42,-0.04?app_id=432118a2&app_key=7a59aedcf941c9b66969a4e9871c0a98');
$obj = json_decode($json);
?>

<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawVisualization);

function drawVisualization() {
	// Some raw data (not necessarily accurate)
	var data = google.visualization.arrayToDataTable([
		['Time', 'Precipitation (mm)'],
		['Midnight', <?php echo $obj->Days[0]->Timeframes[0]->precip_mm; ?>],
		['3am', <?php echo $obj->Days[0]->Timeframes[1]->precip_mm; ?>],
		['6am', <?php echo $obj->Days[0]->Timeframes[2]->precip_mm; ?>],
		['9am', <?php echo $obj->Days[0]->Timeframes[3]->precip_mm; ?>],
		['Noon', <?php echo $obj->Days[0]->Timeframes[4]->precip_mm; ?>],
		['3pm', <?php echo $obj->Days[0]->Timeframes[5]->precip_mm; ?>],
		['6pm', <?php echo $obj->Days[0]->Timeframes[6]->precip_mm; ?>],
		['9pm', <?php echo $obj->Days[0]->Timeframes[7]->precip_mm; ?>]
	]);

	var options = {
		title : 'Today\'s weather',
		vAxis: {title: 'Precipitation'},
		hAxis: {title: 'Time'},
		seriesType: 'bars'
	};

	var chart = new google.visualization.ComboChart(document.getElementById('todayPrecipitation'));
	chart.draw(data, options);
}
</script>
