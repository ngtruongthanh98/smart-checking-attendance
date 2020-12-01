<?php
require('registerActivity.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP Registration Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
      
      <h2>Register</h2>
      <p>Pill this form to create an account.</p>
    
    <!--====registration form====-->
      <p class="text-success text-center"><?php echo $register; ?></p>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <!--//first name//-->
        <div class="form-group">
           <label for="first_name">First Name</label>
           <input type="text" class="form-control" placeholder="Enter First Name" name="first_name" value="<?php echo $set_firstName;?>">
           <p class="err-msg">
           <?php if($fnameErr!=1){ echo $fnameErr; }?>
           </p>
        </div>
        
        <!--//Last name//-->
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" placeholder="Enter Last Name" name="last_name" value="<?php echo $set_lastName;?>">
            <p class="err-msg"> 
              <?php if($lnameErr!=1){ echo $lnameErr; } ?>
            </p>
        </div>
        
        <!--// Username//-->
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" value="<?php echo $set_username;?>">
            <p class="err-msg">
            <?php if($usernameErr!=1){ echo $usernameErr; } ?>
            </p>
        </div>
        
        <!--// Username//-->
<!--
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" value="<?php echo $set_username;?>">
            <p class="err-msg">
            <?php if($usernameErr!=1){ echo $usernameErr; } ?>
            </p>
        </div>
-->
        
        <!--//Password//-->
        <div class="form-group">
            <label for="pwd">Password</label>
            <input type="password" class="form-control"  placeholder="Enter password" name="password">
            <p class="err-msg">
            <?php if($passErr!=1){ echo $passErr; } ?>
            </p>
        </div>
        
        <!--//Confirm Password//-->
        <div class="form-group">
            <label for="pwd">Confirm Password</label>
            <input type="password" class="form-control" placeholder="Enter Confirm password" name="cpassword">
            <p class="err-msg">
            <?php if($cpassErr!=1){ echo $cpassErr; } ?>
            </p>
        </div>
    
        <div class="form-group">
          <button type="submit" class="btn btn-primary" name="submit">Register</button>
          <button type="submit" name="reset" id="reset" class="btn btn-default">Reset</button>
        </div>
        
        <p>You already have an account? <a href="login.php">Sign in now</a>.</p>
      </form>
  </div>
</body>
</html>
