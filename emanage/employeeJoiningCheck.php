<?php
include_once('db.php');
// echo '<pre>';
// var_dump($_REQUEST);
// echo '</pre>';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "INSERT INTO employee_history (employee_id, designation_id, department,  gross_salary, basic_salary, house_rent, medical_allowence, conveyance,joining_date, ending_date) VALUES(
    '" . $_POST['employee_id'] . "',
    '" . $_POST['designation_id'] . "',
    '" . $_POST['department'] . "',
    '" . $_POST['gross_salary'] . "',
    '" . $_POST['basic_salary'] . "',
    '" . $_POST['house_rent'] . "',
    '" . $_POST['medical_allowence'] . "',
    '" . $_POST['conveyance'] . "',
    '" . $_POST['joining_date'] . "',
    '" . '0000-00-00' . "'
    )";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        header('Location: salarySheet.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
