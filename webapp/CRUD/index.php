<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM student_table ORDER BY id_stu"); // using mysqli_query instead
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>ID</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Student Number</td>
		<td>Email</td>
		<td>RFID UID</td>
		<td>Class List</td>
		<td>Created</td>
		<td>Update</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['id_stu']."</td>";
		echo "<td>".$res['first_name']."</td>";
		echo "<td>".$res['last_name']."</td>";
		echo "<td>".$res['student_number']."</td>";
		echo "<td>".$res['email']."</td>";	
		echo "<td>".$res['rfid_uid']."</td>";
		echo "<td>".$res['class_list']."</td>";
		echo "<td>".$res['created']."</td>";	
		echo "<td><a href=\"edit.php?id_stu=$res[id_stu]\">Edit</a> | <a href=\"delete.php?id_stu=$res[id_stu]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
