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

$class_list_var = $_SESSION['class_list_ses'];
$array = array_map('intval', explode(',', $class_list_var));
$array = implode("','",$array);

$result6 = mysqli_query($link, "SELECT * FROM class_table WHERE id_class IN('".$array."')"); // using mysqli_query instead
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

<h3 class="text-center">Class Table</h3><br />  
	<div class="table-responsive" id="class_table">  
		<table class="table table-bordered">  
			<tr>  
				<th><a class="column_sort" id="id_class" data-order="desc" href="#">ID</a></th>  
				<th><a class="column_sort" id="subject_code" data-order="desc" href="#">Subject Code</a></th>  
				<th><a class="column_sort" id="subject_name" data-order="desc" href="#">Subject Name</a></th>  
				<th><a class="column_sort" id="day_in_week" data-order="desc" href="#">Day in Week</a></th>  
				<th><a class="column_sort" id="start_time" data-order="desc" href="#">Start Time</a></th>  
				<th><a class="column_sort" id="end_time" data-order="desc" href="#">End Time</a></th>  
				<th><a class="column_sort" id="room" data-order="desc" href="#">Room</a></th>  
			</tr>  
			<?php  
			while($row = mysqli_fetch_array($result6))  
			{  
			?>  
			<tr>  
				<td><?php echo $row["id_class"]; ?></td>  
				<td><?php echo $row["subject_code"]; ?></td>  
				<td><?php echo $row["subject_name"]; ?></td>  
				<td><?php echo $row["day_in_week"]; ?></td>  
				<td><?php echo $row["start_time"]; ?></td>  
				<td><?php echo $row["end_time"]; ?></td>  
				<td><?php echo $row["room"]; ?></td>  
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

<script>  
$(document).ready(function(){  
	$(document).on('click', '.column_sort', function(){  
		var column_name = $(this).attr("id");  
		var order = $(this).data("order");  
		var arrow = '';  
		//glyphicon glyphicon-arrow-up  
		//glyphicon glyphicon-arrow-down  
		if(order == 'desc')  
		{  
			arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-down"></span>';  
		}  
		else  
		{  
			arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-up"></span>';  
		}  
		$.ajax({  
			url:"sort_class.php",  
			method:"POST",  
			data:{column_name:column_name, order:order},  
			success:function(data)  
			{  
					$('#class_table').html(data);  
					$('#'+column_name+'').append(arrow);  
			}  
		})  
	});  
});  
</script> 

