<?php  
//export.php  
include_once("../config.php");
$connect = mysqli_connect("localhost", "admin", "password", "attendance");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM student_table";
 $result = mysqli_query($link, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                        <th>ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Student Number</th>
						<th>Email</th>
						<th>RFID_UID</th>
						<th>Class List</th>
						<th>Created</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
        <tr>  
            <td>'.$row["id_stu"].'</td>  
            <td>'.$row["first_name"].'</td>  
            <td>'.$row["last_name"].'</td>  
            <td>'.$row["student_number"].'</td>  
            <td>'.$row["email"].'</td>
            <td>'.$row["rfid_uid"].'</td>
            <td>'.$row["class_list"].'</td>
            <td>'.$row["created"].'</td>
        </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>
