<?php
    include_once('db.php');
    // echo '<pre>';
    // var_dump($_REQUEST);
    // echo '</pre>';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        foreach($_POST['id'] as $key=>$value) {
          $sql = "INSERT INTO attendance (employee_id, check_in, check_out, date) 
                  VALUES($key, 
                  '".$_POST['check_in'][$key]."',  
                  '".$_POST['check_out'][$key]."',
                  '$_POST[date]');";

          mysqli_query($conn, $sql);

        }
    }
?>  