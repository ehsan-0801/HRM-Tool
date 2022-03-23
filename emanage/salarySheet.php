<?php
include('db.php');
include_once('header.php')

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>attendance</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>


    <div class="container">
        <form action="attendance_check.php" method="POST">

            <div class="my-3">
                MONTH: <input type="date" name="date" value="<?php echo date("Y-m-d"); ?>" class="text-center w-25">
            </div>

            <table class="table border border-2 ">
                <thead>
                    <tr>
                        <th class="bg-primary text-center border border-2" scope="col">NAME</th>
                        <th class="bg-primary text-center border border-2" scope="col">GROSS SALARY</th>
                        <th class="bg-primary text-center border border-2" scope="col">BASIC SALARY</th>
                        <th class="bg-primary text-center border border-2" scope="col">HOUSE RENT</th>
                        <th class="bg-primary text-center border border-2" scope="col">MEDICAL ALLOWENCE</th>
                        <th class="bg-primary text-center border border-2" scope="col">CONVEYANCE</th>
                        <th class="bg-primary text-center border border-2" scope="col">BONUS</th>
                        <th class="bg-primary text-center border border-2" scope="col">INCENTIVE</th>
                    </tr>
                </thead>


                <?php
                $sql = "SELECT employee_history.*, employee_info.name FROM employee_history INNER JOIN employee_info ON employee_history.employee_id = employee_info.id ";
                $result = $conn->query($sql);
                echo "
              <tbody>";

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "
                    <tr>
                        <td class='border border-2'>
                            $row[name]
                        </td>
                        <td class='border border-2 mx-auto '>
                            <input type='text' name='$row[gross_salary]' class='bg-white text-center w-100' value='" . $row['gross_salary'] . "' >
                        </td>
                        <td class='border border-2 mx-auto'>
                            <input type='text' name='$row[basic_salary]' class='bg-white text-center w-100' value='" . $row['basic_salary'] . "' >
                        </td>
                        <td class='border border-2 mx-auto'>
                            <input type='text' name='$row[house_rent]' class='bg-white text-center w-100' value='" . $row['house_rent'] . "' >
                        </td>
                        <td class='border border-2 mx-auto'>
                            <input type='text' name='$row[medical_allowence]' class='bg-white text-center w-100' value='" . $row['medical_allowence'] . "' >
                        </td>
                        <td class='border border-2 mx-auto'>
                            <input type='text' name='$row[conveyance]' class='bg-white text-center w-100' value='" . $row['conveyance'] . "' >
                        </td>
                        <td class='border border-2 mx-auto'>
                            <input type='text' name='$row[conveyance]' class='bg-white text-center w-100'  >
                        </td>
                        <td class='border border-2 mx-auto'>
                            <input type='text' name='' class='bg-white text-center w-100' >
                        </td>
                    </tr> 
              ";
                    }
                    echo "</tbody>";
                }
                ?>
            </table>
            <input type='submit' class='btn btn-outline-primary' value="Submit">
        </form>
    </div>
    </div>
    </div>


</body>

</html>
<?php
include_once('footer.php')

?>