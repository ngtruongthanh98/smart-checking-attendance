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
$query = "SELECT * FROM student_table ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";  
$result = mysqli_query($link, $query);  
$output .= '  
<table class="table table-bordered">  
    <tr>  
        <th><a class="column_sort" id="id_stu" data-order="'.$order.'" href="#">ID</a></th>  
        <th><a class="column_sort" id="first_name" data-order="'.$order.'" href="#">First Name</a></th>  
        <th><a class="column_sort" id="last_name" data-order="'.$order.'" href="#">Last Name</a></th>  
        <th><a class="column_sort" id="student_number" data-order="'.$order.'" href="#">Student Number</a></th>  
        <th><a class="column_sort" id="email" data-order="'.$order.'" href="#">Email</a></th>  
        <th><a class="column_sort" id="rfid_uid" data-order="'.$order.'" href="#">RFID_UID</a></th>  
        <th><a class="column_sort" id="class_list" data-order="'.$order.'" href="#">Class List</a></th>
        <th><a class="column_sort" id="created" data-order="'.$order.'" href="#">Created</a></th>
    </tr>  
';  
while($row = mysqli_fetch_array($result))  
{  
    $output .= '  
    <tr>  
        <td>' . $row["id_stu"] . '</td>  
        <td>' . $row["first_name"] . '</td>  
        <td>' . $row["last_name"] . '</td>  
        <td>' . $row["student_number"] . '</td>  
        <td>' . $row["email"] . '</td> 
        <td>' . $row["rfid_uid"] . '</td>  
        <td>' . $row["class_list"] . '</td>  
        <td>' . $row["created"] . '</td> 
    </tr>  
    ';  
}  
$output .= '</table>';  
echo $output;  
?>  