<?php
	require_once "dbConnection.php";
	require_once "functions.php";
	
	if(isset($_GET['userID']))
	{
		$theUser = $_GET['userID'];
	}
	
	if (isset($_POST['create']))	// STORING THE VALUES SUBMITTED FROM THE FORM INTO VARIABLES
	{
		$fname = $_POST['firstname'];
		$mnameone = $_POST['middlenameone'];
		$mnametwo = $_POST['middlenametwo'];
		$lname = $_POST['lastname'];
		$nname = $_POST['nickname'];
		$hnumber = $_POST['homenumber'];
		$wnumber = $_POST['worknumber'];
		$mnumber = $_POST['mobilenumber'];
		$alineone = $_POST['addresslineone'];
		$alinetwo = $_POST['addresslinetwo'];
		$email =  $_POST['email'];
		$dobirth = $_POST['dob'];
		$memo = $_POST['memo'];
		
		if ($theUser == 2)
		{
			// SQL QUERY TO INSERT CONTACT INFORMATION INTO THE CONTACTS TABLE OF THE DATABASE
			$sql = "INSERT INTO contacts (firstname, middlenameone, middlenametwo, lastname, nickname, homenumber, worknumber, mobilenumber, addresslineone, addresslinetwo, email, dob, memo, userID) VALUES ('$fname', '$mnameone', '$mnametwo', '$lname', '$nname', '$hnumber', '$wnumber', '$mnumber', '$alineone', '$alinetwo', '$email', '$dobirth', '$memo', 2)"; 
			$sqlQuery = mysqli_query($dbConnected, $sql);
			$_SESSION['message'] = "Address saved"; 
			header('location: admin_contacts_view.php?uid=$theUser');
		}
		else
		{
			// SQL QUERY TO INSERT CONTACT INFORMATION INTO THE CONTACTS TABLE OF THE DATABASE
			$sql = "INSERT INTO contacts (firstname, middlenameone, middlenametwo, lastname, nickname, homenumber, worknumber, mobilenumber, addresslineone, addresslinetwo, email, dob, memo, userID) VALUES ('$fname', '$mnameone', '$mnametwo', '$lname', '$nname', '$hnumber', '$wnumber', '$mnumber', '$alineone', '$alinetwo', '$email', '$dobirth', '$memo', 3)"; 
			$sqlQuery = mysqli_query($dbConnected, $sql);
			$_SESSION['message'] = "Address saved"; 
			header('location: admin_contacts_view.php?uid=$theUser');
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Add Contact</title>
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<div id="main2">
			<form method='post' action="admin_create.php">	<!-- FORM TO CAPTURE USER'S INPUT -->
				<!-- TABLE FOR THE USER TO ENTER CONTACT INFORMATION -->
				<table class='table table-bordered'>
					<tr>
						<td colspan="2"><h1>Enter Contact Information </h1></td>
					</tr>
					<tr>
						<td>First Name</td>
						<td><input type='text' name='firstname' class='form-control' placeholder='' /></td>
					</tr>
					<tr>
						<td>Middle Name</td>
						<td><input type='text' name='middlenameone' class='form-control' placeholder='' /></td>
					</tr>
					<tr>
						<td>Middle Name</td>
						<td><input type='text' name='middlenametwo' class='form-control' placeholder='' /></td>
					</tr>
					<tr>
						<td>Last Name</td>
						<td><input type='text' name='lastname' class='form-control' placeholder='' /></td>
					</tr>
					<tr>
						<td>Nickname</td>
						<td><input type='text' name='nickname' class='form-control' placeholder='' /></td>
					</tr>
					<tr>
						<td>Home Number</td>
						<td><input type='text' name='homenumber' class='form-control' placeholder='' ></td>
					</tr>
					<tr>
						<td>Work Number</td>
						<td><input type='text' name='worknumber' class='form-control' placeholder='' ></td>
					</tr>
					<tr>
						<td>Mobile Number</td>
						<td><input type='text' name='mobilenumber' class='form-control' placeholder='' ></td>
					</tr>
					<tr>
						<td>Address Line 1</td>
						<td><input type='text' name='addresslineone' class='form-control' placeholder='' ></td>
					</tr>
					<tr>
						<td>Address Line 2</td>
						<td><input type='text' name='addresslinetwo' class='form-control' placeholder='' ></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type='text' name='email' class='form-control' placeholder='' ></td>
					</tr>
					<tr>
						<td>Date of Birth</td>
						<td><input type='text' name='dob' class='form-control' placeholder=''></td>
					</tr>
					<tr>
						<td>Memo</td>
						<td><input type='text' name='memo' class='form-control' placeholder=''></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<button type="submit" class="button" name="create">Save</button>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>


	