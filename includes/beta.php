<style media="screen">
.blink-bold {
	-webkit-animation: 2s blink-bold step-end infinite;
	-moz-animation: 2s blink-bold step-end infinite;
	-ms-animation: 2s blink-bold step-end infinite;
	-o-animation: 2s blink-bold step-end infinite;
	animation: 2s blink-bold step-end infinite;
	color: red;
}

@keyframes "blink-bold" {
	from, to {
		color: red;
	}
	50% {
		color: black;
	}
}

@-moz-keyframes blink-bold {
	from, to {
		color: red;
	}
	50% {
		color: black;
	}
}

@-webkit-keyframes "blink-bold" {
	from, to {
		color: red;
	}
	50% {
		color: black;
	}
}

@-ms-keyframes "blink-bold" {
	from, to {
		color: red;
	}
	50% {
		color: black;
	}
}

@-o-keyframes "blink-bold" {
	from, to {
		color: red;
	}
	50% {
		color: black;
	}
}

/* from https://codepen.io/ArtemGordinsky/pen/GnLBq */

</style>
<div id="beta-notice" class="blink-bold" style="background-color:yellow; text-align:center; padding:3pt;">
	Please be aware this page is currently being developed and is the Beta version. As a result, it is likely there will be bugs. Use at your own risk.
	<button type="button" name="button" style="right:2pt;" onclick="CloseBeta()">Understood</button>
</div>
<script type="text/javascript">
	function CloseBeta() {
		document.getElementById("beta-notice").style.display = "none";
		document.getElementById("showbox").style.display = "block";
	}
</script>
