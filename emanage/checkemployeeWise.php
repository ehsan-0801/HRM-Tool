<?php
include('db.php');
include('header.php');
session_start();
?>
<h1></h1>
<div class="container">
    <table class="w-100 mx-auto my-2">
        <tr class="border border-1 border-secondary rounded text-center">
            <th class="px-5 py-3 border border-1 border-secondary rounded">Employee Name</th>
            <th class="px-5 py-3 border border-1 border-secondary rounded">Employee ID</th>
            <th class="px-5 py-3 border border-1 border-secondary rounded">Check in Time</th>
            <th class="px-5 py-3 border border-1 border-secondary rounded">Check out Time</th>
            <th class="px-5 py-3 border border-1 border-secondary rounded">Date</th>
        </tr>
        <?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $id = $_POST['name'];
    $dateFrom =$_POST['fromDate'];
    $dateTo =$_POST['toDate'];
    // echo $id;
    $sql = "SELECT * FROM attendance,employee_info WHERE attendance.employee_id = '$id' AND attendance.employee_id = employee_info.id AND date BETWEEN '$dateFrom' AND '$dateTo'";
    $result = $conn->query($sql);
    
    $new_name = true;

    if($result){
        if ($result->num_rows> 0) {
        $row_count = $result->num_rows;
        while($row = $result->fetch_assoc()){
           
          if($new_name)
          {
            $name = "<td class='px-5 py-3 border border-1 border-secondary rounded' rowspan='$row_count'>
                      $row[name]
                    </td>";
            $new_name = false;
         }

            echo "
            <tr>
                $name
                <td class='px-5 py-3 border border-1 border-secondary rounded'>
                $row[employee_id]
                </td>
                <td class='px-5 py-3 border border-1 border-secondary rounded'>
                $row[check_in]
                </td>
                <td class='px-5 py-3 border border-1 border-secondary rounded'>
                $row[check_out]
                </td>
                <td class='px-5 py-3 border border-1 border-secondary rounded'>
                $row[date]
                </td>
                
            </tr>
            ";

            $name = '';
        }
        }else{
            echo "No record found";
        }
      }else{
        echo "Error in ".$query."<br>".$conn->error;
      }

}
?>
    </table>
</div>
<?php
include('footer.php')
?>
