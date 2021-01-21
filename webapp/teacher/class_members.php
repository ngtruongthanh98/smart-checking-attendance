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
// $result7 = mysqli_query($link, "SELECT * FROM student_table WHERE class_list IN('".$array."')");
// $query7 = "SELECT * FROM `student_table` WHERE `class_list` LIKE 8";
// $result7 = mysqli_query($link, $query7);


$result8 = mysqli_query($link, "SELECT *
								FROM   student_table s
								WHERE  NOT EXISTS ( SELECT *
													FROM   attendance_table a
													WHERE  s.student_number= a.student_number)"
						);	
// if ($options = 10) {
//   $query = "SELECT * FROM `student_table` WHERE class_list LIKE '%".$options."%'";
//   $search_result = filterTable($query);
// }
// 	else{
//       $query = "SELECT * FROM `student_table`";
//       $search_result = filterTable($query);
// }
// function filterTable($query){
//   $connect = mysqli_connect("localhost", "root", "", "attendance");
//   $filter_Result = mysqli_query($connect, $query);
//   return $filter_Result;
//   }
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
<h3 class="text-center">Info Student Class </h3><br/>
<a href="chart.php">Go back</a><br/><br/>


<form class="form-horizontal" action= "class_members.php" method = "POST">
<div class = "form-group">
<label> Choose a class </label>
<select name = "course" class = "form-control">
  <option> Select </option>
  <option value = "6"> 6 </option>
  <option value = "8"> 8 </option>
</select>
</div>
<div class = "form-group">
	<input type = "submit" name = "submit" class = "btn btn-primary">
</div>
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
			<tbody>
			<?php
			if (isset($_POST["submit"])) {
				$course = $_POST['course'];
				if($course != ""){
					$query7 = "SELECT * FROM student_table WHERE class_list LIKE '%".$course."%'";
		
					$result7 = mysqli_query($link, $query7);
					$row7 = mysqli_num_rows($result7);
					echo "Total student: ", $row7;
			if (mysqli_num_rows($result7)>0){
				while ($row = mysqli_fetch_assoc($result7)){
					$id = $row['id_stu'];
					$first_name = $row['first_name'];
					$last_name = $row['last_name'];
					$student_number = $row['student_number'];
					$email = $row['email'];
					$rfid_uid = $row['rfid_uid'];
					$class_list = $row['class_list'];
					$created = $row['created'];
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
		}else{
			?>
			<tr>
				<td> NO STUDENT IN CLASS</td>
			</tr>
			<?php
		}
	}
}
			?>
			</tbody>
		</table>
	</div>
</div>

</div>
<div class="footer">

</div>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="css/bootstrap-select.min.css" rel="stylesheet" />
  <script src="js/bootstrap-select.min.js"></script>
</body>
</html>
