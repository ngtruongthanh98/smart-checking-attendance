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

// $class_list_var = $_SESSION['class_list_ses'];
// $array = array_map('intval', explode(',', $class_list_var));
// $array = implode("','",$array);
// $result7 = mysqli_query($link, "SELECT * FROM student_table WHERE class_list IN('".$array."') ");

?>

<?php
if (isset($_POST["search"])) {
	  $valueToSearch= $_POST['valueToSearch'];
	  $course = $_POST['course'];
  	$query = "SELECT * FROM `attendance_table` WHERE CONCAT(`id_atd`, `first_name`, `last_name`, `student_number`, `class_number`, `clock_in`) 
  				LIKE '%".$valueToSearch."%' AND class_number LIKE '%".$course."%'";
  	$search_result = filterTable($query);
  //present_student
 	 $result123 = mysqli_query($link, "SELECT COUNT(*) AS `present` FROM `attendance_table` WHERE clock_in LIKE '%".$valueToSearch."%'");
  	$row11 = mysqli_fetch_array($result123);
  	$count123 = $row11['present'];
  //total student
  		$query7 = "SELECT * FROM student_table WHERE class_list LIKE '%".$course."%'";
		$result7 = mysqli_query($link, $query7);
		$row7 = mysqli_num_rows($result7);
  //absent_student
  	$absent = $row7 - $count123;
  //insert data into chart_table
  $query8 = "UPDATE chart_table SET total_student = '$row7', present_student = '$count123',
	absent_student = '$absent', present_date = '$valueToSearch' WHERE present_date = '$valueToSearch'";
	$add12 = mysqli_query($link, $query8);
}
	else{
      $query = "SELECT * FROM `attendance_table`";
      $search_result = filterTable($query);
}

function filterTable($query){
  $connect = mysqli_connect("localhost", "root", "", "attendance");
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

<button class = "btn btn-primary btn-sm"><a href = "show_chart.php" style = "text-decoration: none; color: #fff;"><i class="fas fa-chart-bar"></i> Graphical Results</a></button> <br/><br/>

  <form action="chart.php" method="post">
  	<div class = "form-group">
    	<label> Search </label>
    	<input type ="text" name="valueToSearch" placeholder="Search information">
	</div>
	<div class = "form-group">
		<label> Choose a class </label>
		<select name = "course" >
  		<option> Select </option>
  		<option value = "6"> 6 </option>
  		<option value = "8"> 8 </option>
		</select>
	</div>
	<div class = "form-group">
    	<input type ="submit" name="search" value="filter">
	</div>
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
			<?php  
			if (isset($_POST["search"])) {
				$result8 = mysqli_query($link, "SELECT * FROM   student_table s WHERE  NOT EXISTS ( SELECT * FROM   attendance_table a
							WHERE  s.student_number = a.student_number AND DATE(a.clock_in)='$valueToSearch') AND s.class_list LIKE '%".$course."%'");
			?>
	<h2>Absent students</h2>

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
			while($row = mysqli_fetch_array($result8))  
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
		} else{ echo " ";}  
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
