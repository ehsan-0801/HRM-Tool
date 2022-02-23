<?php
    include_once('db.php');
    // echo '<pre>';
    // var_dump($_REQUEST);
    // echo '</pre>';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $employee_id = $_POST['id'];
        $check_in = $_POST['check_in'];
        $check_out = $_POST['check_out'];
        $date = $_POST['date'];
        $check_attendance = $_POST['check_attendance'];

    $sql = 'INSERT INTO attendance (employee_id, check_in, check_out, date, time_duration, status) VALUES ($employee_id, $check_in, $check_out, $date, TIMEDIFF($check_out,$check_in), $check_attendance)';
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }
?>