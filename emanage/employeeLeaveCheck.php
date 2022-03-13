<?php
include_once('db.php');
// var_dump($_REQUEST);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "INSERT INTO leave_application
         (employee_id, leave_dt_from, leave_dt_to, leave_dt_from_fh, leave_dt_to_fh, reason, notes)
     VALUES(
     '" . $_POST['name'] . "',
    '" . $_POST['dateFrom'] . "',
    '" . $_POST['dateTo'] . "',
    '" . $_POST['leave_dt_from_fh'] . "',
    '" . $_POST['leave_dt_to_fh'] . "',
    '" . $_POST['reason'] . "',
    '" . $_POST['notes'] . "')
    ";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        header('Location: employeeLeaveApplication.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
