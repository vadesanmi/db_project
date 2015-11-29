<?php //accesscontrol.php
include_once 'common.php';
include_once 'db.php';

session_start();

/**if(isset($_SESSION['username'])) {
	redirect_to("userwelcome.php");
}**/

// Grab the user id and password from either the POST array (user just entered in their credentials), 
//or from the ongoing SESSION array.
if(!empty($_POST) or isset($_SESSION['username'])){
	$username = isset($_POST['username']) ? $_POST['username'] : $_SESSION['username'];
	$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : $_SESSION['pwd'];
}

if(!isset($username)) {
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Please Log In for Access </title>
		<meta http-equiv="Content-Type"
		content="text/html; charset=iso-8859-1" />
	</head>
	<body>
		<h1> Login Required </h1>
		<p>You must log in to access this area of the site. <a href="login.html">Click here</a> to log in. If you are
		not a registered user, <a href="signup.html">click here</a>
		to sign up for access to the live band site!</p>
	</body>
</html>
<?php
exit;
}

/*
After unlogged users are prompted to enter their log-in credentials,
the script grabs the values and checks if they are a valid user in the database.
*/

dbConnect("database_project"); // Need this before using mysql_query statements!!!

$_SESSION['username'] = $username;
$_SESSION['pwd'] = $pwd;

$sql = "SELECT first_name FROM user WHERE
		username = '$username'";
$result = mysql_query($sql);

$_SESSION['first_name'] = mysql_result($result,0,'first_name');


//dbConnect("database_project");
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
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Access Denied </title>
		<meta http-equiv="Content-Type"
		content="text/html; charset=iso-8859-1" />
	</head>
	<body>
	<h1> Access Denied </h1>
	<p>
		Your user ID or password is incorrect, or you are not a
		registered user on this site. To try logging in again, click
		<a href="loginPage.html">here</a>. To register for instant
		access, click <a href="signupPage.html">here</a>.
	</p>
	</body>
</html>
<?php
exit;
}

$username = mysql_result($result,0,'username');

?>