<?php
include('db.php');
include('header.php');
?>
<h1></h1>
<div class="container">
    <table class="w-100 mx-auto my-2">
        <tr class="border border-1 border-secondary rounded text-center">
            <th class="px-5 py-3 border border-1 border-secondary rounded">Employee Name</th>
            <th class="px-5 py-3 border border-1 border-secondary rounded">GROSS SALARY</th>
            <th class="px-5 py-3 border border-1 border-secondary rounded">BASIC SALARY</th>
            <th class="px-5 py-3 border border-1 border-secondary rounded">HOUSE RENT</th>
            <th class="px-5 py-3 border border-1 border-secondary rounded">MEDICAL ALLOWENCE</th>
            <th class="px-5 py-3 border border-1 border-secondary rounded">CONVEYANCE</th>
        </tr>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = $_POST['name'];
            // echo $id;
            $sql = "SELECT * FROM employee_history,employee_info WHERE employee_history.employee_id = '$id' AND employee_history.employee_id = employee_info.id";
            $result = $conn->query($sql);

            $new_name = true;
            $new_name = true;

            if ($result) {
                if ($result->num_rows > 0) {
                    $row_count = $result->num_rows;
                    while ($row = $result->fetch_assoc()) {

                        if ($new_name) {
                            $name = "<td class='px-5 py-3 border border-1 border-secondary rounded fs-1 fw-bold text-center text-primary bg-info' rowspan='$row_count'>
                      $row[name]
                    </td>";
                            $new_name = false;
                        }

                        echo "
            <tr>
                $name
                <td class='px-5 py-3 border border-1 border-secondary rounded'>
                $row[gross_salary]
                </td>
                <td class='px-5 py-3 border border-1 border-secondary rounded'>
                $row[basic_salary]
                </td>
                <td class='px-5 py-3 border border-1 border-secondary rounded'>
                $row[house_rent]
                </td>
                <td class='px-5 py-3 border border-1 border-secondary rounded'>
                $row[medical_allowence]
                </td>
                <td class='px-5 py-3 border border-1 border-secondary rounded'>
                $row[conveyance]
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