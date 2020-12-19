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
$query = "SELECT * FROM teacher_table ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";  
$result = mysqli_query($link, $query);  
$output .= '  
<table class="table table-bordered">  
    <tr>  
        <th><a class="column_sort" id="id_teacher" data-order="'.$order.'" href="#">ID</a></th>  
        <th><a class="column_sort" id="first_name" data-order="'.$order.'" href="#">First Name</a></th>  
        <th><a class="column_sort" id="last_name" data-order="'.$order.'" href="#">Last Name</a></th>  
        <th><a class="column_sort" id="teacher_number" data-order="'.$order.'" href="#">Teacher Number</a></th>  
        <th><a class="column_sort" id="email" data-order="'.$order.'" href="#">Email</a></th>  
        <th><a class="column_sort" id="class_list" data-order="'.$order.'" href="#">Class List</a></th>
    </tr>  
';  
while($row = mysqli_fetch_array($result))  
{  
    $output .= '  
    <tr>  
        <td>' . $row["id_teacher"] . '</td>  
        <td>' . $row["first_name"] . '</td>  
        <td>' . $row["last_name"] . '</td>  
        <td>' . $row["teacher_number"] . '</td>  
        <td>' . $row["email"] . '</td> 
        <td>' . $row["class_list"] . '</td>  
    </tr>  
    ';  
}  
$output .= '</table>';  
echo $output;  
?>  