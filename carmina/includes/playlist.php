<!-- Start of playlist.php file -->
<script type="text/javascript">
document.getElementById("loadinfo").innerHTML = "Playlist Loading";
</script>
<style>
th.sort {
	cursor: pointer;
}
</style>
<div id="playlistModule">


	<div class="l4 songSearch s12">
		<h3 style="display:inline;">Songs Search</h3>
		<form method="post" style="display:inline;">
			<button type="button" name="refresh" style="display:inline;">
				<i class="fas fa-sync-alt"></i>
			</button>
		</form>

		<input type="text" id="filterbox" onkeyup="filter()" placeholder="Search for songs.." title="Type in a Song Name" style="display:inline;">


		<!-- <script type="text/javascript">
		var $playlist = $("playlist.php");
		function reloadPlaylist () {
		$playlist.load("playlist.php");
	}
</script> -->
<br>
<!-- <div id="SongsLoading" style="overflow:auto; height:240pt; background-color:white; font-size:30pt; text-align:center; vertical-align:middle;">
Song List Loading
</div> -->
<button type="button" name="button" onclick="SongFull()" class="PlaylistButton">View all songs</button>
<br>
<div id="AllSongs" style="overflow:auto; height:240pt;">
	<?php
	include '../vendor/autoload.php';
	include '../vendor/james-heinrich/getid3/getid3/getid3.php';

	$getID3 = new getID3;
	//include 'includes/mp3file.class.php';
	// include 'includes/config.php';
	echo "<table id='myTable' class='banded' height='300pt'>";
	echo "<thead>";
	echo "<tr>";
	echo "<th>Add to Deck</th>";
	//echo "<th id='IdHeader' class='playlistHeader'>";
	//echo "<button onclick='javascript:sortTableById()' class=\"playlistHeader\">";
	//echo "Song Id";
	//echo "</button>";
	//echo "</th>";
	echo "<th id='SongHeader' class='playlistHeader'>";
	echo "<button onclick='javascript:sortTableBySong()' class=\"playlistHeader\">";
	echo "Song Name";
	echo "</button>";
	echo "</th>";
	echo "<th id='ArtistHeader' class='playlistHeader'>";
	echo "<button onclick='javascript:sortTableByArtist()' class=\"playlistHeader\">";
	echo "Artists";
	echo "</button>";
	echo "</th>";
	echo "<th id='AlbumHeader' class='playlistHeader'>";
	echo "<button onclick='javascript:sortTableByAlbum()' class=\"playlistHeader\">";
	echo "Album";
	echo "</button>";
	echo "</th>";
	echo "<th class='playlistTableHeader'>";
	echo "<button onclick='javascript:sortTableByLength()' class=\"playlistHeader\">";
	echo "Length";
	echo "</button>";
	echo "</th>";
	echo "<th id='GenreHeader' class='playlistTableHeader'>";
	echo "<button onclick='javascript:sortTableByGenre()' class=\"playlistHeader\">";
	echo "Genre";
	echo "</button>";
	echo "</th>";
	echo "<th>";
	echo "Version";
	echo "</th>";
	echo "<th id='ExplicitHeader' class='playlistTableHeader'>";
	echo "<button onclick='javascript:sortTableByExplicit()' class=\"playlistHeader\" title='E means Explicit R means unsuitable for Radio N means Not Explicit'>";
	echo "Explicit";
	echo "</button>";
	echo "</th>";
	echo "<th></th>";
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";
	$i = 0;
	
