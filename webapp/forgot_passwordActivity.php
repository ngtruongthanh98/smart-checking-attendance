<?php
require_once('database.php'); 
$db= $conn; // update with your database connection
// by default, error messages are empty
$emailErr='';
 // by default,set input values are empty
 $set_email='';
extract($_POST);

if(isset($_POST['forgot-password']))
{
	$validEmail="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";


	//Email Address Validation
	if(empty($email)){
	  $emailErr="Email is Required"; 
	}
	else if (!preg_match($validEmail,$email)) {
	  $emailErr="Invalid Email";
	}
	else{
	  $emailErr=true;
	}

	// check all fields are valid or not
	if($emailErr==1)
	{
		$email=$_POST['email'];
		
		$mysqli = new mysqli("localhost", "admin", "password", "attendance");
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: " . $mysqli->connect_error;
		}
		
		$res = $mysqli->query("SELECT * FROM login_table where email='$email' LIMIT 1");
		$row = $res->fetch_assoc();
		$password = $row['password'];


	}
}




?>
