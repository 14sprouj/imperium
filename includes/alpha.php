<style media="screen">
.blink-bold {
	-webkit-animation: 2s blink-bold step-end infinite;
	-moz-animation: 2s blink-bold step-end infinite;
	-ms-animation: 2s blink-bold step-end infinite;
	-o-animation: 2s blink-bold step-end infinite;
	animation: 2s blink-bold step-end infinite;
	color: white;
}

@keyframes "blink-bold" {
	from, to {
		color: white;
	}
	50% {
		color: black;
	}
}

@-moz-keyframes blink-bold {
	from, to {
		color: white;
	}
	50% {
		color: black;
	}
}

@-webkit-keyframes "blink-bold" {
	from, to {
		color: white;
	}
	50% {
		color: black;
	}
}

@-ms-keyframes "blink-bold" {
	from, to {
		color: white;
	}
	50% {
		color: black;
	}
}

@-o-keyframes "blink-bold" {
	from, to {
		color: white;
	}
	50% {
		color: black;
	}
}

/* from https://codepen.io/ArtemGordinsky/pen/GnLBq */

</style>
<div id="alpha-notice" class="blink-bold" style="background-color:red; text-align:center; padding:3pt;">
	Please be aware this page is currently is very early development and is the Alpha version. As a result, there will be lots of bugs and the features seen here may be changed. Use at your own risk.
	<button type="button" name="button" style="right:2pt;" onclick="CloseAlpha()">Understood</button>
</div>
<script type="text/javascript">
	function CloseAlpha() {
		document.getElementById("alpha-notice").style.display = "none";
		document.getElementById("showbox").style.display = "block";
	}
</script>
