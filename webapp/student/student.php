<?php
session_start();

if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='student')
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
$result2 = mysqli_query($link, "SELECT * FROM class_table ORDER BY id_class"); // using mysqli_query instead

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
  <a href="student.php">Home</a>
  <a href="#">Link</a>
  <a href="#">Link</a>
  <a href="../logout.php" class="right">Logout</a>
  <a class="right">Welcome <?php echo $_SESSION['mysesi'] ?></a>
</div>

<div class="container">
<a href="add_student_table.html">Add New Data</a><br/><br/>

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
	<br>

	<a href="add_class_table.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>ID</td>
		<td>Subject Code</td>
		<td>Subject Name</td>


		<td>Update</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result2)) { 		
		echo "<tr>";
		echo "<td>".$res['id_class']."</td>";
		echo "<td>".$res['subject_code']."</td>";
		echo "<td>".$res['subject_name']."</td>";

	
		echo "<td><a href=\"edit_class_table.php?id_stu=$res[id_class]\">Edit</a> | <a href=\"delete_class_table.php?id_stu=$res[id_class]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
    
</table>


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
