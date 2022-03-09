<?php
include('db.php');
include_once('header.php');
?>
<section class="container">
    <h2 class="text-primary fs-3 fw-bold text-center my-3
    ">SEARCHED RESULT</h2>
    <table class="table table-success table-striped table-hover my-5">
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $month = $_POST['month'];
            $year = $_POST['year'];
            // echo $id;
            $sql = "SELECT * FROM `leave_manage`,`employee_info` WHERE employee_info.id = leave_manage.employee_id AND MONTHNAME(`leave_manage`.`leave_dt_from`) = '$month' AND YEAR(`leave_manage`.`leave_dt_from`) = '$year'";
            $result = $conn->query($sql);

            $new_name = true;

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
        }
        ?>
    </table>
    </div>
</section>

<?php
include_once('footer.php')

?>