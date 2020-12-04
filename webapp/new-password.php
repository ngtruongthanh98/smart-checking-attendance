<?php

$email = $_POST["email"];
$reset_token = $_POST["reset_token"];
$new_password = md5($_POST["new_password"]);

$connection = mysqli_connect("localhost", "admin", "password", "attendance");

$sql = "SELECT * FROM login_table WHERE email = '$email'";
$result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0)
{
	$user = mysqli_fetch_object($result);
	if ($user->reset_token == $reset_token)
	{
		$sql = "UPDATE login_table SET reset_token='', password='$new_password' WHERE email='$email'";
		mysqli_query($connection, $sql);

		echo "Password has been changed";
	}
	else
	{
		echo "Recovery email has been expired";
	}
}
else
{
	echo "Email does not exists";
}