$criteria = 'songs/*/*/*.mp3';
foreach(glob($criteria) as $filename){
	
	// explode filename to get song name, artist, album, etc. to array
	$file = explode("/", $filename);
	$ext = end(explode('.', $filename));
	$folder = $file[0];
	$artist = $file[1];
	$album = $file[2];
	$name = $file[3];
	$name = str_replace(".mp3", "", $name);
	$check = "songs/$file[1]/$file[2]/$file[3]";

	$last  = substr($name, -1);
	if ($last != 1 && $last != 2 && $last != 3 && $last != 4 && $last != 5 && $last != 6 && $last != 7 && $last != 8 && $last != 9) {
		$ThisFileInfo = $getID3->analyze($check);
		echo "<tr>
		<td>
		<button type=\"button\" class=\"DeckButton AddToAButton\" onclick=\"addToA('songs/$artist/$album/$file[3]', '$name', '$album', '$artist')\">A</button>
		</td>
		<td>";
		if (isset($ThisFileInfo['tags']['id3v2']['title'][0])) {
			echo $ThisFileInfo['tags']['id3v2']['title'][0];
		 } elseif (isset($ThisFileInfo['tags']['id3v1']['title'][0])) {
			echo $ThisFileInfo['tags']['id3v1']['title'][0];
		 } elseif (isset($name)) {
			echo $name;
		 } else {
			echo "Unknown Title";
		 }
		 echo "</td>
		<td>";
		if (isset($ThisFileInfo['tags']['id3v2']['artist'][0])) {
			echo $ThisFileInfo['tags']['id3v2']['artist'][0];
		} elseif (isset($ThisFileInfo['tags']['id3v1']['artist'][0])) {
			echo $ThisFileInfo['tags']['id3v1']['artist'][0];
		} elseif (isset($artist)) {
			echo $artist;
		} else {
			echo "Unknown Artist";
		} 
		echo "</td>
		<td>";
		if (isset($ThisFileInfo['tags']['id3v2']['album'][0])) {
			echo $ThisFileInfo['tags']['id3v2']['album'][0];
		} elseif (isset($ThisFileInfo['tags']['id3v1']['album'][0])) {
			echo $ThisFileInfo['tags']['id3v1']['album'][0];
		} elseif (isset($album)) {
			echo $album;
		} else {
			echo "Unknown Album";
		}
		echo "</td>
		<td>";
		$media = wapmorgan\MediaFile\MediaFile::open($check);
		$duration = $media->getAudio()->getLength().PHP_EOL;
		$channels = $media->getAudio()->getChannels().PHP_EOL;
		$bitrate = $media->getAudio()->getBitrate().PHP_EOL;
		
		if ($bitrate < 128000) {
			$duration = $duration / 2;
		}
		if ($duration < 60) {
			echo "0:".$duration;
		} else {
			$minutes = floor($duration / 60);
			$seconds = ceil($duration % 60);
			echo $minutes.":";
			if ($seconds < 10) {
				echo "0".$seconds;
			} else {
				echo $seconds;
			}
		}
		//echo " (".$channels." channels) (".$bitrate." kbps)";
		echo "</td>
		<td>";
		// if var set to 1, then it is explicit
		if (isset($ThisFileInfo['tags']['id3v2']['genre'][0])) {
			echo $ThisFileInfo['tags']['id3v2']['genre'][0];
		} else {
			echo "Unknown";
		}
		echo "</td>
		<td>";
		if (isset($ThisFileInfo['tags']['id3v2']['version'][0])) {
			echo $ThisFileInfo['tags']['id3v2']['version'][0];
		} else {
			echo "Unknown";
		}
		echo "</td>
		<td>";
		if (isset($ThisFileInfo['tags']['id3v2']['explicit'][0])) {
			echo $ThisFileInfo['tags']['id3v2']['explicit'][0];
		} elseif ($ThisFileInfo['tags']['id3v1']['explicit'][0]) {
			echo $ThisFileInfo['tags']['id3v1']['explicit'][0];
		} else {
			echo "Unknown";
		}
		echo "</td>
		</tr>";
		$i++;
	}
}

?>
</tbody>
</table>
</div>
<script>
	function addToA(file, song, album, artist) {
		DeckANotPlay();
		document.getElementById("DeckAAudioEl").src = file;
		document.getElementById('DeckAArtistText').innerHTML = artist;
		document.getElementById('DeckASongText').innerHTML = song;
		document.getElementById('DeckAAlbumText').innerHTML = album;
		document.getElementById('DeckAPlay').disabled = false;
		document.getElementById('DeckAEject').disabled = false;
		document.getElementById('DeckAAudioEl').volume = volANew;
		document.getElementById('DeckALengthRange').disabled = false;
		document.getElementById('pictureA').src = 'songs/".$row['MainArtist']."/".$row['Album']."/".$row['Album'].".jpg';
		DeckAPause()
		getDeckTimes();
		document.getElementById('DeckAAudioEl').load();
	}
	function addToB(song) {
		document.getElementById("DeckBAudioEl").src = song;
	}
</script>