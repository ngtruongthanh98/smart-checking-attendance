<html>
<head>
	<title>Add Login Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("../config.php");

if(isset($_POST['Submit_login'])) {	
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
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($link, "INSERT INTO login_table(fname,lname,email,username, userlevel) VALUES('$fname' ,'$lname','$email' ,
		'$username','$userlevel')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='admin.php'>View Result</a>";
	}
}
?>
</body>
</html>
