<?php
	
	include 'header.php';
	include 'db_connection.php';

	// Prepare an insert statement
	$sql = "INSERT INTO donors (first_name, last_name, email, blood_group, age, district, phone, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

	if ($stmt = $mysqli->prepare($sql))
	{
		// Bind variables to the prepared statement as parameters
    	$stmt->bind_param("ssssssss", $first_name, $last_name, $email, $blood_group, $age, $district, $phone, $address);

    	//Set the parameters values and execute
    	if (isset($_REQUEST['first_name'], $_REQUEST['last_name'], $_REQUEST['email'], $_REQUEST['blood_group'], $_REQUEST['age'], $_REQUEST['district'], $_REQUEST['phone'], $_REQUEST['address']))
    	{
    		$first_name = $_REQUEST['first_name'];
			$last_name = $_REQUEST['last_name'];
			$email = $_REQUEST['email'];
			$blood_group = $_REQUEST['blood_group'];
			$age = $_REQUEST['age'];
			$district = $_REQUEST['district'];
			$phone = $_REQUEST['phone'];
			$address = $_REQUEST['address'];
    	}

		$stmt->execute();

		//Redirect
		if ($first_name != '' && $last_name != '' && $email != '' && $blood_group != '' && $age != '' && $district != '' && $phone != '' && $address != '')
		{
			header("Location:index.php");
		}
	}
	else
	{
		echo "ERROR: Could not prepare query: $sql. " . $mysqli->error;
	}
	// Close connection
	//$mysqli->close();
?>



<!-- Navigation -->
<?php
	include 'nav.php';
?>

<!-- Banner -->

<?php
include 'banner.php';
?>

<!-- Donation form -->
<!-- Default form register -->
<div class="container">
	<div class="row justify-content-md-center">
		<form class="text-center border border-light p-5" action="donate.php" method="post">
			<p class="h4 mb-4">Be a Donor!</p>
			<div class="form-row mb-4">
				<div class="col">
						<!-- First name -->
						<input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="First name" name="first_name">
				</div>
				<div class="col">
						<!-- Last name -->
						<input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="Last name" name="last_name">
				</div>
			</div>

			<!-- E-mail -->
			<input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail" name="email">

			<!-- Password -->
			<!-- <input type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
			<small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
					At least 8 characters and 1 digit
			</small> -->

			<!-- Blood Group -->
			<select class="form-control mb-4" id="exampleFormControlSelect1" name="blood_group">
				<option>Blood Group</option>
				<option>A+</option>
				<option>A-</option>
				<option>B+</option>
				<option>B-</option>
				<option>O+</option>
				<option>O-</option>
				<option>AB+</option>
				<option>AB-</option>
			</select>

			<input type="text" id="defaultRegisterFormPassword" class="form-control mb-4" placeholder="Age" aria-describedby="defaultRegisterFormPasswordHelpBlock" name="age">

			<input type="text" id="defaultRegisterFormPassword" class="form-control mb-4" placeholder="District" aria-describedby="defaultRegisterFormPasswordHelpBlock" name="district">

			<!-- <input type="text" id="defaultRegisterFormPassword" class="form-control mb-4" placeholder="Upzila" aria-describedby="defaultRegisterFormPasswordHelpBlock"> -->

			<!-- Phone number -->
			<input type="text" id="defaultRegisterPhonePassword" class="form-control mb-4" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock" name="phone">
			<!-- <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
					Optional - for two step authentication
			</small> -->
			<textarea class="form-control" rows="3" id="comment" placeholder="Address" name="address"></textarea>

			<!-- Sign up button -->
			<button class="btn btn-info my-4 btn-block" type="submit">Submit</button>

			<hr>
			<!-- Terms of service -->
			<p>By clicking <em>Submit</em> you agree to our <a href="" target="_blank">terms of service</a>
		</form>
	</div>
</div>
<!-- Donation form ends -->

<!-- Add additional sections -->
<?php
	include 'footer.php';
?>