<?php
require('loginActivity.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Session</title>
    
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
       <h2>Change Password</h2>
       
		<?php

		$email = $_GET["email"];
		$reset_token = $_GET["reset_token"];

		$connection = mysqli_connect("localhost", "admin", "password", "attendance");

		$sql = "SELECT * FROM login_table WHERE email = '$email'";
		$result = mysqli_query($connection, $sql);
		
		
		if (mysqli_num_rows($result) > 0)
		{
			$user = mysqli_fetch_object($result);
			if ($user->reset_token == $reset_token)
			{
				?>
				<form method="POST" action="new-password.php">
					<input type="hidden" name="email" value="<?php echo $email; ?>">
					<input type="hidden" name="reset_token" value="<?php echo $reset_token; ?>">
					
					
					<div class="form-group">
						<label for="new_password">New Password</label>
						<input type="password" class="form-control" placeholder="Enter new password" name="new_password">
					</div>
					
					<div class="form-group">
						<label for="cnew_password">Confirm New Password</label>
						<input type="password" class="form-control" placeholder="Enter confirm new password" name="cnew_password">

					</div>
									
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Change password</button>
					</div>
					
				</form>
				<?php
			}
			else
			{
				echo "Recovery email has been expired";
			}
		}
		else
		{
			echo "Email does not exists";
		} ?>
    </div>  

</div>  

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>



}
