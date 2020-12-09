<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$id_stu = $_GET['id_stu'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM student_table WHERE id_stu=$id_stu");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

