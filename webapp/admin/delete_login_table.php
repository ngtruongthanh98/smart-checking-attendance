<?php
//including the database connection file
include("../config.php");

//getting id of the data from url
$id_login = $_GET['id_login'];

//deleting the row from table
$result = mysqli_query($link, "DELETE FROM login_table WHERE id_login=$id_login");

//redirecting to the display page (index.php in our case)
header("Location:admin.php");
?>

