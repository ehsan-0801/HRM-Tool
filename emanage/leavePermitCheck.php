<?php
include_once('db.php');
// var_dump($_REQUEST);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($_POST['id'] as $key => $value) {
        $sql = "INSERT INTO leave_maanage
         (employee_id, leave_dt_from, leave_dt_to, leave_dt_from_fh, leave_dt_to_fh, reason, notes)
     VALUES($key,
     '" . $_POST['name'] . "',
    '" . $_POST['dateFrom'] . "',
    '" . $_POST['dateTo'] . "',
    '" . $_POST['leave_dt_from_fh'] . "',
    '" . $_POST['leave_dt_to_fh'] . "',
    '" . $_POST['reason'] . "',
    '" . $_POST['notes'] . "',
    ";

        mysqli_query($conn, $sql);
    }
    header('Location: leavePermit.php');
}
