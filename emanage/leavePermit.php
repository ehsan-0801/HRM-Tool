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
    <div class="container w-50 bg-secondary p-5 my-4">
        <h2 class="fs-1 fw-bold text-primary text-center">Leave Entry of Employee</h2>
        <form action="leavePermitCheck.php" method="POST">
            <div class="row my-3">
                <div class="col-md-4">
                    <label for="exampleInputEmployeeName" class="form-label fs-3">Employee Name:</label>
                </div>
                <div class="col-md-8">
                    <select name="name" class="form-select" aria-label="Default select example">
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
                    </select>

                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-4">
                    <label for="exampleInputLeaveDuration" class="form-label fs-3">Leave Duration:</label>
                </div>
                <div class="col-md-6">
                    <input class="form-select form-select-lg mb-3 " type="date" name="dateFrom" id="">
                </div>
                <div class="col-md-2">
                    <select name="leave_dt_from_fh" class="form-select" aria-label="Default select example">
                        <option selected></option>
                        <option value="Half">half</option>
                        <option value="Full">Full</option>
                    </select>
                </div>
                <div class="col-md-4">

                </div>
                <div class="col-md-6">
                    <input class="form-select form-select-lg mb-3 " type="date" name="dateTo" id="">
                </div>
                <div class="col-md-2">
                    <select name="leave_dt_to_fh" class="form-select" aria-label="Default select example">
                        <option selected></option>
                        <option value="half">half</option>
                        <option value="Full">Full</option>
                    </select>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-4">
                    <label for="exampleInputReason" class="form-label fs-3">Type: </label>
                </div>
                <div class="col-md-8">
                    <select name="type" class="form-select" aria-label="Default select example">
                        <option selected></option>
                        <option value=""></option>
                        <option value="Casual Leave">Casual Leave</option>
                        <option value="Medical Leave">Medical Leave</option>
                        <option value="Paid Leave">Festival Leave</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-4">
                    <label for="exampleInputNotes" class="form-label fs-3">Notes: </label>
                </div>
                <div class="col-md-8">
                    <div class="form-floating">
                        <textarea name="notes" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Notes</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 ">

                </div>
                <div class="col-md-4 ">

                </div>
                <div class="col-md-4 ">
                    <input type="submit" class="btn btn-primary p-2 border border-5 border-primary rounded w-100">
                </div>
            </div>
        </form>
    </div>


</body>

</html>

<?php
include_once('footer.php')

?>