<?php
include('db.php');
include('header.php');
?>
<div class="container">
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
                                $row[type]
                                </td>
                                <td class='px-5 py-3 border border-1 border-secondary rounded'>
                                $row[notes]
                                </td>
                                <td class='px-5 py-3 border border-1 border-secondary rounded'>$leave_taken</td>
                                
                            </tr>
                            
                            ";

                        $name = '';
                        if ($leave_taken == 0) {
                            $total_leave = $leave_taken;
                        } else {
                            $total_leave = $total_leave + $leave_taken;
                        }
                    }
                } else {
                    echo $total_leave, " leave taken";
                }
            } else {
                echo "Error in " . $query . "<br>" . $conn->error;
            }
        }

        echo "<tr>
                                
                                <td class='px-5 py-3 border border-1 border-secondary rounded' colspan='5'>
                                
                                </td>
                                <td class='px-5 py-3 border border-1 border-secondary rounded'>
                                <span class='fw-bold text-primary'>TOTAL:</span> $total_leave
                                </td>
                            </tr>";
        ?>

    </table>
    <table class="table table-info table-striped table-hover my-5 w-50 mx-auto">

        <tbody>
            <?php
            $sql = "SELECT * FROM leave_manage,employee_info WHERE leave_manage.employee_id = '$id' AND leave_manage.employee_id = employee_info.id";
            $result = $conn->query($sql);
            $total_medical_leave = 14.00;
            $total_casual_leave = 10.00;
            $total_Festival_leave = 10.00;
            $medical_leave = 0;
            $casual_leave = 0;
            $Festival_leave = 0;
            $Other = 0;

            if (mysqli_num_rows($result) < 0) {
                echo "No records found";
            } else {
                while ($row = $result->fetch_assoc()) {

                    if ($row['type'] == 'Medical Leave') {
                        $leave_taken_medical = date_diff(
                            date_create($row['leave_dt_to']),
                            date_create($row['leave_dt_from'])
                        );
                        $leave_taken_medical = 1 + $leave_taken_medical->format('%a');
                        if ($row['leave_dt_from_fh'] == "Half")
                            $leave_taken_medical -= 0.5;

                        if ($row['leave_dt_to_fh'] == "Half")
                            $leave_taken_medical -= 0.5;

                        if ($row['leave_dt_to'] == $row['leave_dt_from']) {
                            if ($row['leave_dt_from_fh'] == "Full" || $row['leave_dt_to_fh'] == "Full") {
                                $leave_taken_medical = 1;
                            } elseif ($row['leave_dt_from_fh'] == "Half" || $row['leave_dt_to_fh'] == "Half") {
                                $leave_taken_medical = .5;
                            }
                        }


                        $medical_leave +=
                            $leave_taken_medical;
                    }
                    if ($row['type'] == 'Casual Leave') {
                        $leave_taken_casual = date_diff(
                            date_create($row['leave_dt_to']),
                            date_create($row['leave_dt_from'])
                        );
                        $leave_taken_casual = 1 + $leave_taken_casual->format('%a');
                        if ($row['leave_dt_from_fh'] == "Half")
                            $leave_taken_casual -= 0.5;

                        if ($row['leave_dt_to_fh'] == "Half")
                            $leave_taken_casual -= 0.5;

                        if ($row['leave_dt_to'] == $row['leave_dt_from']) {
                            if ($row['leave_dt_from_fh'] == "Full" || $row['leave_dt_to_fh'] == "Full") {
                                $leave_taken_casual = 1;
                            } elseif ($row['leave_dt_from_fh'] == "Half" || $row['leave_dt_to_fh'] == "Half") {
                                $leave_taken_casual = .5;
                            }
                        }


                        $casual_leave +=
                            $leave_taken_casual;
                    }
                    if ($row['type'] == 'Festival leave') {
                        $leave_taken_festival = date_diff(
                            date_create($row['leave_dt_to']),
                            date_create($row['leave_dt_from'])
                        );
                        $leave_taken_festival = 1 + $leave_taken_festival->format('%a');
                        if ($row['leave_dt_from_fh'] == "Half")
                            $leave_taken_festival -= 0.5;

                        if ($row['leave_dt_to_fh'] == "Half")
                            $leave_taken_festival -= 0.5;

                        if ($row['leave_dt_to'] == $row['leave_dt_from']) {
                            if ($row['leave_dt_from_fh'] == "Full" || $row['leave_dt_to_fh'] == "Full") {
                                $leave_taken_festival = 1;
                            } elseif ($row['leave_dt_from_fh'] == "Half" || $row['leave_dt_to_fh'] == "Half") {
                                $leave_taken_festival = .5;
                            }
                        }


                        $Festival_leave +=
                            $leave_taken_festival;
                    }
                    if ($row['type'] == 'Other') {
                        $Other++;
                    }
                }
                $total_medical_leave = $total_medical_leave - $medical_leave;
                $total_casual_leave = $total_casual_leave - $casual_leave;
                $total_Festival_leave = $total_Festival_leave - $Festival_leave;

                echo "
                <thead>
            <tr>
                <th scope='col' class='text-center text-primary'>Leave Type</th>
                <th scope='col' class='text-center text-primary'>Remaining Leave</th>
            </tr>
        </thead>
                  <tr>
                <th scope='row' class='text-center'>Medical Leave</th>
                <td class='text-center'>$total_medical_leave</td>
            </tr>
                  <tr>
                <th scope='row' class='text-center'>Casual Leave</th>
                <td class='text-center'>$total_casual_leave</td>
            </tr>
            </tr>
                  <tr>
                <th scope='row' class='text-center'>Festival Leave</th>
                <td class='text-center'>$total_Festival_leave</td>
            </tr>
                ";
            }
            ?>



        </tbody>
    </table>
</div>
<?php
include('footer.php')
?>