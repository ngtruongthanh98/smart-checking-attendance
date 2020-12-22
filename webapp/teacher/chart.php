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

$result = mysqli_query($link, "SELECT * FROM student_table ORDER BY id_stu"); // using mysqli_query instead
$result2 = mysqli_query($link, "SELECT * FROM teacher_table ORDER BY id_teacher"); // using mysqli_query instead
$result3 = mysqli_query($link, "SELECT * FROM class_table ORDER BY id_class"); // using mysqli_query instead
$result5 = mysqli_query($link, "SELECT * FROM attendance_table ORDER BY id_atd"); // using mysqli_query instead

$class_list_var = $_SESSION['class_list_ses'];
$array = array_map('intval', explode(',', $class_list_var));
$array = implode("','",$array);

$result7 = mysqli_query($link, "SELECT * FROM student_table WHERE class_list IN('".$array."') ");

// $result8 = mysqli_query($link, "SELECT COUNT(id_stu) AS NumberOfStudents FROM student_table WHERE class_list IN('".$array."')");

// SELECT COUNT(ProductID) AS NumberOfProducts FROM Products;

// $result8 = mysqli_query($link, "SELECT COUNT(*) AS `NumberOfStudents` FROM `student_table` WHERE `class_list` IN ('".$array."') OR `class_list`=2 ");
$result8 = mysqli_query($link, "SELECT COUNT(*) AS `NumberOfStudents` FROM `student_table`");
$row8 = mysqli_fetch_array($result8);
$count = $row8['NumberOfStudents'];

$result9 = mysqli_query($link, "SELECT COUNT(*) AS `abc` , clock_in , student_number , class_number FROM `attendance_table` ");
$row9 = mysqli_fetch_array($result9);
$count9 = $row9['abc'];

$result10 = mysqli_query($link, "SELECT COUNT(*) AS `abc` FROM `attendance_table` WHERE DATE(clock_in) = '2020-11-09' ");
$row10 = mysqli_fetch_array($result10);
$count10 = $row10['abc'];

// SELECT *, DATE_FORMAT(clock_in, '%Y-%m-%dT%H:%i') AS custom_date 
// FROM attendance_table 
// WHERE class_number = $class_number
// LMIT 1
?>

<?php
if (isset($_POST["search"])) {
  $valueToSearch= $_POST['valueToSearch'];
  $query = "SELECT * FROM `attendance_table` WHERE CONCAT(`id_atd`, `first_name`, `last_name`, `student_number`, `class_number`, `clock_in`) LIKE '%".$valueToSearch."%'";
  $search_result = filterTable($query);
}
	else{
      $query = "SELECT * FROM `attendance_table`";
      $search_result = filterTable($query);
}
function filterTable($query){
  $connect = mysqli_connect("localhost", "admin", "password", "attendance");
  $filter_Result = mysqli_query($connect, $query);
  return $filter_Result;
  }
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
  <a href="chart.php">Attendance Chart</a>
  <a href="../logout.php" class="right">Logout</a>
  <a class="right">Welcome <?php echo $_SESSION['mysesi'] ?></a>
</div>

<div class="container">
<h3 class="text-center">Attendance Table</h3><br/> 
<a href="add_attendance_table.html">Add New Attendance Data</a><br/><br/>

<a href="class_members.php">View Class Members</a><br/><br/>

<strong>Attendance Report</strong>
  <form action="chart.php" method="post">
    <label> Search </label>
    <input type ="text" name="valueToSearch" placeholder="Search information">
    <input type ="submit" name="search" value="filter">
  </form>
  <br>
  <br>

	<div class="table-responsive" id="attendance_table">  
		<table class="table table-bordered">  
			<tr>  
				<th><a class="column_sort" id="id" data-order="desc" href="#">ID</a></th>  
				<th><a class="column_sort" id="first_name" data-order="desc" href="#">First Name</a></th>  
				<th><a class="column_sort" id="last_name" data-order="desc" href="#">Last Name</a></th>  
				<th><a class="column_sort" id="student_number" data-order="desc" href="#">Student Number</a></th>  
				<th><a class="column_sort" id="class_number" data-order="desc" href="#">Class Number</a></th>  
				<th><a class="column_sort" id="clock_in" data-order="desc" href="#">Clock In</a></th>  
				<th><a class="column_sort" id="update"  href="#">Update</a></th>  
			</tr>  
			<?php  
			while($row = mysqli_fetch_array($search_result))  
			{  
			?>  
			<tr>  
				<td><?php echo $row["id_atd"]; ?></td>  
				<td><?php echo $row["first_name"]; ?></td>  
				<td><?php echo $row["last_name"]; ?></td>  
				<td><?php echo $row["student_number"]; ?></td>  
				<td><?php echo $row["class_number"]; ?></td>  
				<td><?php echo $row["clock_in"]; ?></td>  
				<td><a href="edit_attendance_table.php?id_atd=<?php echo $row["id_atd"];?>">Edit</a> | <a href="delete_attendance_table.php?id_atd=<?php echo $row["id_atd"];?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a></td>
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
