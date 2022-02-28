<?php
include('db.php');
include('header.php');
?>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $dateFrom =$_POST['fromDate'];
    $dateTo =$_POST['toDate'];
    echo $id;
    $sql = "SELECT * FROM employee_info INNER JOIN attendance WHERE attendance.employee_id = '$id' AND date BETWEEN '$dateFrom' AND '$dateTo'";
    $result = $conn->query($sql);
    if($result){
        if ($result->num_rows> 0) {
        while($row = $result->fetch_assoc()){
            
            
            // echo "
            // <tr>
            //     <td class='px-5 py-3 border border-1 border-secondary rounded'>
            //     $row[name]
            //     </td>
            //     <td class='px-5 py-3 border border-1 border-secondary rounded'>
            //     $row[id]
            //     </td>
            //     <td class='px-5 py-3 border border-1 border-secondary rounded'>
            //     $row[check_in]
            //     </td>
            //     <td class='px-5 py-3 border border-1 border-secondary rounded'>
            //     $row[check_out]
            //     </td>
            //     <td class='px-5 py-3 border border-1 border-secondary rounded'>
            //     $row[date]
            //     </td>
                
            // </tr>
            // ";
        }
        }else{
            echo "No record found";
        }
      }else{
        echo "Error in ".$query."<br>".$conn->error;
      }

}
include('footer.php')
?>