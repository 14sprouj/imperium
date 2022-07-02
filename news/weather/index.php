<!-- Start of weather.php file -->
<?php
$page_name = "Hourly Forecast";
include '../../includes/head.php';
?>

<style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

.day {
  color: #c2c2c2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

.hours {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  top: 8px;
  margin-top: 12pt;
  margin-left: 20pt;
  margin-right: 20pt;
  width: 100%;
  text-align: center;
}

.hour {
  border: solid #f2f2f2 1pt;
  font-size: 15px;
  padding: 8px 12px;
  text-align: center;
}


/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>

<?php
$json = file_get_contents('http://api.weatherunlocked.com/api/forecast/51.42,-0.04?app_id=432118a2&app_key=7a59aedcf941c9b66969a4e9871c0a98');
$obj = json_decode($json);
$i = 0;
echo "<div class=\"slideshow-container\">";
while ($i < 6) {
	$j = 0;
	echo "<div class=\"mySlides fade\">";
	echo "<div>".$obj->Days[$i]->date."</div>";
	echo "<div class=\"day\">Hi</div>";
	echo "<div class=\"w3-row hours\">";
	while ($j < 8) {
		echo "<div class=\"w3-content sw-seventh hour\">";
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
		echo "</div>";

		$j++;
	}
	echo "</div>";
	echo "</div>";
	$i++;
}
echo "</div>";
// ini_set("allow_url_fopen", 1);
?>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
	<span class="dot" onclick="currentSlide(4)"></span>
	<span class="dot" onclick="currentSlide(5)"></span>
	<span class="dot" onclick="currentSlide(6)"></span>
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
</script>

<div class="w3-row w3-whole">
	Last Updated <?php echo date("d/m/Y h:i:s a"); ?>
</div>

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
console.log("index.php file loaded");
</script>
<!-- End of weather.php file -->
<?php
include '../../includes/footer.php';
?>
