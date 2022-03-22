<?php
include_once('db.php');
// echo '<pre>';
// var_dump($_REQUEST);
// echo '</pre>';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['employee_id'];
    $date = $_POST['ending_date'];
    $sql = "UPDATE employee_history SET ending_date= '$date'  WHERE  employee_id = $id AND ending_date = '0000-00-00'";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        header('Location: employeeResigning.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
