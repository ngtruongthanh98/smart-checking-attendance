<?php 
	$hostname     = "localhost"; // enter your hostname
	$username     = "admin";  // enter your table username
	$password     = "password";   // enter your password
	$databasename = "attendance";  // enter your database
	// Create connection 
	$conn = new mysqli($hostname, $username, $password,$databasename);
	 // Check connection 
	if ($conn->connect_error) { 
		die("Unable to Connect database: " . $conn->connect_error);
	}
?>
