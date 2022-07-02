<select id="myselect" onchange="change_myselect(this.value)">
  <option value="">Choose an option:</option>
  <option value="customers">Customers</option>
  <option value="products">Products</option>
  <option value="suppliers">Suppliers</option>
</select>

<script>
function change_myselect(sel) {
  var obj, dbParam, xmlhttp, myObj, x, txt = "";
  obj = { table: sel, limit: 20 };
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
}
</script>
