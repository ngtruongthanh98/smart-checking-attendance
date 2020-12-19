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
$query = "SELECT * FROM class_table ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";  
$result = mysqli_query($link, $query);  
$output .= '  
<table class="table table-bordered">  
    <tr>  
        <th><a class="column_sort" id="id_class" data-order="'.$order.'" href="#">ID</a></th>  
        <th><a class="column_sort" id="subject_code" data-order="'.$order.'" href="#">Subject Code</a></th>  
        <th><a class="column_sort" id="subject_name" data-order="'.$order.'" href="#">Subject Name</a></th>  
        <th><a class="column_sort" id="day_in_week" data-order="'.$order.'" href="#">Day in Week</a></th>  
        <th><a class="column_sort" id="start_time" data-order="'.$order.'" href="#">Start Time</a></th>  
        <th><a class="column_sort" id="end_time" data-order="'.$order.'" href="#">End Time</a></th>  
        <th><a class="column_sort" id="room" data-order="'.$order.'" href="#">Room</a></th>
    </tr>  
';  
while($row = mysqli_fetch_array($result))  
{  
    $output .= '  
    <tr>  
        <td>' . $row["id_class"] . '</td>  
        <td>' . $row["subject_code"] . '</td>  
        <td>' . $row["subject_name"] . '</td>  
        <td>' . $row["day_in_week"] . '</td>  
        <td>' . $row["start_time"] . '</td> 
        <td>' . $row["end_time"] . '</td>  
        <td>' . $row["room"] . '</td>  
    </tr>  
    ';  
}  
$output .= '</table>';  
echo $output;  
?>  