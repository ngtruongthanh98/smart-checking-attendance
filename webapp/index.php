<?php
session_start();

if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='student')
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
  <?php
    $con=mysqli_connect("localhost","admin","password","attendance");
    // Check connection
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result = mysqli_query($con,"SELECT * FROM student_table");

    echo "Student table";
    echo "<table border='1'>
    <tr>
    <th>Id</th>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Student number</th>
    <th>Email</th>
    <th>RFID UID</th>
    <th>Class list</th>
    <th>Date join</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['id_stu'] . "</td>";
    echo "<td>" . $row['first_name'] . "</td>";
    echo "<td>" . $row['last_name'] . "</td>";
    echo "<td>" . $row['student_number'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['rfid_uid'] . "</td>";
    echo "<td>" . $row['class_list'] . "</td>";
    echo "<td>" . $row['created'] . "</td>";
    echo "</tr>";
    }
    echo "</table>";
    
    echo "<br>";
    echo "<br>";

    

    $result1 = mysqli_query($con,"SELECT * FROM login_table");

    echo "Login table";
    echo "<table border='1'>
    <tr>
    <th>Id</th>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Email</th>
    <th>Username</th>
    <th>Userlevel</th>
    </tr>";

    while($row1 = mysqli_fetch_array($result1))
    {
    echo "<tr>";
    echo "<td>" . $row1['id_login'] . "</td>";
    echo "<td>" . $row1['fname'] . "</td>";
    echo "<td>" . $row1['lname'] . "</td>";
    echo "<td>" . $row1['email'] . "</td>";
    echo "<td>" . $row1['username'] . "</td>";
    echo "<td>" . $row1['userlevel'] . "</td>";
    echo "</tr>";
    }
    echo "</table>";
    
    echo "<br>";
    echo "<br>";
    
    
    $result2 = mysqli_query($con,"SELECT * FROM class_table");

    echo "Class table";
    echo "<table border='1'>
    <tr>
    <th>Id</th>
    <th>Subject code</th>
    <th>Subject name</th>
    <th>Day in week</th>
    <th>Start time</th>
    <th>End time</th>
    <th>Room</th>
    </tr>";

    while($row2 = mysqli_fetch_array($result2))
    {
    echo "<tr>";
    echo "<td>" . $row2['id_class'] . "</td>";
    echo "<td>" . $row2['subject_code'] . "</td>";
    echo "<td>" . $row2['subject_name'] . "</td>";
    echo "<td>" . $row2['day_in_week'] . "</td>";
    echo "<td>" . $row2['start_time'] . "</td>";
    echo "<td>" . $row2['end_time'] . "</td>";
    echo "<td>" . $row2['room'] . "</td>";
    echo "</tr>";
    }
    echo "</table>";
    
    echo "<br>";
    echo "<br>";
    
    $result3 = mysqli_query($con,"SELECT * FROM attendance_table");

    echo "Attendance table";
    echo "<table border='1'>
    <tr>
    <th>Id</th>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Student number</th>
    <th>Class number</th>
    <th>Clock in</th>
    </tr>";

    while($row3 = mysqli_fetch_array($result3))
    {
    echo "<tr>";
    echo "<td>" . $row3['id_atd'] . "</td>";
    echo "<td>" . $row3['first_name'] . "</td>";
    echo "<td>" . $row3['last_name'] . "</td>";
    echo "<td>" . $row3['student_number'] . "</td>";
    echo "<td>" . $row3['class_number'] . "</td>";
    echo "<td>" . $row3['clock_in'] . "</td>";
    echo "</tr>";
    }
    echo "</table>";
    
    echo "<br>";
    echo "<br>";
    
    
    
    
    mysqli_close($con);
  ?>



  </div>
</div>



<div class="footer">
  <h2>Footer</h2>
</div>

</body>
</html>





