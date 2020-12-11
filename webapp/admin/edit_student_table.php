<?php
// including the database connection file
include_once("../config.php");

if(isset($_POST['update']))
{	

	$id_stu = mysqli_real_escape_string($link, $_POST['id_stu']);	
	$first_name = mysqli_real_escape_string($link, $_POST['first_name']);
	$last_name = mysqli_real_escape_string($link, $_POST['last_name']);
	$student_number = mysqli_real_escape_string($link, $_POST['student_number']);
	$email = mysqli_real_escape_string($link, $_POST['email']);	
	$rfid_uid = mysqli_real_escape_string($link, $_POST['rfid_uid']);	
	$class_list = mysqli_real_escape_string($link, $_POST['class_list']);	
	$created = mysqli_real_escape_string($link, $_POST['created']);	


	// checking empty fields
	if(empty($first_name) || empty($last_name) || empty($student_number) || empty($email) || empty($rfid_uid)
		|| empty($class_list) || empty($created)) {	
			
		if(empty($first_name)) {
			echo "<font color='red'>First Name field is empty.</font><br/>";
		}
		
		if(empty($last_name)) {
			echo "<font color='red'>Last Name field is empty.</font><br/>";
		}
		
		if(empty($student_number)) {
			echo "<font color='red'>student number field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		if(empty($rfid_uid)) {
			echo "<font color='red'>RFID UID field is empty.</font><br/>";
		}
		
		if(empty($class_list)) {
			echo "<font color='red'>Class List field is empty.</font><br/>";
		}	
		
		if(empty($created)) {
			echo "<font color='red'>Created field is empty.</font><br/>";
		}	
		
	} else {	
		//updating the table
		$result = mysqli_query($link, "UPDATE student_table SET first_name='$first_name', last_name='$last_name',
		student_number='$student_number',email='$email', rfid_uid='$rfid_uid', class_list='$class_list', created='$created' WHERE id_stu=$id_stu");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location:admin.php");
	}
}
?>
<?php
//getting id from url
$id_stu = $_GET['id_stu'];

//selecting data associated with this particular id
$result = mysqli_query($link, "SELECT * FROM student_table WHERE id_stu=$id_stu");

while($res = mysqli_fetch_array($result))
{
	$first_name = $res['first_name'];
	$last_name = $res['last_name'];
	$student_number = $res['student_number'];
	$email = $res['email'];
	$rfid_uid = $res['rfid_uid'];
	$class_list = $res['class_list'];
	$created = $res['created'];

}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="admin.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit_student_table.php">
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
				<td>Student Number</td>
				<td><input type="text" name="student_number" value="<?php echo $student_number;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr> 
				<td>RFID UID</td>
				<td><input type="text" name="rfid_uid" value="<?php echo $rfid_uid;?>"></td>
			</tr>
			<tr> 
				<td>Class List</td>
				<td><input type="text" name="class_list" value="<?php echo $class_list;?>"></td>
			</tr>
			<tr> 
				<td>Created</td>
				<td><input type="text" name="created" value="<?php echo $created;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id_stu" value=<?php echo $_GET['id_stu'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
