<?php
session_start();

if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='admin')
{
  echo "<script>window.location.assign('../login.php')</script>";
}
?>

<?php
//including the database connection file
include_once("../config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($link, "SELECT * FROM student_table ORDER BY id_stu"); // using mysqli_query instead
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
  <a href="admin.php">Home</a>
  <a href="crud_student.php">Student Data</a>
  <a href="crud_teacher.php">Teacher Data</a>
  <a href="crud_class.php">Class Data</a>
  <a href="crud_login.php">Login Data</a>
  <a href="crud_attendance.php">Attendance Data</a>
  <a href="../logout.php" class="right">Logout</a>
  <a class="right">Welcome <?php echo $_SESSION['mysesi'] ?></a>
</div>

<div class="container">
<h3 class="text-center">Student Table</h3><br/> 

	<a href="add_student_table.html">Add New Student Data</a><br/><br/>
	<div class="table-responsive" id="student_table">  
		<table class="table table-bordered">  
			<tr>  
				<th><a class="column_sort" id="id" data-order="desc" href="#">ID</a></th>  
				<th><a class="column_sort" id="first_name" data-order="desc" href="#">First Name</a></th>  
				<th><a class="column_sort" id="last_name" data-order="desc" href="#">Last Name</a></th>  
				<th><a class="column_sort" id="student_number" data-order="desc" href="#">Student Number</a></th>  
				<th><a class="column_sort" id="email" data-order="desc" href="#">Email</a></th>  
				<th><a class="column_sort" id="rfid_uid" data-order="desc" href="#">RFID UID</a></th>  
				<th><a class="column_sort" id="class_list" data-order="desc" href="#">Class List</a></th>  
				<th><a class="column_sort" id="created" data-order="desc" href="#">Created</a></th>
				<th><a class="column_sort" id="update"  href="#">Update</a></th>  
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
				<td><a href="edit_student_table.php?id_stu=<?php echo $row["id_stu"];?>">Edit</a> | <a href="delete_student_table.php?id_stu=<?php echo $row["id_stu"];?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a></td>

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
			url:"sort_student.php",  
			method:"POST",  
			data:{column_name:column_name, order:order},  
			success:function(data)  
			{  
					$('#student_table').html(data);  
					$('#'+column_name+'').append(arrow);  
			}  
		})  
	});  
});  
</script> 
