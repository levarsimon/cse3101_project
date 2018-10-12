<?php 
	include('functions.php');	// INCLUDING THE PHP FILE THAT CONTAINS ALL THE NECESSARY FUNCTIONS
?>

<!DOCTYPE html>
<html>
	<head>
		<title>ConnectMe Login</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>
	
	<body>
		<div class="row">
			
			<div class="column">
				<p class="ConnectMe">ConnectMe</p>
				<p class="connectMeDescription">Stay connected<br>with the people<br>who matter<br><br>Designed by A-Team<br></p>
				<button class="createAccountButton">Create an account today</button>
			</div>

			<!-- THE LOGIN FORM -->
			<div class="column">
				<form method="post" action="login.php">
					<div class="logindiv">
						<img src="images/address_book_icon.jpg" alt="Avatar" class="avatar"><br>

						<label for="username"><b>Username</b></label><br>
						<input type="text" placeholder="Username" name="username" required><br>

						<label for="password"><b>Password</b></label><br>
						<input type="password" placeholder="Password" name="password" required><br><br>
						
						<input type="submit" value="Log In" name="login_btn">
					</div>
				</form>
			</div>
		</div>
	</body>
</html>