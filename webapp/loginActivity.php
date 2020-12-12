<?php
require_once('database.php'); 
$db= $conn; // update with your database connection
// by default, error messages are empty
$register=$valid=$usernameErr=$passErr='';
 // by default,set input values are empty
 $set_username='';
extract($_POST);

if(isset($_POST['login']))
{
  
	//Username Validation
	if(empty($username)){
	  $usernameErr="Username is Required"; 
	}
	else{
	  $usernameErr=true;
	}

	// password validation 
	if(empty($password)){
	  $passErr="Password is Required"; 
	} 
	else{
	   $passErr=true;
	}

	// check all fields are valid or not
	if($usernameErr==1 && $passErr==1)
	{
		$username=$_POST['username'];
		$password=md5($_POST['password']);
		
		$mysqli = new mysqli("localhost", "admin", "password", "attendance");
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: " . $mysqli->connect_error;
		}
		
		$res = $mysqli->query("SELECT * FROM login_table where username='$username' and password='$password'");
		$row = $res->fetch_assoc();
		$fname = $row['fname'];
		$user = $row['username'];
		$pass = $row['password'];
		$type = $row['userlevel'];
		 
		if($user==$username && $pass=$password){
			session_start();
			if($type=="admin"){
				$_SESSION['mysesi']=$fname;
				$_SESSION['mytype']=$type;
				echo "<script>window.location.assign('admin/admin.php')</script>";
			} 
			else if($type=="teacher"){
				$_SESSION['mysesi']=$fname;
			    $_SESSION['mytype']=$type;
			    echo "<script>window.location.assign('teacher/teacher.php')</script>";
			}    
		    else if($type=="student"){
		        $_SESSION['mysesi']=$fname;
		        $_SESSION['mytype']=$type;
		        echo "<script>window.location.assign('student/student.php')</script>";
		    } 
	      }
	    else{
			echo "This username or password not same with database.";
		}
	   

	}
	else{
		echo "This username or password not same with database.";
	}
}
?>
