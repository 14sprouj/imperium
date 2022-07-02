<!-- Start of weather.php file -->
<?php
$page_name = "Hourly Table Forecast";
include '../../includes/head.php';
?>

<style>
table.full-border tr td, table.full-border th {
	border: 1pt solid black;
	border-collapse: collapse;
	padding: 1pt;
}

table.banded tr:nth-child(even) {
	background-color: #f2f2f2;
}
</style>

<?php
$json = file_get_contents('http://api.weatherunlocked.com/api/forecast/51.42,-0.04?app_id=432118a2&app_key=7a59aedcf941c9b66969a4e9871c0a98');
$obj = json_decode($json);
$i = 0;
echo "<table class=\"full-border banded w3-whole\">";
echo "<thead>";
echo "<th>Date</th>";
echo "<th>Time</th>";
echo "<th>Summary</th>";
echo "<th>Temperature (°C)</th>";
echo "<th>Precipitation (mm)</th>";
echo "<th>Wind Speed (mph)</th>";
echo "</thead>";
while ($i < 6) {
	$j = 0;
	echo "<tr>";
	echo "<td rowspan=\"8\">";
	echo $obj->Days[$i]->date;
	echo "</td>";
	while ($j < 8) {
		echo "<td>";
		$time = $obj->Days[$i]->Timeframes[$j]->time;
		if ($time == 0) {
			echo "00:00";
		} elseif ($time == 0) {
			echo "00:00";
		} elseif ($time == 300) {
			echo "03:00";
		} elseif ($time == 600) {
			echo "06:00";
		} elseif ($time == 900) {
			echo "09:00";
		} elseif ($time == 1200) {
			echo "12:00";
		} elseif ($time == 1500) {
			echo "15:00";
		} elseif ($time == 1800) {
			echo "18:00";
		} elseif ($time == 2100) {
			echo "21:00";
		} else {
			echo $time;
		}
		echo "</td>";
		echo "<td>";
		echo "<img src=\"weather-icons/".$obj->Days[$i]->Timeframes[$j]->wx_icon."\" alt=\"\">";
		echo "</td>";
		echo "<td>";
		echo $obj->Days[$i]->Timeframes[$j]->temp_c."°C";
		echo "</td>";
		echo "<td>";
		echo $obj->Days[$i]->Timeframes[$j]->precip_mm." mm";
		echo "</td>";
		echo "<td>";
		echo $obj->Days[$i]->Timeframes[$j]->windspd_mph." mph";
		echo "</td>";
		echo "</tr>";
		$j++;
	}
	$i++;
}
echo "</table>";
// ini_set("allow_url_fopen", 1);
?>

<?php
$json = file_get_contents('http://api.weatherunlocked.com/api/forecast/51.42,-0.04?app_id=432118a2&app_key=7a59aedcf941c9b66969a4e9871c0a98');
$obj = json_decode($json);
$i = 0;
while ($i < 6) {
	$j = 0;
	while ($j < 7) {
		echo "string";
		$j++;
	}
	$i++;
}
// ini_set("allow_url_fopen", 1);
?>

<div class="w3-row w3-whole">
	Last Updated <?php echo date("d/m/Y h:i:s a"); ?>
</div>




<div id="pureresult" class="">

</div>

<div id="demo" class="">

</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script>
// function loadDoc() {
// 	var xhttp = new XMLHttpRequest();
// 	xhttp.onreadystatechange = function() {
// 		if (this.readyState == 4 && this.status == 200) {
// 			myFunction(this);
// 		}
// 	};
// 	xhttp.open("GET", "http://api.weatherunlocked.com/api/forecast/51.42,-0.04?app_id=432118a2&app_key=7a59aedcf941c9b66969a4e9871c0a98", true);
// 	xhttp.send();
// }
// function myFunction(xml) {
// 	var i;
// 	var xmlDoc = xml.responseXML;
// 	var table="<tr><th>Date</th><th>Sunrise</th></tr>";
// 	var x = xmlDoc.getElementsByTagName("Day");
// 	for (i = 0; i <x.length; i++) {
// 		table += "<tr><td>" +
// 		x[i].getElementsByTagName("date")[0].childNodes[0].nodeValue +
// 		"</td><td>" +
// 		x[i].getElementsByTagName("sunrise_time")[0].childNodes[0].nodeValue +
// 		"</td></tr>";
// 	}
// 	document.getElementById("demo").innerHTML = table;
// }
//
// loadDoc();

</script>

<script>
var obj, dbParam, xmlhttp, myObj, x, txt = "";
obj = { table: "Days", limit: 200 };
dbParam = JSON.stringify(obj);
xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		myObj = JSON.parse(this.responseText);
		txt += "<table border='1'>"
		for (x in myObj) {
			txt += "<tr><td>" + myObj[x].name + "</td></tr>";
		}
		txt += "</table>"
		document.getElementById("demo").innerHTML = txt;
	}
};
xmlhttp.open("GET", "http://api.weatherunlocked.com/api/forecast/51.42,-0.04?app_id=432118a2&app_key=7a59aedcf941c9b66969a4e9871c0a98", true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send("x=" + dbParam);
</script>

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
console.log("hourly.php file loaded");
</script>
<!-- End of weather.php file -->
<?php
include '../../includes/footer.php';
?>
