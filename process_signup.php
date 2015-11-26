<?php //signup.php
include 'common.php';
include 'db.php';

if (!isset($_POST['submitok'])):
// Display the user signup form
?>
<!DOCTYPE html>
	<head>
	<title>New User Registration</title>
	<body>
		 <?php
		else:
		// Process signup submission
		dbConnect('database_project');

		if ($_POST['username']=='' or $_POST['firstname']=='' or $_POST['lastname']=='' or $_POST['email']=='' or $_POST['password']=='') {
			error('One or more required fields were left blank.\n'.
			'Please fill them in and try again.');
		}

		$sql = "SELECT COUNT(*) FROM user WHERE username = '$_POST[username]'";
		$sql2 = "SELECT COUNT(*) FROM user WHERE email = '$_POST[email]'";
		$result = mysql_query($sql);
		$result2 = mysql_query($sql2);
		if(!$result or !$result2){
			error('A database error occured in processing your submission.\n' .
					'If this error persists, please contact you@example.com.');
		}

		if(@mysql_result($result,0,0) > 0){
			error('A user already exists with your chosen userid. Please try another.');
		}

		if(@mysql_result($result2,0,4) > 0){
			error('A user already exists with your chosen email address. Please try another.');
		}

		$sql = "INSERT INTO user SET
		username = '$_POST[username]',
		password = '$_POST[password]',
		first_name = '$_POST[firstname]',
		last_name = '$_POST[lastname]',
		age = '$_POST[age]',
		email = '$_POST[email]',
		is_admin = '0'";
		if (!mysql_query($sql))
		error('Numero Dos: A database error occurred in processing your '.
		'submission.\nIf this error persists, please '.
		'contact you@example.com.');

		 ?>
<!DOCTYPE html>
<head>
<title> Registration Complete </title>
<meta http-equiv="Content-Type"
content="text/html; charset=iso-8859-1" />
</head>
<body>
<p><strong>User registration successful!</strong></p><br />
<a href="userhelloPage.html">Continue</a>

</body>
</html>
<?php
endif;
?>