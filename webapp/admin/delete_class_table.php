<?php
//including the database connection file
include("../config.php");

//getting id of the data from url
$id_class = $_GET['id_class'];

//deleting the row from table
$result = mysqli_query($link, "DELETE FROM class_table WHERE id_class=$id_class");

//redirecting to the display page (index.php in our case)
header("Location:admin.php");
?>

