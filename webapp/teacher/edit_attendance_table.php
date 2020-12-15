<?php
// including the database connection file
include_once("../config.php");

if(isset($_POST['update']))
{	

	$id_atd = mysqli_real_escape_string($link, $_POST['id_atd']);	
	$first_name = mysqli_real_escape_string($link, $_POST['first_name']);
	$last_name = mysqli_real_escape_string($link, $_POST['last_name']);
	$student_number = mysqli_real_escape_string($link, $_POST['student_number']);	
    $class_number = mysqli_real_escape_string($link, $_POST['class_number']);	
	$clock_in = mysqli_real_escape_string($link, $_POST['clock_in']);	


	// checking empty fields
	if(empty($first_name) || empty($last_name) || empty($student_number) || empty($class_number) || empty($clock_in)) {	
			
		if(empty($first_name)) {
			echo "<font color='red'>First Name field is empty.</font><br/>";
		}
		
		if(empty($last_name)) {
			echo "<font color='red'>Last Name field is empty.</font><br/>";
		}
		
		if(empty($student_number)) {
			echo "<font color='red'>Student Number field is empty.</font><br/>";
		}
		
		if(empty($class_number)) {
			echo "<font color='red'>Class Number field is empty.</font><br/>";
        }

		if(empty($clock_in)) {
			echo "<font color='red'>Clock In field is empty.</font><br/>";
		}
		
	} else {	
		//updating the table
		$result = mysqli_query($link, "UPDATE attendance_table SET first_name='$first_name', last_name='$last_name'
        ,student_number='$student_number', class_number='$class_number', clock_in='$clock_in' WHERE id_atd=$id_atd");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location:view_attendance.php");
	}
}
?>
<?php
//getting id from url
$id_atd = $_GET['id_atd'];

//selecting data associated with this particular id
$result = mysqli_query($link, "SELECT * FROM attendance_table WHERE id_atd=$id_atd");

while($res = mysqli_fetch_array($result))
{
	$first_name = $res['first_name'];
	$last_name = $res['last_name'];
	$student_number = $res['student_number'];
    $class_number = $res['class_number'];
	$clock_in = $res['clock_in'];
}
?>
<html>
<head>	
	<title>Edit Login Data</title>
</head>

<body>
	<a href="view_attendance.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit_attendance_table.php">
		<table border="0">
			<tr> 
				<td>First Name</td>
				<td><input type="text" name="first_name" value="<?php echo $first_name;?>"></td>
			</tr>
			<tr> 
				<td>Last Name</td>
				<td><input type="text" name="last_name" value="<?php echo $last_name;?>"></td>
			</tr>
			<tr> 
				<td>student_number</td>
				<td><input type="text" name="student_number" value="<?php echo $student_number;?>"></td>
			</tr>
			<tr> 
				<td>Class Number</td>
				<td><input type="text" name="class_number" value="<?php echo $class_number;?>"></td>
            </tr>
			<tr> 
				<td>Clock In</td>
				<td><input type="datetime-local" name="clock_in" value="<?php echo $clock_in;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id_atd" value=<?php echo $_GET['id_atd'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
