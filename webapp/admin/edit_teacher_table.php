<?php
// including the database connection file
include_once("../config.php");

if(isset($_POST['update']))
{	

	$id_teacher = mysqli_real_escape_string($link, $_POST['id_teacher']);	
	$first_name = mysqli_real_escape_string($link, $_POST['first_name']);
	$last_name = mysqli_real_escape_string($link, $_POST['last_name']);
	$teacher_number = mysqli_real_escape_string($link, $_POST['teacher_number']);
	$email = mysqli_real_escape_string($link, $_POST['email']);	
	$class_list = mysqli_real_escape_string($link, $_POST['class_list']);	


	// checking empty fields
	if(empty($first_name) || empty($last_name) || empty($teacher_number) || empty($email) || empty($class_list)) {	
			
		if(empty($first_name)) {
			echo "<font color='red'>First Name field is empty.</font><br/>";
		}
		
		if(empty($last_name)) {
			echo "<font color='red'>Last Name field is empty.</font><br/>";
		}
		
		if(empty($teacher_number)) {
			echo "<font color='red'>Teacher number field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		if(empty($class_list)) {
			echo "<font color='red'>Class List field is empty.</font><br/>";
		}	
		
	} else {	
		//updating the table
		$result = mysqli_query($link, "UPDATE teacher_table SET first_name='$first_name', last_name='$last_name',
		teacher_number='$teacher_number',email='$email', class_list='$class_list' WHERE id_teacher=$id_teacher");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location:admin.php");
	}
}
?>
<?php
//getting id from url
$id_teacher = $_GET['id_teacher'];

//selecting data associated with this particular id
$result = mysqli_query($link, "SELECT * FROM teacher_table WHERE id_teacher=$id_teacher");

while($res = mysqli_fetch_array($result))
{
	$first_name = $res['first_name'];
	$last_name = $res['last_name'];
	$teacher_number = $res['teacher_number'];
	$email = $res['email'];
	$class_list = $res['class_list'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="admin.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit_teacher_table.php">
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
				<td>Teacher Number</td>
				<td><input type="text" name="teacher_number" value="<?php echo $teacher_number;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="email" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr> 
				<td>Class List</td>
				<td><input type="text" name="class_list" value="<?php echo $class_list;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id_teacher" value=<?php echo $_GET['id_teacher'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
