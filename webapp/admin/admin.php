<?php
session_start();

if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='admin')
{
  echo "<script>window.location.assign('../login.php')</script>";
}
?>

<?php
//including the database connection file
include_once("../config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($link, "SELECT * FROM student_table ORDER BY id_stu"); // using mysqli_query instead
$result2 = mysqli_query($link, "SELECT * FROM teacher_table ORDER BY id_teacher"); // using mysqli_query instead
$result3 = mysqli_query($link, "SELECT * FROM class_table ORDER BY id_class"); // using mysqli_query instead
$result4 = mysqli_query($link, "SELECT * FROM login_table ORDER BY id_login"); // using mysqli_query instead
$result5 = mysqli_query($link, "SELECT * FROM attendance_table ORDER BY id_atd"); // using mysqli_query instead

?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Smart Checking Attendance</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  <?php include '../CSS/main.css'; ?>
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<style type="text/css">
    body{ font: 14px sans-serif; }
    .wrapper{ width: 350px; padding: 20px; }
</style>

</head>
<body>

<div class="header">
  <h1>Smart Checking Attendance</h1>
</div>

<div class="navbar">
  <a href="admin.php">Home</a>
  <a href="#">Link</a>
  <a href="#">Link</a>
  <a href="../logout.php" class="right">Logout</a>
  <a class="right">Welcome <?php echo $_SESSION['mysesi'] ?></a>
</div>

<div class="container">
<a href="add_student_table.html">Add New Student Data</a><br/><br/>
<strong>Student Table</strong>
<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>ID</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Student Number</td>
		<td>Email</td>
		<td>RFID UID</td>
		<td>Class List</td>
		<td>Created</td>
		<td>Update</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['id_stu']."</td>";
		echo "<td>".$res['first_name']."</td>";
		echo "<td>".$res['last_name']."</td>";
		echo "<td>".$res['student_number']."</td>";
		echo "<td>".$res['email']."</td>";	
		echo "<td>".$res['rfid_uid']."</td>";
		echo "<td>".$res['class_list']."</td>";
		echo "<td>".$res['created']."</td>";	
		echo "<td><a href=\"edit_student_table.php?id_stu=$res[id_stu]\">Edit</a> | <a href=\"delete_student_table.php?id_stu=$res[id_stu]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
	<br><br>


<a href="add_teacher_table.html">Add New Teacher Data</a><br/><br/>
	<strong>Teacher Table</strong>
	<table width='80%' border=0>
	<tr bgcolor='#CCCCCC'>
		<td>ID</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Teacher Number</td>
		<td>Email</td>
		<td>Class List</td>
		<td>Update</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result2)) { 		
		echo "<tr>";
		echo "<td>".$res['id_teacher']."</td>";
		echo "<td>".$res['first_name']."</td>";
		echo "<td>".$res['last_name']."</td>";
		echo "<td>".$res['teacher_number']."</td>";
		echo "<td>".$res['email']."</td>";	
		echo "<td>".$res['class_list']."</td>";
		echo "<td><a href=\"edit_teacher_table.php?id_teacher=$res[id_teacher]\">Edit</a> | <a href=\"delete_teacher_table.php?id_teacher=$res[id_teacher]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>	<br><br>



	<a href="add_class_table.html">Add New Class Data</a><br/><br/>
	<strong>Class Table</strong>
	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>ID</td>
		<td>Subject Code</td>
		<td>Subject Name</td>
		<td>Day in week</td>
		<td>Start Time</td>
		<td>End Time</td>
		<td>Room</td>
		<td>Update</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result3)) { 		
		echo "<tr>";
		echo "<td>".$res['id_class']."</td>";
		echo "<td>".$res['subject_code']."</td>";
		echo "<td>".$res['subject_name']."</td>";
		echo "<td>".$res['day_in_week']."</td>";
		echo "<td>".$res['start_time']."</td>";
		echo "<td>".$res['end_time']."</td>";
		echo "<td>".$res['room']."</td>";
	
		echo "<td><a href=\"edit_class_table.php?id_class=$res[id_class]\">Edit</a> | <a href=\"delete_class_table.php?id_class=$res[id_class]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
    
	</table>	<br><br>


	<a href="add_login_table.html">Add New Login Data</a><br/><br/>
	<strong>Login Table</strong>
	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>ID</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Email</td>
		<td>Username</td>
		<td>Userlevel</td>
		<td>Update</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result4)) { 		
		echo "<tr>";
		echo "<td>".$res['id_login']."</td>";
		echo "<td>".$res['fname']."</td>";
		echo "<td>".$res['lname']."</td>";
		echo "<td>".$res['email']."</td>";
		echo "<td>".$res['username']."</td>";
		echo "<td>".$res['userlevel']."</td>";
	
		echo "<td><a href=\"edit_login_table.php?id_login=$res[id_login]\">Edit</a> | <a href=\"delete_login_table.php?id_login=$res[id_login]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
    
	</table>	<br><br>


	<a href="add_attendance_table.html">Add New Attendance Data</a><br/><br/>
	<strong>Attendance Table</strong>
	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>ID</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Student Number</td>
		<td>Class Number</td>
		<td>Clock In</td>
		<td>Update</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result5)) { 		
		echo "<tr>";
		echo "<td>".$res['id_atd']."</td>";
		echo "<td>".$res['first_name']."</td>";
		echo "<td>".$res['last_name']."</td>";
		echo "<td>".$res['student_number']."</td>";
		echo "<td>".$res['class_number']."</td>";
		echo "<td>".$res['clock_in']."</td>";
	
		echo "<td><a href=\"edit_attendance_table.php?id_atd=$res[id_atd]\">Edit</a> | <a href=\"delete_attendance_table.php?id_atd=$res[id_atd]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
    
	</table>	<br><br>

</div>


<div class="footer">
<!--
  <h2>Footer</h2>
-->
</div>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>
