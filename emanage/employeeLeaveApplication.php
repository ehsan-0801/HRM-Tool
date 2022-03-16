<?php
include('db.php');
include_once('header.php');
?>
<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container bg-info p-5 my-4 border border-5 border-info rounded">
        <h2 class="fs-1 fw-bold text-secondary text-center">Leave Application</h2>
        <form action="employeeLeaveCheck.php" method="POST">
            <p class="fs-4">Hello Sir,</p>
            <p class="fs-4">I am <select name="name" class="p-1 border border-1 border-light rounded">
                    <?php
                    $sql = "SELECT * FROM employee_info";
                    $result = $conn->query($sql);
                    if (mysqli_num_rows($result) < 0) {
                        echo "No records found";
                    } else {
                        while ($row = $result->fetch_assoc()) {
                            echo "
                <option value='" . $row["id"] . "' name='name' >" . $row["name"] . "</option>";
                        }
                    }
                    ?>
                </select> , I wanna take leave from <input class="p-1 border border-1 border-light rounded" type="date" name="dateFrom" id="">
                <select name="leave_dt_from_fh" class="p-1 border border-1 border-light rounded">
                    <option selected></option>
                    <option value="Half">half</option>
                    <option value="Full">Full</option>
                </select> to <input class="p-1 border border-1 border-light rounded" type="date" name="dateTo" id="">
                <select name="leave_dt_to_fh" class="p-1 border border-1 border-light rounded">
                    <option selected></option>
                    <option value="Half">half</option>
                    <option value="Full">Full</option>
                </select>
                as my
                <select name="reason" class="p-1 border border-1 border-light rounded">
                    <option selected></option>
                    <option value=""></option>
                    <option value="Casual Leave">Casual Leave</option>
                    <option value="Medical Leave">Medical Leave</option>
                    <option value="Paid Leave">Festival Leave</option>
                    <option value="Other">Other</option>
                </select>
                for the reason of
                <textarea name="notes" class="form-control" placeholder="Write the reason here" id="floatingTextarea2" style="height: 100px"></textarea>
                It would be kind enough if you grant me a leave.
                <br>
                Regards

            </p>

            <div class="col-md-4 ">
                <input type="submit" class="btn btn-primary p-2 border border-5 border-primary rounded w-50">
            </div>
        </form>
    </div>

</body>

</html>

<?php
include_once('footer.php')

?>