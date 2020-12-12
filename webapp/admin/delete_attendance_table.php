<?php
//including the database connection file
include("../config.php");

//getting id of the data from url
$id_atd = $_GET['id_atd'];

//deleting the row from table
$result = mysqli_query($link, "DELETE FROM attendance_table WHERE id_atd=$id_atd");

//redirecting to the display page (index.php in our case)
header("Location:admin.php");
?>

