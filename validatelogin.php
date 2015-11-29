<?php
include_once 'common.php';
include_once 'db.php';

session_start();

// Grab the user id and password from either the POST array (user just entered in their credentials), 
//or from the ongoing SESSION array.
if(!empty($_POST)){
	$username = isset($_POST['username']) ? $_POST['username'] : $_SESSION['username'];
	$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : $_SESSION['pwd'];
}

function redirect_to($location){
	header('Location:'.$location);
}

$_SESSION['username'] = $username;
$_SESSION['pwd'] = $pwd;

dbConnect("database_project");
$sql = "SELECT * FROM user WHERE
username = '$username' AND password = '$pwd'";

$result = mysql_query($sql);
if (!$result) {
	error('A database error occurred while checking your '.
	'login details.\nIfhis error persists, please '.
	'contact you@example.com.');
}

if (mysql_num_rows($result) == 0) {
	unset($_SESSION['username']);
	unset($_SESSION['pwd']);

	error('Invalid username or password.');
	exit;
} else {
	redirect_to("userwelcome.php");
}

?>