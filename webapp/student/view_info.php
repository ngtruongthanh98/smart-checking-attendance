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

$id_stu = $_SESSION['id'];

//fetching data in descending order (lastest entry first)
$result = mysqli_query($link, "SELECT * FROM student_table WHERE id_stu='$id_stu'"); // using mysqli_query instead
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
  <a href="student.php">Home</a>
  <a href="view_class.php">View Class</a>
  <a href="view_info.php">Student Data</a>
  <a href="view_attendance.php">Attendance Data</a>
  <a href="../logout.php" class="right">Logout</a>
  <a class="right">Welcome <?php echo $_SESSION['mysesi'] ?></a>
</div>

<!-- <td>ID</td>
<td>First Name</td>
<td>Last Name</td>
<td>Student Number</td>
<td>Email</td>
<td>RFID UID</td>
<td>Class List</td>
<td>Created</td> -->


<div class="container">

<h3 class="text-center">Info Table</h3><br />  
	<div class="table-responsive" id="info_table">  
		<table class="table table-bordered">  
			<tr>  
				<th><a class="column_sort" id="id_stu" data-order="desc" href="#">ID</a></th>  
				<th><a class="column_sort" id="first_name" data-order="desc" href="#">First Name</a></th>  
				<th><a class="column_sort" id="last_name" data-order="desc" href="#">Last Name</a></th>  
				<th><a class="column_sort" id="student_number" data-order="desc" href="#">Student Number</a></th>  
				<th><a class="column_sort" id="email" data-order="desc" href="#">Email</a></th>
				<th><a class="column_sort" id="rfid_uid" data-order="desc" href="#">RFID_UID</a></th> 
				<th><a class="column_sort" id="class_list" data-order="desc" href="#">Class List</a></th> 
				<th><a class="column_sort" id="created" data-order="desc" href="#">Created</a></th>  
			</tr>  
			<?php  
			while($row = mysqli_fetch_array($result))  
			{  
			?>  
			<tr>  
				<td><?php echo $row["id_stu"]; ?></td>  
				<td><?php echo $row["first_name"]; ?></td>  
				<td><?php echo $row["last_name"]; ?></td>  
				<td><?php echo $row["student_number"]; ?></td>  
				<td><?php echo $row["email"]; ?></td>  
				<td><?php echo $row["rfid_uid"]; ?></td>  
				<td><?php echo $row["class_list"]; ?></td>  
				<td><?php echo $row["created"]; ?></td>
			</tr>  
			<?php  
			}  
			?>
		</table>
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
