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
$result3 = mysqli_query($link, "SELECT * FROM class_table ORDER BY id_class"); // using mysqli_query instead

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
  <a href="crud_student.php">Student Data</a>
  <a href="crud_teacher.php">Teacher Data</a>
  <a href="crud_class.php">Class Data</a>
  <a href="crud_login.php">Login Data</a>
  <a href="crud_attendance.php">Attendance Data</a>
  <a href="../logout.php" class="right">Logout</a>
  <a class="right">Welcome <?php echo $_SESSION['mysesi'] ?></a>
</div>

<div class="container">

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
