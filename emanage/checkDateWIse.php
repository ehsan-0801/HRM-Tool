<?php
include('db.php');
include('header.php');
?>
<div class="container">
<table class="w-100 mx-auto my-2">
    <tr class="border border-1 border-secondary rounded text-center">
        <th class="px-5 py-3 border border-1 border-secondary rounded">Name</th>
        <th class="px-5 py-3 border border-1 border-secondary rounded">Employee ID</th>
        <th class="px-5 py-3 border border-1 border-secondary rounded">Check in Time</th>
        <th class="px-5 py-3 border border-1 border-secondary rounded">Check out Time</th>
        <th class="px-5 py-3 border border-1 border-secondary rounded">Date</th>
        <th class="px-5 py-3 border border-1 border-secondary rounded">Office Duration</th>
    </tr>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $dateFrom =$_POST['fromDate'];
    $dateTo =$_POST['toDate'];
    $sql = "SELECT * FROM employee_info, attendance WHERE attendance.employee_id = employee_info.id AND attendance.date BETWEEN '$dateFrom' AND '$dateTo'";
    $result = $conn->query($sql);
    function timeDiff($firstTime,$lastTime){
        // convert to unix timestamps
        $firstTime=strtotime($firstTime);
        $lastTime=strtotime($lastTime);
     
        // perform subtraction to get the difference (in seconds) between times
        $timeDiff=$lastTime-$firstTime;
        return round(abs($timeDiff/3600));
        // return the difference
    }
    if($result){
        if ($result->num_rows> 0) {
        while($row = $result->fetch_assoc()){
            // print_r($row);

            $timeDiff = timeDiff($row['check_in'],$row['check_out']);
            echo "
            <tr>
                <td class='px-5 py-3 border border-1 border-secondary rounded'>
                $row[name]
                </td>
                <td class='px-5 py-3 border border-1 border-secondary rounded'>
                $row[id]
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
                <td class='px-5 py-3 border border-1 border-secondary rounded'>
                $timeDiff
                </td>
            </tr>
            ";
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