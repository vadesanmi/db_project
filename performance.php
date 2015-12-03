<?php //accesscontrol.php
include_once 'common.php';
include_once 'db.php';

session_start();
/**if(isset($_SESSION['username'])) {
	redirect_to("userwelcome.php");
}**/

// Grab the user id and password from either the POST array (user just entered in their credentials), 
//or from the ongoing SESSION array.


$performance_id = $_SESSION['performance_id'];
$name = $_SESSION['name'];
$date = $_SESSION['date'];
$venue = $_SESSION['venue'];




dbConnect("database_project");

$_SESSION['performance_id'] = $performance_id;
$_SESSION['name'] = $name;
$_SESSION['date'] = $date;
$_SESSION['venue'] = $venue;

$sql = "SELECT * FROM performance ORDER BY name ASC";
$result = mysql_query($sql);

if (mysql_num_rows($result) > 0) {
    // output data of each row
    while($row = mysql_fetch_assoc($result)) {
        echo "Band:	" . $row["name"]. " - Venue:	" . $row["venue"]. " - Date:	" . $row["date"]. "<br>";
    }
} else {
    echo "0 results";
}





?>
