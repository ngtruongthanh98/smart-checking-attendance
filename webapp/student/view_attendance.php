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
$first_name = $_SESSION['mysesi'];

// echo $_SESSION['class_number'];
// $class_number = 8;


//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated

$result5 = mysqli_query($link, "SELECT * FROM attendance_table WHERE class_number='$class_number' AND first_name='$first_name'"); // using mysqli_query instead

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

<h3 class="text-center">Attendance Table</h3><br/> 
	<div class="table-responsive" id="attendance_table">  
		<table class="table table-bordered">  
			<tr>  
				<th><a class="column_sort" id="id" data-order="desc" href="#">ID</a></th>  
				<th><a class="column_sort" id="first_name" data-order="desc" href="#">First Name</a></th>  
				<th><a class="column_sort" id="last_name" data-order="desc" href="#">Last Name</a></th>  
				<th><a class="column_sort" id="student_number" data-order="desc" href="#">Student Number</a></th>  
				<th><a class="column_sort" id="class_number" data-order="desc" href="#">Class Number</a></th>  
				<th><a class="column_sort" id="clock_in" data-order="desc" href="#">Clock In</a></th>  
			</tr>  
			<?php  
			while($row = mysqli_fetch_array($result5))  
			{  
			?>  
			<tr>  
				<td><?php echo $row["id_atd"]; ?></td>  
				<td><?php echo $row["first_name"]; ?></td>  
				<td><?php echo $row["last_name"]; ?></td>  
				<td><?php echo $row["student_number"]; ?></td>  
				<td><?php echo $row["class_number"]; ?></td>  
				<td><?php echo $row["clock_in"]; ?></td> 
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
			url:"sort_attendance.php",  
			method:"POST",  
			data:{column_name:column_name, order:order},  
			success:function(data)  
			{  
					$('#attendance_table').html(data);  
					$('#'+column_name+'').append(arrow);  
			}  
		})  
	});  
});  
</script> 