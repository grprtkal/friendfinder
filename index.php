<?php 
session_start(); 
include_once("connection.php"); 
?> 

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Friend Finder</title>
	<link rel="stylesheet" type="text/css" href="css/OOPAdvanced.css">
</head>
<body>
	<h1 id = "header">Friend Finder</h1> 
	<!-- Registration Validation - Errors -->
	<?php 
		if(isset($_SESSION['errormessages']))
		{
			foreach($_SESSION['errormessages'] as $errormessage)
			{
				echo $errormessage;
				unset($_SESSION['errormessages']);
			} 
		}
	?> 

	<!-- Registration Form --> 
	<h2 id = "regtitle">Register</h2> 
	<form id = "registration" action = "process.php" method = "post"> 
	<input type = "hidden" name = "which_form" value = "registration"> 

			<label for = "firstname">First Name:</label> 
			<input id = "firstname" type = "text" name = "firstname"><br/>
		
			<label for "lastname">Last Name:</label>
			<input id = "lastname" type = "text" name = "lastname"><br />

			<label for = "regemail">Email:</label> 
			<input id = "regemail" type = "text" name = "regemail"><br />

			<label for = "password">Password:</label> 
			<input id = "password" type = "password" name = "password"><br /> 

			<input type = "submit" value = "Register"> 
	</form> 

	<!-- Login Validation - Errors  -->
	<?php 
		if(isset($_SESSION['loginmessages']))
		{
			foreach($_SESSION['loginmessages'] as $loginmessage)
			{
				echo $loginmessage; 
				unset($_SESSION['loginmessages']); 
			}
		}
	?>

	<!-- Login Form -->
	<h2 id = "logintitle">Login</h2> 
	<form id = "login" action = "process.php" method = "post"> 
	<input type = "hidden" name = "which_form" value = "login"> 

		<label for = "loginemail">Email:</label> 
		<input id = "loginemail" type = "text" name = "loginemail"><br />

		<label for = "password">Password</label> 
		<input id = "password" type = "password" name = "logpassword"><br /> 

		<input type = "submit" value = "Login"> 
	</form> 
</body>
</html>



