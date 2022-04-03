<?php
include('db.php');
include('header.php');
?>
<h1></h1>
<div class="container">
    <table class="w-100 mx-auto my-2">
        <tr class="border border-1 border-secondary rounded text-center">
            <th class="px-5 py-3 border border-1 border-secondary rounded">Employee Name</th>
            <th class="px-5 py-3 border border-1 border-secondary rounded">TOTAL SALARY PAID</th>
            <th class="px-5 py-3 border border-1 border-secondary rounded">MONTH</th>
        </tr>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = $_POST['name'];
            $month = $_POST['month'];
            // echo $id;
            $sql = "SELECT * FROM salary_info,employee_info WHERE salary_info.employee_id = '$id' AND salary_info.month= '$month'AND salary_info.employee_id = employee_info.id";
            $result = $conn->query($sql);

            // $new_name = true;
            // $new_name = true;

            if ($result) {
                if ($result->num_rows > 0) {
                    $row_count = $result->num_rows;
                    while ($row = $result->fetch_assoc()) {
                        $month = date("F", strtotime($row['month']));

                        //     if ($new_name) {
                        //         $name = "<td class='px-5 py-3 border border-1 border-secondary rounded fs-1 fw-bold text-center text-primary bg-info' rowspan='$row_count'>
                        //   $row[name]
                        // </td>";
                        //         $new_name = false;
                        //     }

                        echo "
            <tr>
                
                <td class='px-5 py-3 border border-1 border-secondary rounded'>
                $row[name]
                </td>
                <td class='px-5 py-3 border border-1 border-secondary rounded'>
                $row[total_salary]
                </td>
                <td class='px-5 py-3 border border-1 border-secondary rounded'>
                $month
                </td>
                
            </tr>
            ";

                        $name = '';
                    }
                } else {
                    echo "No record found";
                }
            } else {
                echo "Error in " . $query . "<br>" . $conn->error;
            }
        }
        ?>
    </table </div>
    <?php
    include('footer.php')
    ?>