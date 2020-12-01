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
  <p>
</p>
  <div class="container">
  
<?php
$username=$_POST['username'];
$password=md5($_POST['password']);

$login=$_POST['login'];
if(isset($login)){
  $mysqli = new mysqli("localhost", "admin", "password", "attendance");
  if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  }
  $res = $mysqli->query("SELECT * FROM login_table where username='$username' and password='$password'");
  $row = $res->fetch_assoc();
  $name = $row['fname'];
  $user = $row['username'];
  $pass = $row['password'];
  $type = $row['userlevel'];
  if($user==$username && $pass=$password){
    session_start();
    if($type=="admin"){
      $_SESSION['mysesi']=$name;
      $_SESSION['mytype']=$type;
      echo "<script>window.location.assign('admin.php')</script>";
    } 
    else if($type=="teacher"){
      $_SESSION['mysesi']=$name;
      $_SESSION['mytype']=$type;
      echo "<script>window.location.assign('teacher.php')</script>";
    }    
    else if($type=="student"){
      $_SESSION['mysesi']=$name;
      $_SESSION['mytype']=$type;
      echo "<script>window.location.assign('index.php')</script>";
    } else{
?>

<?php
    }
  } else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <strong>Warning!</strong> This username or password not same with database.
</div>
<?php
  }
}
?>
  
    <div class="wrapper">
       <h2>Login</h2>
       <p>Please fill in your credentials to login.</p>
       
       <form role="form" method="post">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username">
      </div>
      
      <div class="form-group">    
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>
         
      <div class="form-group">
        <button type="submit" name="login" class="btn btn-primary">Login</button>
        <button type="submit" name="reset" id="reset" class="btn btn-default">Forgot Your Password?</button>
      </div>
         
         <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>  

</div>  

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
