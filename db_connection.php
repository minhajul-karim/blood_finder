<?php
	$mysqli = new mysqli("localhost", "root", "root", "blood_finder");
	 
	// Check connection
	if($mysqli === false){
	    die("ERROR: Could not connect. " . $mysqli->connect_error);
	}
?>