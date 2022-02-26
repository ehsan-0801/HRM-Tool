<?php
include('db.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $dateFrom =$_POST['fromDate'];
    $dateTo =$_POST['toDate'];
    $sql = 'SELECT * FROM employee_info INNER JOIN attendance WHERE attendance.date BETWEEN $dateFrom AND $dateTo';
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) < 0){
        echo 'No value Found';
    }
    else{
        header('Location: ');
    }
}

?>