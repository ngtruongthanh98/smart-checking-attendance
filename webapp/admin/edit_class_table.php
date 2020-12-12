<?php
// including the database connection file
include_once("../config.php");

if(isset($_POST['update']))
{	

	$id_class = mysqli_real_escape_string($link, $_POST['id_class']);	
	$subject_code = mysqli_real_escape_string($link, $_POST['subject_code']);
	$subject_name = mysqli_real_escape_string($link, $_POST['subject_name']);
	$day_in_week = mysqli_real_escape_string($link, $_POST['day_in_week']);
	$start_time = mysqli_real_escape_string($link, $_POST['start_time']);	
	$end_time = mysqli_real_escape_string($link, $_POST['end_time']);	
	$room = mysqli_real_escape_string($link, $_POST['room']);	

	// checking empty fields
	if(empty($subject_code) || empty($subject_name) || empty($day_in_week) || empty($start_time) || empty($end_time)
		|| empty($room)) {	
			
		if(empty($subject_code)) {
			echo "<font color='red'>Subject Code field is empty.</font><br/>";
		}
		
		if(empty($subject_name)) {
			echo "<font color='red'>Subject Name field is empty.</font><br/>";
		}
		
		if(empty($day_in_week)) {
			echo "<font color='red'>Day in Week field is empty.</font><br/>";
		}
		
		if(empty($start_time)) {
			echo "<font color='red'>Start Time field is empty.</font><br/>";
		}
		
		if(empty($end_time)) {
			echo "<font color='red'>End Time field is empty.</font><br/>";
		}
		
		if(empty($room)) {
			echo "<font color='red'>Room field is empty.</font><br/>";
		}	
		
		
	} else {	
		//updating the table
		$result = mysqli_query($link, "UPDATE class_table SET subject_code='$subject_code', subject_name='$subject_name',
		day_in_week='$day_in_week',start_time='$start_time', end_time='$end_time', room='$room' WHERE id_class=$id_class");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location:admin.php");
	}
}
?>
<?php
//getting id from url
$id_class = $_GET['id_class'];

//selecting data associated with this particular id
$result = mysqli_query($link, "SELECT * FROM class_table WHERE id_class=$id_class");

while($res = mysqli_fetch_array($result))
{
	$subject_code = $res['subject_code'];
	$subject_name = $res['subject_name'];
	$day_in_week = $res['day_in_week'];
	$start_time = $res['start_time'];
	$end_time = $res['end_time'];
	$room = $res['room'];
}
?>
<html>
<head>	
	<title>Edit Class Data</title>
</head>

<body>
	<a href="admin.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit_class_table.php">
		<table border="0">
			<tr> 
				<td>Subject Code</td>
				<td><input type="text" name="subject_code" value="<?php echo $subject_code;?>"></td>
			</tr>
			<tr> 
				<td>Subject Name</td>
				<td><input type="text" name="subject_name" value="<?php echo $subject_name;?>"></td>
			</tr>
			<tr> 
				<td>Day in Week</td>
				<td><input type="text" name="day_in_week" value="<?php echo $day_in_week;?>"></td>
			</tr>
			<tr> 
				<td>Start Time</td>
				<td><input type="text" name="start_time" value="<?php echo $start_time;?>"></td>
			</tr>
			<tr> 
				<td>End Time</td>
				<td><input type="text" name="end_time" value="<?php echo $end_time;?>"></td>
			</tr>
			<tr> 
				<td>Room</td>
				<td><input type="text" name="room" value="<?php echo $room;?>"></td>
			</tr>

			<tr>
				<td><input type="hidden" name="id_class" value=<?php echo $_GET['id_class'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
