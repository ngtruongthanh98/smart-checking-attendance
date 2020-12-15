<?php
session_start();

if (!isset($_SESSION['class_list_ses']) && !isset($_SESSION['mysesi']) && !isset($_SESSION['id'])
   && !isset($_SESSION['class_number']) && !isset($_SESSION['mytype'])=='teacher'){
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

<strong>Class Table </strong> 
<table width='80%' border=0>

<tr bgcolor='#CCCCCC'>
    <td>ID</td>
    <td>Subject Code</td>
    <td>Subject Name</td>
    <td>Day in week</td>
    <td>Start Time</td>
    <td>End Time</td>
    <td>Room</td>
</tr>

<?php 

    $class_list_var = $_SESSION['class_list_ses'];
    $array = array_map('intval', explode(',', $class_list_var));
    $array = implode("','",$array);

    $result6 = mysqli_query($link, "SELECT * FROM class_table WHERE id_class IN('".$array."')"); // using mysqli_query instead

    while($res6 = mysqli_fetch_array($result6)) { 		
        echo "<tr>";
        echo "<td>".$res6['id_class']."</td>";
        echo "<td>".$res6['subject_code']."</td>";
        echo "<td>".$res6['subject_name']."</td>";
        echo "<td>".$res6['day_in_week']."</td>";
        echo "<td>".$res6['start_time']."</td>";
        echo "<td>".$res6['end_time']."</td>";
        echo "<td>".$res6['room']."</td>";
        echo "</tr>";
    }



?>



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
