<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("../config.php");

if(isset($_POST['Submit'])) {	
	$first_name = mysqli_real_escape_string($link, $_POST['first_name']);
	$last_name = mysqli_real_escape_string($link, $_POST['last_name']);
	$student_number = mysqli_real_escape_string($link, $_POST['student_number']);
	$email = mysqli_real_escape_string($link, $_POST['email']);
	$rfid_uid = mysqli_real_escape_string($link, $_POST['rfid_uid']);
	$class_list = mysqli_real_escape_string($link, $_POST['class_list']);
	$created = mysqli_real_escape_string($link, $_POST['created']);
		
	// checking empty fields
	if(empty($first_name) || empty($last_name)|| empty($student_number) || empty($email) || empty($rfid_uid) || empty($class_list) || empty($created)) {
				
		if(empty($first_name)) {
			echo "<font color='red'>First Name field is empty.</font><br/>";
		}
						
		if(empty($last_name)) {
			echo "<font color='red'>Last Name field is empty.</font><br/>";
		}
		
		if(empty($student_number)) {
			echo "<font color='red'>Student Number field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
						
		if(empty($rfid_uid)) {
			echo "<font color='red'>RFID UID field is empty.</font><br/>";
		}

		if(empty($class_list)) {
			echo "<font color='red'>Class List field is empty.</font><br/>";
		}		
						
		if(empty($created)) {
			echo "<font color='red'>Created field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($link, "INSERT INTO student_table(first_name,last_name,student_number,email, rfid_uid, class_list, created) VALUES('$first_name' ,'$last_name','$student_number' ,
		'$email','$rfid_uid' ,'$class_list' ,'$created')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='admin.php'>View Result</a>";
	}
}
?>
</body>
</html>
