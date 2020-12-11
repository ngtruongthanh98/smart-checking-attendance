<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("../config.php");

if(isset($_POST['Submit_class'])) {	
	$subject_code = mysqli_real_escape_string($link, $_POST['subject_code']);
	$subject_name = mysqli_real_escape_string($link, $_POST['subject_name']);
	$day_in_week = mysqli_real_escape_string($link, $_POST['day_in_week']);
	$start_time = mysqli_real_escape_string($link, $_POST['start_time']);
	$end_time = mysqli_real_escape_string($link, $_POST['end_time']);
	$room = mysqli_real_escape_string($link, $_POST['room']);
		
	// checking empty fields
	if(empty($subject_code) || empty($subject_name) || empty($day_in_week) || empty($start_time) || empty($end_time) || empty($room)) {
				
		if(empty($subject_code)) {
			echo "<font color='red'>Subject Code field is empty.</font><br/>";
		}
						
		if(empty($subject_name)) {
			echo "<font color='red'>Subject Name field is empty.</font><br/>";
		}
		
		if(empty($day_in_week)) {
			echo "<font color='red'>Day in Week field is empty.</font><br/>";
		}
		
		if(empty($start_time)) {
			echo "<font color='red'>Start Time field is empty.</font><br/>";
		}
						
		if(empty($end_time)) {
			echo "<font color='red'>End Time field is empty.</font><br/>";
		}

		if(empty($room)) {
			echo "<font color='red'>Room field is empty.</font><br/>";
		}		
						
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($link, "INSERT INTO class_table(subject_code,subject_name,day_in_week,start_time, end_time, room) VALUES('$subject_code' ,'$subject_name','$day_in_week' ,
		'$start_time','$end_time' ,'$room')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='admin.php'>View Result</a>";
	}
}
?>
</body>
</html>
