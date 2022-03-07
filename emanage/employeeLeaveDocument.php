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
    <title>Attendance list</title>
</head>

<body>
    <section class="container">

        <div class="my-5 mx-auto p-3 border border-1 border-secondary rounded w-50 bg-secondary">
            <form action="employeeWiseLeave.php" method="POST">
                <h2 class="my-2 fs-1 fw-bold text-primary text-center">Employee Wise Leave Report</h2>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <select class="p-2 w-100 border border-3 border-light rounded" name="name" id="name">
                            <?php
                            $sql = 'SELECT * FROM employee_info';
                            $result = $conn->query($sql);
                            if (mysqli_num_rows($result) < 0) {
                                echo 'No value Found';
                            } else {
                                while ($row = $result->fetch_assoc()) {
                                    echo "
                        <option value='" . $row["id"] . "' name='' >" . $row["name"] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Date from:</label>
                    <div class="col-sm-10">
                        <input type="date" class="w-100 p-2 border border-3 border-light rounded" name="fromDate" id="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Date To:</label>
                    <div class="col-sm-10">
                        <input type="date" class="w-100 p-2 border border-3 border-light rounded" name="toDate" id="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 ">

                    </div>
                    <div class="col-md-4 ">

                    </div>
                    <div class="col-md-4 ">
                        <input type="submit" class="btn btn-primary p-2 border border-5 border-primary rounded w-100" value="Find">
                    </div>
                </div>
            </form>
        </div>
        <div>

        </div>
        <div>
            <table class="table table-dark table-striped table-hover my-5">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Leave Taken From</th>
                        <th scope="col">Leave Ended</th>
                        <th scope="col">Reason</th>
                        <th scope="col">Notes</th>
                        <th scope="col">Total Leave</th>
                    </tr>
                </thead>
                <?php
                $sql = "SELECT *
            FROM leave_manage,employee_info WHERE leave_manage.employee_id = employee_info.id AND MONTH(leave_dt_from) = MONTH(CURRENT_DATE())
            AND YEAR(leave_dt_from) = YEAR(CURRENT_DATE())
            ";
                $result = $conn->query($sql);
                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {


                        $total_leave = date_diff(
                            date_create($row['leave_dt_to']),
                            date_create($row['leave_dt_from'])
                        );

                        $total_leave = 1 + $total_leave->format('%a');

                        if ($row['leave_dt_from_fh'] == "Half")
                            $total_leave -= 0.5;

                        if ($row['leave_dt_to_fh'] == "Half")
                            $total_leave -= 0.5;

                        if ($row['leave_dt_to'] == $row['leave_dt_from']) {
                            if ($row['leave_dt_from_fh'] == "Full" || $row['leave_dt_to_fh'] == "Full") {
                                $total_leave = 1;
                            } elseif ($row['leave_dt_from_fh'] == "Half" || $row['leave_dt_to_fh'] == "Half") {
                                $total_leave = .5;
                            }
                        }

                        echo "
                    <tbody>
                        <tr>
                        <td>$row[name]</td>
                        <td>$row[leave_dt_from]</td>
                        <td>$row[leave_dt_to]</td>
                        <td>$row[reason]</td>
                        <td>$row[notes]</td>
                        <td>$total_leave</td>
                        </tr>
                    </tbody>";
                    }
                } else {
                    echo "NO records found";
                }
                ?>
            </table>
        </div>
    </section>



</body>

</html>
<?php
include_once('footer.php')

?>