<?php
session_start();

if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='admin')
{
  echo "<script>window.location.assign('../login.php')</script>";
}
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
  <a href="crud_report.php">Attendance Report</a>
  <a href="../logout.php" class="right">Logout</a>
  <a class="right">Welcome <?php echo $_SESSION['mysesi'] ?></a>
</div>

<div class="container">
<h3 class="text-center">Attendance Table</h3><br/> 
<a href="add_attendance_table.html">Add New Attendance Data</a><br/><br/>

  <form action="crud_report.php" method="post">
    <label> Search </label>
    <input type ="text" name="valueToSearch" placeholder="Search information">
    <input type ="submit" name="search" value="filter">
  </form> <br><br>

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
