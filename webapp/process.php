<?php
	$mysqli = new mysqli('localhost', 'admin', 'password', 'attendance') or die(mysqli_error($mysqli));
	
	if(isset($_POST['save']))
	{
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$student_number = $_POST['student_number'];
		$email = $_POST['email'];
		$rfid_uid = $_POST['rfid_uid'];
		$created = $_POST['created'];


		
		$mysqli->query("INSERT INTO student_table (first_name, last_name, student_number, email, rfid_uid, class_list, created) 
		VALUES('$first_name','$last_name', '$student_number','$email', '$rfid_uid', '$class_list', '$created')") or	die($mysqli->error);
	}

?>



