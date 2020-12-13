<?php
// including the database connection file
include_once("../config.php");

if(isset($_POST['update']))
{	

	$id_login = mysqli_real_escape_string($link, $_POST['id_login']);	
	$fname = mysqli_real_escape_string($link, $_POST['fname']);
	$lname = mysqli_real_escape_string($link, $_POST['lname']);
	$email = mysqli_real_escape_string($link, $_POST['email']);
	$username = mysqli_real_escape_string($link, $_POST['username']);	
	$userlevel = mysqli_real_escape_string($link, $_POST['userlevel']);	

	// checking empty fields
	if(empty($fname) || empty($lname) || empty($email) || empty($username) || empty($userlevel)) {	
			
		if(empty($fname)) {
			echo "<font color='red'>First Name field is empty.</font><br/>";
		}
		
		if(empty($lname)) {
			echo "<font color='red'>Last Name field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		if(empty($username)) {
			echo "<font color='red'>Username field is empty.</font><br/>";
		}
		
		if(empty($userlevel)) {
			echo "<font color='red'>Userlevel field is empty.</font><br/>";
		}
		
	} else {	
		//updating the table
		$result = mysqli_query($link, "UPDATE login_table SET fname='$fname', lname='$lname',
		email='$email',username='$username', userlevel='$userlevel' WHERE id_login=$id_login");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location:crud_login.php");
	}
}
?>
<?php
//getting id from url
$id_login = $_GET['id_login'];

//selecting data associated with this particular id
$result = mysqli_query($link, "SELECT * FROM login_table WHERE id_login=$id_login");

while($res = mysqli_fetch_array($result))
{
	$fname = $res['fname'];
	$lname = $res['lname'];
	$email = $res['email'];
	$username = $res['username'];
	$userlevel = $res['userlevel'];
}
?>
<html>
<head>	
	<title>Edit Login Data</title>
</head>

<body>
	<a href="admin.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit_login_table.php">
		<table border="0">
			<tr> 
				<td>First Name</td>
				<td><input type="text" name="fname" value="<?php echo $fname;?>"></td>
			</tr>
			<tr> 
				<td>Last Name</td>
				<td><input type="text" name="lname" value="<?php echo $lname;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="email" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr> 
				<td>Username</td>
				<td><input type="text" name="username" value="<?php echo $username;?>"></td>
			</tr>
			<tr> 
				<td>Userlevel</td>
				<td><input type="text" name="userlevel" value="<?php echo $userlevel;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id_login" value=<?php echo $_GET['id_login'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
