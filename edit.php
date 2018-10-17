<?php
	include_once 'dbConnection.php';
	include('functions.php');
	
	if(isset($_GET['eid']) && $_GET['eid'] !== '')
	{
		// STORE THE ID OF THE CONTACT TO BE EDITED IN A VARIABLE
		$contactID = $_GET['eid'];
		
		// QUERY TO SELECT THE CONTACT FROM THE CONTACTS TABLE OF THE DATABASE
		$queryStmt = "SELECT * FROM contacts WHERE contactID = $contactID";
		
		// QUERY THE DATABASE AND STORE THE RESULT IN THE VARIABLE $contactsQuery
		$contactsQuery = mysqli_query($dbConnected, $queryStmt);
		
		// STORE THE RESULT AS AN ASSOCIATIVE ARRAY
		$row = mysqli_fetch_array($contactsQuery, MYSQLI_ASSOC);
	}
	else
	{
		echo "eid is empty";
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Edit Contact</title>
		<link href="createstyle.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<div id="main2">
		
			<div class="profile_info">
				<img src="images/user_profile.png" width="40px">
				<div>
					<a href="index.php?logout='1'" style="color: red;">logout</a>
				</div>
			</div>
			
			<div style="margin-left: 20%; margin-right: 20%;">
			<form method='post' action="update.php" class="formFormat">
				 <div class="row">
	     <div class="column" style="padding-left: 11%;">
		    <label for="fname">First Name*</label> <br>
		     <input type='text' name='firstname' value="<?php echo $row['firstname'];?>" class='form-control' placeholder='' /> <br>

		     <label for="lname">Last Name*</label> <br>
		     <input type='text' name='lasstname' value="<?php echo $row['lastname'];?>" class='form-control' placeholder='' /> <br>
		    
		     <label for="fname">Middle Name1</label><br>
		     <input type='text' name='middlenameone' value="<?php echo $row['middlenameone'];?>" class='form-control' placeholder='' /> <br>

		     <label for="lname">Middle Name2</label><br>
		     <input type='text' name='middlenametwo' value="<?php echo $row['middlenametwo'];?>" class='form-control' placeholder='' /> <br>

		     <label for="lname">Nickname</label><br>
		     <input type='text' name='nickname' value="<?php echo $row['nickname'];?>" class='form-control' placeholder='' /> <br>
		    
		     <label for="fname">Telephone Number*</label><br>
		     <input type='text' name='homenumber' value="<?php echo $row['homenumber'];?>" class='form-control' placeholder='' /> <br>

		     <label for="lname">Cellphone Number*</label><br>
		     <input type='text' name='cellnumber' value="<?php echo $row['cellnumber'];?>" class='form-control' placeholder='' /> <br>
		    
		     <label for="fname">Work Number</label><br>
		     <input type='text' name='mobilenummber' value="<?php echo $row['mobilenumber'];?>" class='form-control' placeholder='' /> <br>
		    </div>

		    
		   <div class="column" >
		    <label for="fname">Email</label><br>
		    <input type='text' name='email' value="<?php echo $row['email'];?>" class='form-control' placeholder='' /> <br>   

		    <label for="lname">Address Line1*</label><br>
		    <input type='text' name='addresslineone' value="<?php echo $row['addresslineone'];?>" class='form-control' placeholder='' /> <br>
		    
		     <label for="lname">Address Line2</label><br>
		    <input type='text' name='addresslinetwo' value="<?php echo $row['addresslinetwo'];?>" class='form-control' placeholder='' /> <br>
		    
		    
		    <label for="lname">Date of Birth*</label><br>
		    <input type='Date' name='dob' value="<?php echo $row['dob'];?>" class='form-control' placeholder='' /> <br>
		    
		    <label for="lname">Memo</label> <br>
		    <input type='textarea' name='memo' value="<?php echo $row['memo'];?>" class='form-control' placeholder='' /> <br>
    
    		<br>
    		<input type="submit" class="viewContactButton"; value="Save">
    </div>
    </div>
				<!-- TABLE TO DISPLAY THE CONTACT INFORMATION TO BE EDITED 
				<table class='table table-bordered'> 
					<tr>
						<td colspan="2"><h1>Edit Contact Information </h1></td>
					</tr>
					<input type='hidden' name='id' value="<?php /*echo $row['contactID'];?>"/>
					<tr>
						<td>First Name</td>
						<td><input type='text' name='firstname' value="<?php echo $row['firstname'];?>" class='form-control' placeholder='' /></td>
					</tr>
					<tr>
						<td>Middle Name</td>
						<td><input type='text' name='middlenameone' value="<?php echo $row['middlenameone'];?>" class='form-control' placeholder='' /></td>
					</tr>
					<tr>
						<td>Middle Name</td>
						<td><input type='text' name='middlenametwo' value="<?php echo $row['middlenametwo'];?>" class='form-control' placeholder='' /></td>
					</tr>
					<tr>
						<td>Last Name</td>
						<td><input type='text' name='lastname' value="<?php echo $row['lastname'];?>" class='form-control' placeholder='' /></td>
					</tr>
					<tr>
						<td>Nickname</td>
						<td><input type='text' name='nickname' value="<?php echo $row['nickname'];?>" class='form-control' placeholder='' /></td>
					</tr>
					<tr>
						<td>Home Number</td>
						<td><input type='text' name='homenumber' value="<?php echo $row['homenumber']; ?>"  class='form-control' placeholder='' ></td>
					</tr>
					<tr>
						<td>Work Number</td>
						<td><input type='text' name='worknumber' value="<?php echo $row['worknumber']; ?>"  class='form-control' placeholder='' ></td>
					</tr>
					<tr>
						<td>Mobile Number</td>
						<td><input type='text' name='mobilenumber' value="<?php echo $row['mobilenumber']; ?>"  class='form-control' placeholder='' ></td>
					</tr>
					<tr>
						<td>Address Line 1</td>
						<td><input type='text' name='addresslineone' value="<?php echo $row['addresslineone']; ?>"  class='form-control' placeholder='' ></td>
					</tr>
					<tr>
						<td>Address Line 2</td>
						<td><input type='text' name='addresslinetwo' value="<?php echo $row['addresslinetwo']; ?>"  class='form-control' placeholder='' ></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type='text' name='email'  value="<?php echo $row['email']; ?>"  class='form-control' placeholder='' ></td>
					</tr>
					<tr>
						<td>Date of Birth</td>
						<td><input type='text' name='dob'  value="<?php echo $row['dob']; ?>" class='form-control' placeholder=''></td>
					</tr>
					<tr>
						<td>Memo</td>
						<td><input type='text' name='memo'  value="<?php echo $row['memo']*/; ?>" class='form-control' placeholder=''></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<button type="submit" class="button" >Save</button> 
						</td> 
					</tr>
				</table> -->
			</form>
		 </div>
		</div>
	</body>
</html>
