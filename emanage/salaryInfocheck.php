<?php
include_once('db.php');
// echo '<pre>';
// var_dump($_REQUEST);
// echo '</pre>';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($_POST['id'] as $key => $value) {

        $total_Salary =
            intval($_POST['gross_salary'][$key])
            +
            intval($_POST['incentive'][$key])
            +
            intval($_POST['bonus'][$key]);


        // echo $total_Salary[$key];
        $sql = "INSERT INTO salary_info (employee_id, gross_salary, basic_salary, house_rent, medical_allowence, bonus, conveyance,incentive, total_salary, month) 
                  VALUES($key, 
                  '" . $_POST['gross_salary'][$key] . "',  
                  '" . $_POST['basic_salary'][$key] . "',
                  '" . $_POST['house_rent'][$key] . "',
                  '" . $_POST['medical_allowence'][$key] . "',
                  '" . $_POST['bonus'][$key] . "',
                  '" . $_POST['conveyance'][$key] . "',
                  '" . $_POST['incentive'][$key] . "',
                  '" . $total_Salary . "',
                  '$_POST[month]');";

        mysqli_query($conn, $sql);
    }
    header('Location: salarySheet.php');
}
