<?php
session_start();

if (!isset($_SESSION['class_list_ses']) && !isset($_SESSION['mysesi']) 
 && !isset($_SESSION['id'])             && !isset($_SESSION['mytype'])=='teacher'){
  echo "<script>window.location.assign('../login.php')</script>";
}
?>
<?php  
 //sort.php  
//including the database connection file
include_once("../config.php"); 

$class_list_var = $_SESSION['class_list_ses'];
$array = array_map('intval', explode(',', $class_list_var));
$array = implode("','",$array);

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
$query = "SELECT * FROM attendance_table WHERE class_number IN('".$array."') ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";  
$result = mysqli_query($link, $query);  
$output .= '  
<table class="table table-bordered">  
    <tr>  
        <th><a class="column_sort" id="id_atd" data-order="'.$order.'" href="#">ID</a></th>  
        <th><a class="column_sort" id="first_name" data-order="'.$order.'" href="#">First Name</a></th>  
        <th><a class="column_sort" id="last_name" data-order="'.$order.'" href="#">Last Name</a></th>  
        <th><a class="column_sort" id="student_number" data-order="'.$order.'" href="#">Student Number</a></th>  
        <th><a class="column_sort" id="class_number" data-order="'.$order.'" href="#">Class Number</a></th>  
        <th><a class="column_sort" id="clock_in" data-order="'.$order.'" href="#">Clock In</a></th>  
    </tr>  
';  
while($row = mysqli_fetch_array($result))  
{  
    $output .= '  
    <tr>  
        <td>' . $row["id_atd"] . '</td>  
        <td>' . $row["first_name"] . '</td>  
        <td>' . $row["last_name"] . '</td>  
        <td>' . $row["student_number"] . '</td>  
        <td>' . $row["class_number"] . '</td> 
        <td>' . $row["clock_in"] . '</td>  
    </tr>  
    ';  
}  
$output .= '</table>';  
echo $output;  
?>  