<?php
include('db.php');

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
    <table class="table border border-2 ">
    <thead>
        <tr >
        <th class="bg-primary text-center border border-2" scope="col">NAME</th>
        <th class="bg-primary text-center border border-2" scope="col">ID</th>
        <th class="bg-primary text-center border border-2" scope="col">CHECK IN TIME</th>
        <th class="bg-primary text-center border border-2" scope="col">CHECK OUT TIME</th>
        <th class="bg-primary text-center border border-2" scope="col">DATE</th>
        <th class="bg-primary text-center border border-2" scope="col">ATTENDENCE</th>
        </tr>
    </thead>
  

    <?php
        $sql = "SELECT * FROM employee_info";
        $result = $conn->query($sql);
        echo "
              <tbody>";

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              echo "
                    <tr>
                        <td class='border border-2'>$row[name]</td>
                        <td class='border border-2 mx-auto '>
                        <input type='text' name='id[]' class='bg-secondary text-center w-100' value='$row[id]'>
                        </td>
                        <td class='border border-2 mx-auto '>
                        <input type='time' name='check_in[]' class='bg-secondary text-center w-100' value='".date('H:i')."' >
                        </td>
                        <td class='border border-2 mx-auto'>
                        <input type='time' class='bg-secondary text-center w-100'   name='check_out[]' value='".date('H:i')."' >
                        </td>
                        <td class='border border-2 mx-auto'>
                        <input type='Date' name='date[]' value='".date ("Y-m-d")."' class='bg-secondary text-center w-100' >
                        </td>
                        <td class='border border-2 mx-auto'>
                        <input type='checkbox' class='bg-secondary text-center mx-auto' value='1' name='id[$row[id]]' >
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


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>