<?php include 'accesscontrol.php'; ?>

<html>
<head>
  <title>Welcome</title>
  <link rel = "stylesheet" href = "style.css">
</head>
  <body>

  <form name="MY Form"action="Login">
	<fieldset>

		<legend>'Hello <?php echo $_SESSION['first_name']; ?> </legend>
		<center>
			<button onClick = "location.href='loginPage.html'" style="width: 200px; height: 60px" type="button">My Personal Info</button>
			<button onClick = "location.href='signupPage.html'" style="width: 200px; height: 60px" type="button">My Favorite Bands</button>
			<button onClick = "location.href='loginPage.html'" style="width: 200px; height: 60px" type="button">My Shows</button>
			<button onClick = "location.href='signupPage.html'" style="width: 200px; height: 60px" type="button">My Albums</button>
			<button onClick = "location.href='loginPage.html'" style="width: 200px; height: 60px" type="button">Band Comments</button>
			<button onClick = "location.href='signupPage.html'" style="width: 200px; height: 60px" type="button">Performance Comments</button>
		</center>
	</fieldset>
  </form>

  </body>

</html>