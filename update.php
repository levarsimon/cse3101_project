<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Contact Update</title>
		<link rel="stylesheet" href="style.css" type="text/css"  />
	</head>
	<body>
		<div id="main2">
			<?php
				require_once 'dbConnection.php';
				require_once 'functions.php';

				if($_POST)
				{
					// STORE THE VALUES PASSED BY edit.php INTO VARIABLES
					$cID = $_POST['id'];
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

					// STORE THE SQL UPDATE QUERY INTO A VARIABLE
					$updateStmt = "UPDATE contacts SET firstname = '$fname', middlenameone = '$mnameone', middlenametwo = '$mnametwo', lastname = '$lname', nickname = '$nname', homenumber = '$hnumber', worknumber = '$wnumber', mobilenumber = '$mnumber', addresslineone = '$alineone', addresslinetwo = '$alinetwo', email = '$email',  dob = '$dobirth', memo = '$memo' WHERE contactID=$cID";
					
					// QUERY THE DATABASE
					$updateQuery = mysqli_query($dbConnected, $updateStmt);

					// MESSAGES TO DISPLAY UPON THE SUCCESS OR FAILURE OF THE QUERY
					if($updateQuery)
					{
						echo "<h1><font color='green'>Congratulations!</font></h1>";
						echo "<p><b>Member Updated in Database.</b></p>";
					}
					else
					{
						echo "There was an error. Contact not updated";
					}
				}

				if($_SESSION['user']['user_type'] == 'user')
				{
					echo "<p><a href='contacts.php'><button class='button'>Back</button</a></p>";
				}
				else
				{
					echo "<p><a href='admin_contacts_view.php'><button class='button'>Back</button</a></p>";
				}
			?>
        </div>
    </body>
</html>
