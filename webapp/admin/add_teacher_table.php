<html>
<head>
	<title>Add Teacher Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("../config.php");

if(isset($_POST['Submit'])) {	
	$first_name = mysqli_real_escape_string($link, $_POST['first_name']);
	$last_name = mysqli_real_escape_string($link, $_POST['last_name']);
	$teacher_number = mysqli_real_escape_string($link, $_POST['teacher_number']);
	$email = mysqli_real_escape_string($link, $_POST['email']);
	$class_list = mysqli_real_escape_string($link, $_POST['class_list']);
		
	// checking empty fields
	if(empty($first_name) || empty($last_name)|| empty($teacher_number) || empty($email) || empty($class_list)) {
				
		if(empty($first_name)) {
			echo "<font color='red'>First Name field is empty.</font><br/>";
		}
						
		if(empty($last_name)) {
			echo "<font color='red'>Last Name field is empty.</font><br/>";
		}
		
		if(empty($teacher_number)) {
			echo "<font color='red'>Teacher Number field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}

		if(empty($class_list)) {
			echo "<font color='red'>Class List field is empty.</font><br/>";
		}		
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result2 = mysqli_query($link, "INSERT INTO teacher_table(first_name,last_name,teacher_number,email, class_list) VALUES('$first_name' ,'$last_name','$teacher_number' ,
		'$email','$class_list')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='admin.php'>View Result</a>";
	}
}
?>
</body>
</html>
