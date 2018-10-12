<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Search</title>
		<link href="styles.css" rel="stylesheet" type="text/css">
		<script src="function.js"></script>
	</head>

	<body>
		<div id="main2">
			<?php
				include_once 'dbConnection.php';
				require_once 'functions.php';
				
				if(isset($_POST['search'])){
					$q = $_POST['q'];
					$sql = "SELECT * FROM contacts WHERE firstname LIKE '%" . $q . "%' OR middlenameone LIKE '%" . $q . "%' OR";
					$sql .= " middlenametwo LIKE '%" . $q . "%' OR lastname LIKE '%" . $q . "%' OR nickname LIKE '%" . $q . "%' OR";
					$sql .= " homenumber LIKE '%" . $q . "%' OR worknumber LIKE '%" . $q . "%' OR mobilenumber LIKE '%" . $q . "%' OR";
					$sql .= " addresslineone LIKE '%" . $q . "%' OR addresslinetwo LIKE '%" . $q . "%' OR email LIKE '%" . $q . "%' OR";
					$sql .= " dob LIKE '%" . $q . "%' OR memo LIKE '%" . $q . "%'";
					$query = mysqli_query($dbConnected, $sql);
					$count = mysqli_num_rows($query);
					if($count == "0"){
						echo "No result found!";
					}
					else{
						echo "<table class='altrowstable' id='alternatecolor'>";
							echo "<thead>";
								echo "<tr>";
									echo "<th>Contact ID</th>";
									echo "<th>First Name</th>";
									echo "<th>Middle Name</th>";
									echo "<th>Middle Name</th>";
									echo "<th>Last Name</th>";
									echo "<th>Nickame</th>";
									echo "<th>Home Number</th>";
									echo "<th>Work Number</th>";
									echo "<th>Mobile Number</th>";
									echo "<th>Address Line 1</th>";
									echo "<th>Address Line 2</th>";
									echo "<th>Email</th>";
									echo "<th>Date of Birth</th>";
									echo "<th>Memo</th>";
									echo "<th>Edit</th>";
									echo "<th>Delete</th>";
								echo"</tr>";
							echo "</thead>";
							echo "<tbody>";
							
							$indx = 1;
								
							while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
							{
								$ID = $row['contactID'];
								$FirstName = $row['firstname'];
								$MiddleNameOne = $row['middlenameone'];
								$MiddleNameTwo = $row['middlenametwo'];
								$LastName = $row['lastname'];
								$Nickname = $row['nickname'];
								$HomeNumber = $row['homenumber'];
								$WorkNumber = $row['worknumber'];
								$MobileNumber = $row['mobilenumber'];
								$AddressLineOne = $row['addresslineone'];
								$AddressLineTwo = $row['addresslinetwo'];
								$Email = $row['email'];
								$DateOfBirth = $row['dob'];
								$Memo = $row['memo'];
								
								echo "<tr>";
									echo "<td>".$ID."</td>";
									echo "<td>".$FirstName."</td>";
									echo "<td>".$MiddleNameOne."</td>";
									echo "<td>".$MiddleNameTwo."</td>";
									echo "<td>".$LastName."</td>";
									echo "<td>".$Nickname."</td>";
									echo "<td>".$HomeNumber."</td>";
									echo "<td>".$WorkNumber."</td>";
									echo "<td>".$MobileNumber."</td>";
									echo "<td>".$AddressLineOne."</td>";
									echo "<td>".$AddressLineTwo."</td>";
									echo "<td>".$Email."</td>";
									echo "<td>".$DateOfBirth."</td>";
									echo "<td>".$Memo."</td>";
									echo "<td align='center'><a href='edit.php?eid=".$row['contactID']."' title='Edit'><img src='images/edit.png' width='20px'/></a></td>";
									echo "<td align='center'><a href='functions.php?id=".$row['contactID']."' title='Delete'><img src='images/delete.png' width='20px'/></a></td>";
								echo "</tr>";
								
								$indx++;
							}
						echo "</table>";
						mysqli_free_result($query);
					}
					if($_SESSION['user']['user_type'] == 'user')
					{
						echo "<p><a href='contacts.php'><button class='button'>Back</button</a></p>";
					}
					else
					{
						$sql = "SELECT * FROM contacts WHERE contactID = $ID";
						$sqlQuery = mysqli_query($dbConnected, $sql);
						$queryRow = mysqli_fetch_array($sqlQuery, MYSQLI_ASSOC);
						echo "<p><a href='admin_contacts_view.php?uid=".$queryRow['userID']."'><button class='button'>Back</button></a></p>";
					}
				}
			?>
		</div>
	</body>
</html>