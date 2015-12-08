<?php //accesscontrol.php
include_once 'common.php';
include_once 'db.php';

session_start();
/**if(isset($_SESSION['username'])) {
	redirect_to("userwelcome.php");
}**/

// Grab the user id and password from either the POST array (user just entered in their credentials), 
//or from the ongoing SESSION array.


$album_name = $_SESSION['album_name'];
$year = $_SESSION['year'];
$band_id = $_SESSION['band_id'];
$name = $_SESSION['name'];



dbConnect("database_project");

$_SESSION['album_name'] = $album_name;
$_SESSION['year'] = $year;
$_SESSION['band_id'] = $band_id;
$_SESSION['name'] = $name;

$sql = "SELECT band.name,album.album_name,album.year FROM album INNER JOIN band ON album.band_id = band.band_id";
$result = mysql_query($sql);

if (mysql_num_rows($result) > 0) {
    // output data of each row
    while($row = mysql_fetch_assoc($result)) {
        echo "Band:	" . $row["name"]. " - Album:	" . $row["album_name"]. " - Year:	" . $row["year"]. "<br>";
    }
} else {
    echo "0 results";
}





?>
