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
			
			<div class='contacts_link'>
				<h3><a href='contacts.php'>Go to contacts</a></h3>  <!-- LINK TO THE LIST OF CONTACTS -->
			</div>
			
			<!-- LOGGED IN USER INFORMATION -->
			<div class="profile_info">
				<img src="images/user_profile.png">
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