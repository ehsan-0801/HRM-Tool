<?php
include_once('db.php');
// echo '<pre>';
// var_dump($_REQUEST);
// echo '</pre>';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employee_id = $_POST['employee_id'];
    $designation_id = $_POST['designation_id'];
    $department = $_POST['department'];
    $gross_salary = $_POST['gross_salary'];
    $basic_salary = $_POST['basic_salary'];
    $house_rent = $_POST['house_rent'];
    $medical_allowence = $_POST['medical_allowence'];
    $conveyance = $_POST['conveyance'];
    $joining_date = $_POST['joining_date'];
    $ending_date =   date('Y-m-d', strtotime($_POST['joining_date']) - 86400);

    $sql = "UPDATE employee_history SET ending_date = '$ending_date' WHERE employee_id = '$employee_id' AND ending_date = '0000-00-00'";
    $sql2 =
        "INSERT INTO employee_history (employee_id, designation_id, department,  gross_salary, basic_salary, house_rent, medical_allowence, conveyance,joining_date, ending_date) VALUES(
    '" . $employee_id . "',
    '" . $designation_id  . "',
    '" . $department . "',
    '" . $gross_salary . "',
    '" . $basic_salary . "',
    '" . $house_rent . "',
    '" . $medical_allowence . "',
    '" . $conveyance . "',
    '" . $joining_date . "',
    '" . '0000-00-00' . "'
    )";
    if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
        echo "New record created successfully";
        header('Location: employeeJoiningInfoUpdate.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
