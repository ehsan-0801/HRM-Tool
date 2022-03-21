<?php
    include_once('db.php');
    // echo '<pre>';
    // var_dump($_REQUEST);
    // echo '</pre>';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        foreach($_POST['id'] as $key=>$value) {
          $sql = "INSERT INTO employeement_history (employee_id, designation_id, joining_date, ending_date, gross_salary, basic_salary, house_rent, medical_allowence, conveyance) 
                  VALUES(
                      '$_POST[employee_id]',
                      '$_POST[designation_id]',
                      '$_POST[employee_id]',
                      '$_POST[employee_id]',
                  )
                  
                  ;";

          mysqli_query($conn, $sql);

        }
        header('Location: attendance.php');
    }
?>
