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
    $ending_date =   '0000-00-00';
    $sql = "UPDATE employee_history SET
    employee_id = '$employee_id',  designation_id = '$designation_id', department = '$department', gross_salary = '$gross_salary',basic_salary = '$basic_salary',house_rent = '$house_rent', medical_allowence = '$medical_allowence', conveyance = '$conveyance',
    joining_date = '$joining_date',ending_date = '$ending_date' WHERE employee_id = $employee_id AND joining_date= $ending_date ";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        header('Location: employeeJoiningInfoUpdate.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
