<?php 
	include('dbConnection.php');
	session_start();

	// variable declaration
	$username = "";
	$errors   = array(); 

	// return user array from their id
	function getUserById($id)
	{
		global $dbConnected;
		$query = "SELECT * FROM users WHERE id= " . $id;
		$result = mysqli_query($dbConnected, $query);
		$user = mysqli_fetch_assoc($result);
		return $user;
	}

	// escape string
	function e($val)
	{
		global $dbConnected;
		return mysqli_real_escape_string($dbConnected, trim($val));
	}

	function display_error()
	{
		global $errors;

		if (count($errors) > 0){
			echo '<div class="error">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}
	
	function isLoggedIn()
	{
		if (isset($_SESSION['user'])) {
			return true;
		}else{
			return false;
		}
	}
	
	// log user out if logout button clicked
	if (isset($_GET['logout']))
	{
		session_destroy();
		unset($_SESSION['user']);
		header("location: login.php");
	}
	
	// call the login() function if register_btn is clicked
	if (isset($_POST['login_btn']))
	{
		login();
	}

	// LOGIN USER
	function login()
	{
		global $dbConnected, $username, $errors;

		// grap form values
		$username = e($_POST['username']);
		$password = e($_POST['password']);

		// make sure form is filled properly
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		// attempt login if no errors on form
		if (count($errors) == 0) {
			$password = md5($password);

			$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
			$results = mysqli_query($dbConnected, $query);

			if (mysqli_num_rows($results) == 1) { // user found
				// check if user is admin or user
				$logged_in_user = mysqli_fetch_assoc($results);
				if ($logged_in_user['user_type'] == 'admin')
				{
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header('location: admin_index.php');		  
				}
				else
				{
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header('location: index.php');
				}
			}
			else
			{
				array_push($errors, "Incorrect Username or Password");
			}
		}
	}
	
	if (isset($_GET['id']))
	{
		$id = $_GET['id'];
		mysqli_query($dbConnected, "DELETE FROM contacts WHERE contactID=$id");
		$_SESSION['message'] = "Address deleted!"; 
		header('location: contacts.php');
	}
?>