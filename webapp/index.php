<!DOCTYPE html>
<html lang="en">
<head>
<title>Smart Checking Attendance</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  <?php include 'CSS/main.css'; ?>
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
  <a href="#" class="right">Link</a>
</div>

<div class="row">
  <div class="side">
    <h2>About Me</h2>
    <h5>Photo of me:</h5>
    <div class="fakeimg" style="height:200px;">Image</div>
    <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
    <h3>More Text</h3>
    <p>Lorem ipsum dolor sit ame.</p>
    <div class="fakeimg" style="height:60px;">Image</div><br>
    <div class="fakeimg" style="height:60px;">Image</div><br>
    <div class="fakeimg" style="height:60px;">Image</div>
  </div>



  <div class="main">

    <?php
      include('config.php');

      $result = mysqli_query($link,"SELECT * FROM student_table");

      echo "<table border='1'>
      <tr>
      <th>Id</th>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Student number</th>
      <th>Email</th>
      </tr>";

      while($row = mysqli_fetch_array($result))
      {
        echo "<tr>";
        echo "<td>" . $row['id_stu'] . "</td>";
        echo "<td>" . $row['first_name'] . "</td>";
        echo "<td>" . $row['last_name'] . "</td>";
        echo "<td>" . $row['student_number'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "</tr>";
      }
      echo "</table>";

      mysqli_close($link);


    ?>

  </div>
</div>



<div class="footer">
  <h2>Footer</h2>
</div>

</body>
</html>
