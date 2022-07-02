<!-- Start of decks.php file -->
<script>
var jsmediatags = window.jsmediatags;
</script>

<script type="text/javascript">
document.getElementById("loadinfo").innerHTML = "Decks loading";
var volANew = 1;
var volBNew = 1;
var volA = 1;
var volB = 1;
var DeckADurationF = "";
var DeckACurrentF = "";
var DeckARemainingF = "";
</script>
<div id="decks">
	<div class="w3-row" style="height:fit-content;">
		<div id="DeckAAudioDiv" class="">
			<audio id="DeckAAudioEl" src="" style="width:100%;">

			</audio>
		</div>
		<div id="DeckBAudioDiv" class="">
			<audio id="DeckBAudioEl" src="" style="width:100%;">

			</audio>
		</div>
		<div id="DeckA" class="w3-col" style="width:calc(50% - 25pt)">
			<input id="DeckALengthRange" type="range" name="rng1" min="0" step="0.05" value="0" onchange="mSet1()" style="padding: 10pt 0; width: 100%;">
			<br>
			<div class="w3-quarter">
				<button id="DeckAPlay" type="button" name="button" onclick="DeckAPlay()" disabled class="play-button">
					<i class="fas fa-play"></i>
				</button>
				<button id="DeckAPause" type="button" name="button" onclick="DeckAPause()" style="display:none;" class="pause-button">
					<i class="fas fa-pause"></i>
				</button>
				<button id="DeckAEject" type="button" name="button" onclick="DeckAEject()" disabled class="eject-button">
					<i class="fas fa-eject"></i>
				</button>
				<button id="DeckAMute" type="button" name="button" onclick="DeckAMute()" style="display:none;">
					<i class="fas fa-volume-mute"></i>
				</button>
				<button id="DeckAVolLow" type="button" name="button" onclick="DeckAMute()" style="display:none;">
					<i class="fas fa-volume-down"></i>
				</button>
				<button id="DeckAVolUp" type="button" name="button" onclick="DeckAMute()">
					<i class="fas fa-volume-up"></i>
				</button>
			</div>
			<div class="w3-quarter w3-right">
				<!-- IMAGES FOR SONG STATUS -->
				<img id="DeckARedLight" src="../media/red-traffic-light.png" title="Song Not Ready to Play <?php echo $lang['SongNotReady']; ?>" alt="Song Not Ready to Play" height="30pt">
				<img id="DeckAAmberLight" src="../media/amber-traffic-light.png" title="Song Can Play But Not Fully Loaded" alt="Song Can Play But Not Fully Loaded" height="30pt" style="display:none;">
				<img id="DeckAGreenLight" src="../media/green-traffic-light.png" title="Song Fully Loaded" alt="Song Fully Loaded" height="30pt" style="display:none;">
				<!-- END OF SONG STATUS IMAGES -->

				<img id="pictureA" src="" alt="">
			</div>
			<div class="w3-rest">
				<span>Song: <span id="DeckASongText">-----</span></span>
				<br>
				<span>Artist(s): <span id="DeckAArtistText">-----</span></span>
				<br>
				<span>Album: <span id="DeckAAlbumText">-----</span></span>
				<br>
				<div class="DeckTimes">
					<span>Current <span id="DeckACurrentText">--:--</span></span> <span>Remaining <span id="DeckARemainingText">--:--</span></span>
					<br>
					<span>Duration <span id="DeckADurationText">--:--</span></span>

				</div>
			</div>
		</div>
		<div id="mixer" class="w3-col" style="width: 50pt;text-align: center;">
			<input type="range" id="DeckAVol" name="DeckAVol" min="0" max="100" oninput="DeckAVol()" value="100" orient="vertical" class="DeckVol">
			<input type="range" id="DeckBVol" name="DeckBVol" min="0" max="100" oninput="DeckBVol()" value="100" orient="vertical" class="DeckVol">
		</div>
		<div id="DeckB" class="w3-col" style="width:calc(50% - 25pt)">
			<input id="DeckBLengthRange" type="range" name="rng2" min="0" step="0.05" value="0" onchange="mSet2()" style="padding: 10pt 0; width: 100%;">
			<br>
			<div class="w3-quarter">
				<button id="DeckBPlay" type="button" name="button" onclick="DeckBPlay()" disabled class="play-button">
					<i class="fas fa-play"></i>
				</button>
				<button id="DeckBPause" type="button" name="button" onclick="DeckBPause()" style="display:none;" class="pause-button">
					<i class="fas fa-pause"></i>
				</button>
				<button id="DeckBEject" type="button" name="button" onclick="DeckBEject()" disabled class="eject-button">
					<i class="fas fa-eject"></i>
				</button>
				<button id="DeckBMute" type="button" name="button" onclick="DeckBMute()" style="display:none;">
					<i class="fas fa-volume-mute"></i>
				</button>
				<button id="DeckBVolLow" type="button" name="button" onclick="DeckBMute()" style="display:none;">
					<i class="fas fa-volume-down"></i>
				</button>
				<button id="DeckBVolUp" type="button" name="button" onclick="DeckBMute()">
					<i class="fas fa-volume-up"></i>
				</button>
			</div>
			<div class="w3-quarter w3-right">
				<!-- IMAGES FOR SONG STATUS -->
				<img id="DeckBRedLight" src="../media/red-traffic-light.png" title="Song Not Ready to Play" alt="Song Not Ready to Play" height="30pt">
				<img id="DeckBAmberLight" src="../media/amber-traffic-light.png" title="Song Can Play But Not Fully Loaded" alt="Song Can Play But Not Fully Loaded" height="30pt" style="display:none;">
				<img id="DeckBGreenLight" src="../media/green-traffic-light.png" title="Song Fully Loaded" alt="Song Fully Loaded" height="30pt" style="display:none;">
				<!-- END OF SONG STATUS IMAGES -->

				<img id="pictureB" src="" alt="">
			</div>
			<div class="w3-rest">
				<span>Song: <span id="DeckBSongText">-----</span></span>
				<br>
				<span>Artist(s): <span id="DeckBArtistText">-----</span></span>
				<br>
				<span>Album: <span id="DeckBAlbumText">-----</span></span>
				<br>
				<div class="DeckTimes">
					<span>Current <span id="DeckBCurrentText">--:--</span></span> <span>Remaining <span id="DeckBRemainingText">--:--</span></span>
					<br>
					<span>Duration <span id="DeckBDurationText">--:--</span></span>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
const getCellValue = (tr, idx) => tr.children[idx].innerText || tr.children[idx].textContent;

const comparer = (idx, asc) => (a, b) => ((v1, v2) =>
v1 !== '' && v2 !== '' && !isNaN(v1) && !isNaN(v2) ? v1 - v2 : v1.toString().localeCompare(v2)
)(getCellValue(asc ? a : b, idx), getCellValue(asc ? b : a, idx));

// do the work...
document.querySelectorAll('th.playlistTableHeader').forEach(th => th.addEventListener('click', (() => {
	const table = th.closest('table');
	Array.from(table.querySelectorAll('tr:nth-child(n+2)'))
	.sort(comparer(Array.from(th.parentNode.children).indexOf(th), this.asc = !this.asc))
	.forEach(tr => table.appendChild(tr) );
})));
</script>

<script type="text/javascript">
document.getElementById("loadinfo").innerHTML = "Decks loaded";
</script>
<script type="text/javascript">
load++;
</script>
<!-- End of decks.php file -->
