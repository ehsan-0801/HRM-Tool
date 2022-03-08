<?php
include('db.php');
include('header.php');
?>
<h1></h1>
<div class="container">
    <table class="table table-info table-striped table-hover my-5">
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

            $id = $_POST['name'];
            $dateFrom = $_POST['fromDate'];
            $dateTo = $_POST['toDate'];
            // echo $id;
            $sql = "SELECT * FROM leave_manage,employee_info WHERE leave_manage.employee_id = '$id' AND leave_manage.employee_id = employee_info.id AND leave_dt_from BETWEEN '$dateFrom' AND '$dateTo'";
            $result = $conn->query($sql);

            $new_name = true;

            if ($result) {
                if ($result->num_rows > 0) {
                    $row_count = $result->num_rows;
                    $total_leave = 0;
                    while ($row = $result->fetch_assoc()) {

                        $leave_taken = date_diff(
                            date_create($row['leave_dt_to']),
                            date_create($row['leave_dt_from'])
                        );

                        $leave_taken = 1 + $leave_taken->format('%a');

                        if ($row['leave_dt_from_fh'] == "Half")
                            $leave_taken -= 0.5;

                        if ($row['leave_dt_to_fh'] == "Half")
                            $leave_taken -= 0.5;

                        if ($row['leave_dt_to'] == $row['leave_dt_from']) {
                            if ($row['leave_dt_from_fh'] == "Full" || $row['leave_dt_to_fh'] == "Full") {
                                $leave_taken = 1;
                            } elseif ($row['leave_dt_from_fh'] == "Half" || $row['leave_dt_to_fh'] == "Half") {
                                $leave_taken = .5;
                            }
                        }
                        echo $leave_taken;
                        if ($new_name) {
                            $name = "<td class='px-5 py-3 border border-1 border-secondary rounded' rowspan='$row_count'>
                      $row[name]
                    </td>";
                            $new_name = false;
                        }

                        echo "
                            <tr>
                                $name
                                <td class='px-5 py-3 border border-1 border-secondary rounded'>
                                $row[leave_dt_from]
                                </td>
                                <td class='px-5 py-3 border border-1 border-secondary rounded'>
                                $row[leave_dt_to]
                                </td>
                                <td class='px-5 py-3 border border-1 border-secondary rounded'>
                                $row[reason]
                                </td>
                                <td class='px-5 py-3 border border-1 border-secondary rounded'>
                                $row[notes]
                                </td>
                                <td class='px-5 py-3 border border-1 border-secondary rounded'>$leave_taken</td>
                                
                            </tr>
                            ";

                        $name = '';
                    }
                    $total_leave = $total_leave + $leave_taken;
                    echo $total_leave;
                } else {
                    echo "No record found";
                }
            } else {
                echo "Error in " . $query . "<br>" . $conn->error;
            }
        }
        ?>
    </table>
    <span>Leave Taken in Total: </span><?php echo $total_leave ?>
</div>
<?php
include('footer.php')
?>a