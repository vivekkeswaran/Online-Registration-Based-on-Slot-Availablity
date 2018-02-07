<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
$firstname = "";
$lastname = "";
$sid = "";
$email = "";
$timeslot = "";
$seatsAvailable = "";
$prevslot = "";
$confirmText = "";

$db = mysqli_connect('localhost','root','','my_database');
if (isset($_POST['confirm'])) {
		$confirmText = mysqli_real_escape_string($db, $_POST['confirm']);
		if($confirmText != "Cancel")
		{	
			$firstname = mysqli_real_escape_string($db, $_POST['firstname']);
			$lastname = mysqli_real_escape_string($db, $_POST['lastname']);
			$sid = mysqli_real_escape_string($db, $_POST['sid']);
			$email = mysqli_real_escape_string($db, $_POST['emailaddress']);
			$timeslot = mysqli_real_escape_string($db, $_POST['slots']);
			$prevslot = mysqli_real_escape_string($db, $_POST['prevslot']);
			
			if($timeslot != $prevslot)
			{
				$query = "SELECT * FROM timeslot_details where ID in ($timeslot, $prevslot)";

				$result = $db->query($query);
					
				if ($result->num_rows > 0) 
				{
					while($row = $result->fetch_assoc()) 
					{
						$temp = $row["ID"];
						if($temp == $prevslot)
						{
							$query = "UPDATE timeslot_details SET SEATS = (SEATS + 1) WHERE ID = $temp";
							mysqli_query($db, $query);	
						}	
						else if($temp == $timeslot)
						{
							$query = "UPDATE timeslot_details SET SEATS = (SEATS - 1) WHERE ID = $temp";
							mysqli_query($db, $query);	
						}									
					}

					$query = "UPDATE student SET FIRST_NAME='$firstname', LAST_NAME='$lastname', EMAIL_ADDRESS='$email', TIMESLOT_ID=$timeslot WHERE SID = '$sid'";
					mysqli_query($db, $query);
				} 
			}
		}		
		include('success.php');	
}

if (isset($_POST['reg_student'])) {
	$firstname = mysqli_real_escape_string($db, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($db, $_POST['lastname']);
	$sid = mysqli_real_escape_string($db, $_POST['sid']);
	$email = mysqli_real_escape_string($db, $_POST['emailaddress']);
	$timeslot = mysqli_real_escape_string($db, $_POST['slots']);
	
	$query = "SELECT * FROM student where SID='$sid'";	
	$result = $db->query($query);
	
	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{	
		?>
		<div class="container">
			<div class="header">
				<h3>
					COMP207 - Register here for a practical slot
				</h3>
			</div>
			<br/><br/><br/><br/>
			<form method="post" action="">
				<table class="inputarea" id="tblWarning"> 
					<tr>
						<th class="msgpos">
							<div class="my-notify-warning">
									You have already registered for the Timeslot. Do you want to change it?
							</div>
						</th>
						<input type="hidden" name="firstname" value="<?php echo $firstname ?>">
						<input type="hidden" name="lastname" value="<?php echo $lastname ?>">
						<input type="hidden" name="sid" value="<?php echo $sid ?>">
						<input type="hidden" name="emailaddress" value="<?php echo $email ?>">
						<input type="hidden" name="slots" value="<?php echo $timeslot ?>">
						<input type="hidden" name="prevslot" value="<?php echo $row["TIMESLOT_ID"] ?>">
					</tr>
					<tr>
						<th style="text-align:center;">					
							<button type="submit" class="btn" name="confirm" value="Continue">Continue</button>
							<button type="submit" class="btn" name="confirm" value="Cancel">Cancel</button>
						</th>
					</tr>
				</table>
			</form>
		</div>
		<?php
		}
	}
	else
	{		
		$query = "INSERT INTO `student`(`SID`, `FIRST_NAME`, `LAST_NAME`, `EMAIL_ADDRESS`, `TIMESLOT_ID`) 
						VALUES ('$sid','$firstname','$lastname','$email','$timeslot')";
				
		mysqli_query($db, $query);
			
		$query = "SELECT * FROM timeslot_details where ID=$timeslot";
				
		$result = $db->query($query);
					
		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) 
			{			
				$seatsAvailable = intval($row['SEATS']) - 1;
			}
				
			$query = "UPDATE `timeslot_details` SET `SEATS`='$seatsAvailable' WHERE ID = $timeslot";
			mysqli_query($db, $query);
		}
        
        include('success.php'); 
	}
}
?>