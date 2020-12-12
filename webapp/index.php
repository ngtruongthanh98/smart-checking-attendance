<?php
session_start();

if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='student')
{
  echo "<script>window.location.assign('login.php')</script>";
}
if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='teacher')
{
  echo "<script>window.location.assign('login.php')</script>";
}
if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='admin')
{
  echo "<script>window.location.assign('login.php')</script>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Smart Checking Attendance</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  <?php include 'CSS/main.css'; ?>
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<style type="text/css">
    body{ font: 14px sans-serif; }
    .wrapper{ width: 350px; padding: 20px; }
</style>

<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="header">
  <h1>Smart Checking Attendance</h1>
</div>

<div class="navbar">
  <a href="#">Home</a>
  <a href="#">Link</a>
  <a href="#">Link</a>
  <a href="logout.php" class="right">Logout</a>
  <a class="right">Welcome <?php echo $_SESSION['mysesi'] ?></a>
</div>

<div class="row">
  <div class="side">

  </div>

  <div class="main">
 



  </div>
</div>



<div class="footer">
  <h2>Footer</h2>
</div>

</body>
</html>





