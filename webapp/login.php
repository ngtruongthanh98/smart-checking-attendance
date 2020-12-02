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
       <h2>Login</h2>
       <p>Please fill in your credentials to login.</p>
       
       <form role="form" method="post">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username">
        <p class="err-msg">
          <?php if($usernameErr!=1){ echo $usernameErr; } ?>
        </p>
      </div>
      
      <div class="form-group">    
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password">
        <p class="err-msg">
            <?php if($passErr!=1){ echo $passErr; } ?>
        </p>
      </div>
         
      <div class="form-group">
        <button type="submit" name="login" class="btn btn-primary">Login</button>
      </div>
         
         <p class="text-center">Don't have an account? <a href="register.php">Sign up now</a>.</p>
         
         <div style="font-size: 1em; text-align: center;">
            <a href="forgot_password.php">Forgot Your Password?</a>
         </div>

        </form>
    </div>  

</div>  

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
