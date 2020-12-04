<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Password</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
  <div class="container">
    <div class="wrapper">
       <h2>New Password</h2>
       
       <form role="form" method="post">
			<?php

			$email = $_POST["email"];
			$reset_token = $_POST["reset_token"];
			$new_password = md5($_POST["new_password"]);
			$cnew_password = md5($_POST["cnew_password"]);

			$connection = mysqli_connect("localhost", "admin", "password", "attendance");

			$sql = "SELECT * FROM login_table WHERE email = '$email'";
			$result = mysqli_query($connection, $sql);
			if (mysqli_num_rows($result) > 0)
			{
				$user = mysqli_fetch_object($result);
				if ($user->reset_token == $reset_token)
				{
					if($new_password != $cnew_password)
					{
						echo "Confirm password does not match.";
					
					}
					
					else
					{
						$sql = "UPDATE login_table SET reset_token='', password='$new_password' WHERE email='$email'";
						mysqli_query($connection, $sql);

						echo "Password has been changed";
					}
					
				}
				else
				{
					echo "Recovery email has been expired";
				}
			}
			else
			{
				echo "Email does not exists";
			}
			?>

       </form>
    </div>  

</div>  

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>


<?php

$email = $_POST["email"];
$reset_token = $_POST["reset_token"];
$new_password = md5($_POST["new_password"]);
$cnew_password = md5($_POST["cnew_password"]);

$connection = mysqli_connect("localhost", "admin", "password", "attendance");

$sql = "SELECT * FROM login_table WHERE email = '$email'";
$result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0)
{
	$user = mysqli_fetch_object($result);
	if ($user->reset_token == $reset_token)
	{
		if($new_password != $cnew_password)
		{
			echo "Confirm password does not match.";
		
		}
		
		else
		{
			$sql = "UPDATE login_table SET reset_token='', password='$new_password' WHERE email='$email'";
			mysqli_query($connection, $sql);

			echo "Password has been changed";
		}
		
	}
	else
	{
		echo "Recovery email has been expired";
	}
}
else
{
	echo "Email does not exists";
}
?>
