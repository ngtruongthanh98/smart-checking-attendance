<?php
session_start();

if (!isset($_SESSION['class_list_ses']) && !isset($_SESSION['mysesi']) && !isset($_SESSION['id'])

&& !isset($_SESSION['mytype'])=='teacher')
{
  echo "<script>window.location.assign('../login.php')</script>";
}
?>

<?php
//including the database connection file
include_once("../config.php");

$id_teacher = $_SESSION['id'];

//fetching data in descending order (lastest entry first)
$result = mysqli_query($link, "SELECT * FROM student_table ORDER BY id_stu"); // using mysqli_query instead
$result2 = mysqli_query($link, "SELECT * FROM teacher_table WHERE id_teacher='$id_teacher'"); // using mysqli_query instead
$result3 = mysqli_query($link, "SELECT * FROM class_table ORDER BY id_class"); // using mysqli_query instead
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
  <a href="teacher.php">Home</a>
  <a href="view_class.php">View Class</a>
  <a href="view_info.php">Teacher Data</a>
  <a href="view_attendance.php">Attendance Data</a>
  <a href="../logout.php" class="right">Logout</a>
  <a class="right">Welcome <?php echo $_SESSION['mysesi'] ?></a>
</div>

<div class="container">

<h1>View Info</h1>

<br>

	<strong>Teacher Table</strong>
	<table width='80%' border=0>
	<tr bgcolor='#CCCCCC'>
		<td>ID</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Teacher Number</td>
		<td>Email</td>
		<td>Class List</td>
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
