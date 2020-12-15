<?php
session_start();

if (!isset($_SESSION['class_list_ses']) && !isset($_SESSION['mysesi']) && !isset($_SESSION['id'])
   && !isset($_SESSION['class_number']) && !isset($_SESSION['mytype'])=='student'){
  echo "<script>window.location.assign('../login.php')</script>";
}
?>

<?php
//including the database connection file
include_once("../config.php");

$class_list_var = $_SESSION['class_list_ses'];
$array = array_map('intval', explode(',', $class_list_var));
$array = implode("','",$array);

$result6 = mysqli_query($link, "SELECT * FROM class_table WHERE id_class IN('".$array."')"); // using mysqli_query instead

$class_number = $_SESSION['class_number'];

echo $_SESSION['class_number'];
// $class_number = 8;


//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated

$result5 = mysqli_query($link, "SELECT * FROM attendance_table WHERE class_number='$class_number'"); // using mysqli_query instead

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
  <a href="view_class.php">View Class</a>
  <a href="view_info.php">Student Data</a>
  <a href="view_attendance.php">Attendance Data</a>
  <a href="../logout.php" class="right">Logout</a>
  <a class="right">Welcome <?php echo $_SESSION['mysesi'] ?></a>
</div>

<div class="container">

<h1>Attendance</h1>

<strong>Attendance Table</strong>
<table width='80%' border=0>

<tr bgcolor='#CCCCCC'>
  <td>ID</td>
  <td>First Name</td>
  <td>Last Name</td>
  <td>Student Number</td>
  <td>Class Number</td>
  <td>Clock In</td>
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
}
?>
  
</table>	<br><br>

</div>



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
