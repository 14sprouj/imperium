function sortTableByArtist() {
	var table, rows, switching, i, x, y, shouldSwitch;
	table = document.getElementById("myTable");
	switching = true;
	/*Make a loop that will continue until
	no switching has been done:*/
	while (switching) {
		//start by saying: no switching is done:
		switching = false;
		rows = table.rows;
		/*Loop through all table rows (except the
		first, which contains table headers):*/
		for (i = 1; i < (rows.length - 1); i++) {
			//start by saying there should be no switching:
			shouldSwitch = false;
			/*Get the two elements you want to compare,
			one from current row and one from the next:*/
			x = rows[i].getElementsByTagName("TD")[2];
			y = rows[i + 1].getElementsByTagName("TD")[2];
			//check if the two rows should switch place:
			if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
				//if so, mark as a switch and break the loop:
				shouldSwitch = true;
				break;
			}
		}
		if (shouldSwitch) {
			/*If a switch has been marked, make the switch
			and mark that a switch has been done:*/
			rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
			switching = true;
		}
	}
	document.getElementById('ArtistHeader').innerHTML = "<a href='javascript:sortTableByArtistR()' class='playlistTableHeader'>Artists <i class='fas fa-sort-up'></i></a>";
	document.getElementById('SongHeader').innerHTML = "<a href='javascript:sortTableBySong()' class='playlistTableHeader'>Song Name</a>";
}

function sortTableBySong() {
	var table, rows, switching, i, x, y, shouldSwitch;
	table = document.getElementById("myTable");
	switching = true;
	/*Make a loop that will continue until
	no switching has been done:*/
	while (switching) {
		//start by saying: no switching is done:
		switching = false;
		rows = table.rows;
		/*Loop through all table rows (except the
		first, which contains table headers):*/
		for (i = 1; i < (rows.length - 1); i++) {
			//start by saying there should be no switching:
			shouldSwitch = false;
			/*Get the two elements you want to compare,
			one from current row and one from the next:*/
			x = rows[i].getElementsByTagName("TD")[1];
			y = rows[i + 1].getElementsByTagName("TD")[1];
			//check if the two rows should switch place:
			if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
				//if so, mark as a switch and break the loop:
				shouldSwitch = true;
				break;
			}
		}
		if (shouldSwitch) {
			/*If a switch has been marked, make the switch
			and mark that a switch has been done:*/
			rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
			switching = true;
		}
	}
	document.getElementById('SongHeader').innerHTML = "<a href='javascript:sortTableBySongR()' class='playlistTableHeader'>Song Name <i class='fas fa-sort-up'></i></a>";
	document.getElementById('ArtistHeader').innerHTML = "<a href='javascript:sortTableByArtist()' class='playlistTableHeader'>Artists</a>";
}

function sortTableByArtistR() {
	var table, rows, switching, i, x, y, shouldSwitch;
	table = document.getElementById("myTable");
	switching = true;
	/*Make a loop that will continue until
	no switching has been done:*/
	while (switching) {
		//start by saying: no switching is done:
		switching = false;
		rows = table.rows;
		/*Loop through all table rows (except the
		first, which contains table headers):*/
		for (i = 1; i > (rows.length - 1); i++) {
			//start by saying there should be no switching:
			shouldSwitch = false;
			/*Get the two elements you want to compare,
			one from current row and one from the next:*/
			x = rows[i].getElementsByTagName("TD")[2];
			y = rows[i + 1].getElementsByTagName("TD")[2];
			//check if the two rows should switch place:
			if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
				//if so, mark as a switch and break the loop:
				shouldSwitch = true;
				break;
			}
		}
		if (shouldSwitch) {
			/*If a switch has been marked, make the switch
			and mark that a switch has been done:*/
			rows[i].parentNode.insertBefore(rows[i], rows[i + 1]);
			switching = true;
		}
	}
	document.getElementById('ArtistHeader').innerHTML = "<a href='javascript:sortTableByArtist()' class='playlistTableHeader'>Artists <i class='fas fa-sort-down'></i></a>";
	document.getElementById('SongHeader').innerHTML = "<a href='javascript:sortTableBySong()' class='playlistTableHeader'>Song Name</a>";
}

function sortTableBySongR() {
	var table, rows, switching, i, x, y, shouldSwitch;
	table = document.getElementById("myTable");
	switching = true;
	/*Make a loop that will continue until
	no switching has been done:*/
	while (switching) {
		//start by saying: no switching is done:
		switching = false;
		rows = table.rows;
		/*Loop through all table rows (except the
		first, which contains table headers):*/
		for (i = 1; i > (rows.length - 1); i++) {
			//start by saying there should be no switching:
			shouldSwitch = false;
			/*Get the two elements you want to compare,
			one from current row and one from the next:*/
			x = rows[i].getElementsByTagName("TD")[1];
			y = rows[i + 1].getElementsByTagName("TD")[1];
			//check if the two rows should switch place:
			if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
				//if so, mark as a switch and break the loop:
				shouldSwitch = true;
				break;
			}
		}
		if (shouldSwitch) {
			/*If a switch has been marked, make the switch
			and mark that a switch has been done:*/
			rows[i].parentNode.insertBefore(rows[i - 1], rows[i]);
			switching = true;
		}
	}
	document.getElementById('SongHeader').innerHTML = "<a href='javascript:sortTableBySong()' class='playlistTableHeader'>Song Name <i class='fas fa-sort-down'></i></a>";
	document.getElementById('ArtistHeader').innerHTML = "<a href='javascript:sortTableByArtist()' class='playlistTableHeader'>Artists</a>";
}
