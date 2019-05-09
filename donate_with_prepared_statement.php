<?php
	/* Attempt MySQL server connection. Assuming you are running MySQL
	server with default setting (user 'root' with no password) */
	//require_once(con.inc);

	//echo $a;
	include 'db_connection.php';

	// Prepare an insert statement
	$sql = "INSERT INTO donors (first_name, last_name, email, blood_group, age, district, phone, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

	if ($stmt = $mysqli->prepare($sql))
	{
		// Bind variables to the prepared statement as parameters
    	$stmt->bind_param("ssssssss", $first_name, $last_name, $email, $blood_group, $age, $district, $phone, $address);

    	//Set the parameters values and execute
		$first_name = $_REQUEST['first_name'];
		$last_name = $_REQUEST['last_name'];
		$email = $_REQUEST['email'];
		$blood_group = $_REQUEST['blood_group'];
		$age = $_REQUEST['age'];
		$district = $_REQUEST['district'];
		$phone = $_REQUEST['phone'];
		$address = $_REQUEST['address'];

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

<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Donate Blood | Blood Finder - Finding blood is easy now</title>

		<!-- Bootstrap core CSS -->
		<!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
		<link href="css/bootstrap.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="css/scrolling-nav.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">

	</head>

	<body id="page-top">

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
						<option>O-</option>
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
					<p>By clicking <em>Sign up</em> you agree to our <a href="" target="_blank">terms of service</a>
				</form>
			</div>
		</div>
		<!-- Donation form ends -->

		<section id="about">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 mx-auto">
						<h2>About this page</h2>
						<p class="lead">This is a great place to talk about your webpage. This template is purposefully unstyled so you can use it as a boilerplate or starting point for you own landing page designs! This template features:</p>
						<ul>
							<li>Clickable nav links that smooth scroll to page sections</li>
							<li>Responsive behavior when clicking nav links perfect for a one page website</li>
							<li>Bootstrap's scrollspy feature which highlights which section of the page you're on in the navbar</li>
							<li>Minimal custom CSS so you are free to explore your own unique design options</li>
						</ul>
					</div>
				</div>
			</div>
		</section>

		<section id="services" class="bg-light">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 mx-auto">
						<h2>Services we offer</h2>
						<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut optio velit inventore, expedita quo laboriosam possimus ea consequatur vitae, doloribus consequuntur ex. Nemo assumenda laborum vel, labore ut velit dignissimos.</p>
					</div>
				</div>
			</div>
		</section>

		<section id="contact">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 mx-auto">
						<h2>Contact us</h2>
						<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero odio fugiat voluptatem dolor, provident officiis, id iusto! Obcaecati incidunt, qui nihil beatae magnam et repudiandae ipsa exercitationem, in, quo totam.</p>
					</div>
				</div>
			</div>
		</section>

		<!-- Footer -->
		<footer class="py-5 bg-dark">
			<div class="container">
				<p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
			</div>
			<!-- /.container -->
		</footer>

		<!-- Bootstrap core JavaScript -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Plugin JavaScript -->
		<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

		<!-- Custom JavaScript for this theme -->
		<script src="js/scrolling-nav.js"></script>

	</body>

</html>
