<?php //accesscontrol.php
include_once 'common.php';
include_once 'db.php';

session_start();
/**if(isset($_SESSION['username'])) {
	redirect_to("userwelcome.php");
}**/

// Grab the user id and password from either the POST array (user just entered in their credentials), 
//or from the ongoing SESSION array.



$band_id = $_SESSION['band_id'];
$name = $_SESSION['name'];
$info = $_SESSION['info'];




dbConnect("database_project");

$_SESSION['name'] = $name;
$_SESSION['band_id'] = $band_id;
$_SESSION['info'] = $info;

$sql = "SELECT * FROM band ORDER BY name ASC";
$result = mysql_query($sql);

if (mysql_num_rows($result) > 0) {
    // output data of each row
    while($row = mysql_fetch_assoc($result)) {
        echo "Band:	" . $row["name"]. " - Info:	" . $row["info"]. " - Year:	" . $row["year"]. "<br>";
    }
} else {
    echo "0 results";
}





?>
