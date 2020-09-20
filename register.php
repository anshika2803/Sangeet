<?php
    include("includes/config.php");
    include("includes/handlers/register-handler.php");
    include("includes/handlers/login-handler.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Sangeet!</title>
</head>
<body>
	<div id="inputContainer">
		<form id="LoginForm" action="register.php" method="POST">
			<h2>Login Account</h2>
			<p>
				<label for="LoginUsername">Username</label>
			<input id="LoginUsername" name="LoginUsername" type="text" placeholder="e.g. Elon Musk" required >
			</p>
			<p>
				<label for="LoginPassword">Password</label>
			<input id="LoginPassword" name="LoginPassword" type="password"placeholder="Your Password"  required >
			</p>
			<button type="Submit" name="LoginButton"> LOGIN</button>
			
		</form>
		<form id="SignUPForm" action="register.php" method="POST">
			<h2>Create New Account</h2>
			<p>
				<label for="SignUpUsername">Username</label>
			<input id="SignUpUsername" name="SignUpUsername" type="text" placeholder="e.g. Elon Musk" required >
			</p>
			<p>
				<label for="FirstName">First Name</label>
			<input id="FirstName" name="FirstName" type="text" placeholder="e.g. Elon" required >
			</p>
			<p>
				<label for="Lastname">Last Name</label>
			<input id="Lastname" name="Lastname" type="text" placeholder="e.g. Musk" required >
			</p>
			<p>
				<label for="Email">Email</label>
			<input id="Email" name="Email" type="email" placeholder="e.g. ElonMusk@gmail.com" required >
			</p>
			<p>
				<label for="Email2">Confirm Email</label>
			<input id="Email2" name="Email2" type="email" placeholder="e.g. ElonMusk@gmail.com" required >
			</p>
			<p>
				<label for="SignUpPassword">Password</label>
			<input id="SignUpPassword" name="SignUpPassword" type="password"placeholder="Your Password" required >
			</p>
			<p>
				<label for="SignUpPassword2">Confirm Password</label>
			<input id="SignUpPassword2" name="SignUpPassword2" type="password"placeholder="Confirm Password"  required >
			</p>
			<button type="Submit" name="SignUpButton"> Sign Up</button>
			
		</form>
		
		
	</div>
 
</body>
</html>