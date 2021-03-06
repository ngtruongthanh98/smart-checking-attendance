<?php
require('forgot_passwordActivity.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change Password</title>
    
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
       
       <form role="form" method="post" action="send-recovery-mail.php">

		  <div class="form-group">
		      <label for="email">Email</label>
		      <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" value="<?php echo $set_email;?>">
		      <p class="err-msg">
			  <?php if($emailErr!=1){ echo $emailErr; } ?>
		      </p>
		  </div>
		  
		  <div class="form-group">
			<button type="submit" value="Send recovery email" class="btn btn-primary">Change your password</button>
		  </div>
		  
		  <p class="text-center">You already have an account? <a href="login.php">Sign in now</a>.</p>
 
        </form>
    </div>  

</div>  

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
