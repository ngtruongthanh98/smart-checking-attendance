<?php
//including the database connection file
include("../config.php");

//getting id of the data from url
$id_teacher = $_GET['id_teacher'];

//deleting the row from table
$result = mysqli_query($link, "DELETE FROM teacher_table WHERE id_teacher=$id_teacher");

//redirecting to the display page (index.php in our case)
header("Location:admin.php");
?>

