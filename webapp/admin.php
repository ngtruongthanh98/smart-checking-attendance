<?php
session_start();

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

<div class="container">

        <?php
            require_once('process.php');
        ?>
        
        <?php
            $mysqli = new mysqli('localhost', 'admin', 'password', 'attendance') or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM student_table") or die($mysqli->error);
            //pre_r($result);
            //pre_r($result->fetch_assoc());
            //pre_r($result->fetch_assoc());
            //pre_r($result->fetch_assoc());
            ?>
            
            <strong>Student Table</strong>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Student Number</th>
                        <th>Email</th>
                        <th>RFID UID</th>
                        <th>Class List</th>
                        <th>Create</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                
            <?php
                while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id_stu']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['student_number']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['rfid_uid']; ?></td>
                    <td><?php echo $row['class_list']; ?></td>
                    <td><?php echo $row['created']; ?></td>
                    <td>
                        <a href="admin.php?edit=<?php echo $row['id_stu'] ?>"
                           class="btn btn-info">Edit</a>
                        <a href="process.php?delete=<?php echo $row['id_stu'] ?>"
                           class="btn btn-danger">Delete</a>
                    </td>

                </tr>
                <?php endwhile; ?>
            
            </table>

            <?php
            
            function pre_r($array)
            {
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }
            
            
        ?>
        <form class="form-horizontal" action="process.php" method="POST">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" class="form_control">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" class="form_control">
            </div>
            <div class="form-group">
                <label>Student Number</label>
                <input type="text" name="student_number" class="form_control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form_control">
            </div>
            <div class="form-group">
                <label>RFID UID</label>
                <input type="number" name="rfid_uid" class="form_control">
            </div>
            <div class="form-group">
                <label>Class List</label>
                <input type="text" name="class_list" class="form_control">
            </div>
            <div class="form-group">
                <label>Created</label>
                <input type="text" name="created" class="form_control">
            </div>            
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="save">Save</button>
            </div>
            
        </form>
</div>








<div class="footer">
  <h2>Footer</h2>
</div>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>
