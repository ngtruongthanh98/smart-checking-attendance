<html>
<head>
	<title>Add Attendance Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("../config.php");

if(isset($_POST['Submit_attendance'])) {	
	$first_name = mysqli_real_escape_string($link, $_POST['first_name']);
	$last_name = mysqli_real_escape_string($link, $_POST['last_name']);
	$student_number = mysqli_real_escape_string($link, $_POST['student_number']);
    $class_number = mysqli_real_escape_string($link, $_POST['class_number']);
    $clock_in = mysqli_real_escape_string($link, $_POST['clock_in']);

		
	// checking empty fields
	if(empty($first_name) || empty($last_name) || empty($student_number) || empty($class_number) || empty($clock_in)) {

		if(empty($first_name)) {
			echo "<font color='red'>First Name field is empty.</font><br/>";
		}
						
		if(empty($last_name)) {
			echo "<font color='red'>Last Name field is empty.</font><br/>";
		}
		
		if(empty($student_number)) {
			echo "<font color='red'>Student Number field is empty.</font><br/>";
		}
						
		if(empty($class_number)) {
			echo "<font color='red'>Class Number field is empty.</font><br/>";
        }
						
		if(empty($clock_in)) {
			echo "<font color='red'>Clock In field is empty.</font><br/>";
        }

		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($link, "INSERT INTO attendance_table(first_name,last_name,student_number, class_number, clock_in) VALUES('$first_name' ,'$last_name',
		'$student_number','$class_number','$clock_in')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='teacher.php'>View Result</a>";
	}
}
?>
</body>
</html>
