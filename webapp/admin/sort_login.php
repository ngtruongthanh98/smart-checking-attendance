<?php
session_start();

if (!isset($_SESSION['class_list_ses']) && !isset($_SESSION['mysesi']) 
 && !isset($_SESSION['id'])             && !isset($_SESSION['mytype'])=='admin'){
  echo "<script>window.location.assign('../login.php')</script>";
}
?>
<?php  
 //sort.php  
//including the database connection file
include_once("../config.php"); 

$output = '';  
$order = $_POST["order"];  
if($order == 'desc')  
{  
    $order = 'asc';  
}  
else  
{  
    $order = 'desc';  
}  
$query = "SELECT * FROM login_table ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";  
$result = mysqli_query($link, $query);  
$output .= '  
<table class="table table-bordered">  
    <tr>  
        <th><a class="column_sort" id="id_login" data-order="'.$order.'" href="#">ID</a></th>  
        <th><a class="column_sort" id="fname" data-order="'.$order.'" href="#">First Name</a></th>  
        <th><a class="column_sort" id="lname" data-order="'.$order.'" href="#">Last Name</a></th>  
        <th><a class="column_sort" id="email" data-order="'.$order.'" href="#">Email</a></th>  
        <th><a class="column_sort" id="username" data-order="'.$order.'" href="#">Username</a></th>  
        <th><a class="column_sort" id="userlevel" data-order="'.$order.'" href="#">Userlevel</a></th>  
    </tr>  
';  
while($row = mysqli_fetch_array($result))  
{  
    $output .= '  
    <tr>  
        <td>' . $row["id_login"] . '</td>  
        <td>' . $row["fname"] . '</td>  
        <td>' . $row["lname"] . '</td>  
        <td>' . $row["email"] . '</td>  
        <td>' . $row["username"] . '</td> 
        <td>' . $row["userlevel"] . '</td>  
    </tr>  
    ';  
}  
$output .= '</table>';  
echo $output;  
?>  