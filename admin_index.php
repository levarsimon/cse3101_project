<?php
	// PHP SCRIPT TO ENSURE USER IS LOGGED IN BEFORE ACCESSING THE INDEX PAGE
	include('functions.php');
	if (!isLoggedIn())
	{
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>ConnectMe Home</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>
	<body>
		<div class="header">
			<h2>Home Page</h2>
		</div>
		<div class="content">
			<!-- NOTIFICATION MESSAGE THAT DEPENDS ON THE OUTCOME OF THE LOGIN ATTEMPT -->
			<?php if (isset($_SESSION['success'])) : ?>
				<div class="error success" >
					<h3>
						<?php 
							echo $_SESSION['success']; 
							unset($_SESSION['success']);
						?>
					</h3>
				</div>
			<?php endif ?>
			
			<!-- LOGGED IN USER INFORMATION -->
			<form method="post" action="admin_contacts_view.php">	<!-- FORM TO SELECT WHICH USER CONTACTS TO VIEW -->
				<p>Select user</p><br>
				<select name="users">
					<option value="user1">User1</option>
					<option value="user2">User2</option>
				</select>
				<input type="submit" name="selection" value="Select">
			</form>
			
			<div class="profile_info">
				<img src="images/admin_profile.png">
				<div>
					<?php  if (isset($_SESSION['user'])) : ?>
						<strong><?php echo $_SESSION['user']['username']; ?></strong>
						<small>
							<br>
							<a href="index.php?logout='1'" style="color: red;">logout</a>
						</small>

					<?php endif ?>
				</div>
			</div>
		</div>
	</body>
</html>