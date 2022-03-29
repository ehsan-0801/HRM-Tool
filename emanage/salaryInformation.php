<?php
include('db.php');
include('header.php');
?>
<div class="container">
    <table class="w-100 mx-auto my-2">
        <tr class="border border-1 border-secondary rounded text-center">
            <th class="px-5 py-3 border border-1 border-secondary rounded">NAME</th>
            <th class="px-5 py-3 border border-1 border-secondary rounded">GROSS SALARY</th>
            <th class="px-5 py-3 border border-1 border-secondary rounded">BASIC SALARY</th>
            <th class="px-5 py-3 border border-1 border-secondary rounded">HOUSE RENT</th>
            <th class="px-5 py-3 border border-1 border-secondary rounded">MEDICAL ALLOWENCE</th>
            <th class="px-5 py-3 border border-1 border-secondary rounded">CONVEYANCE</th>
        </tr>
        <?php

        $sql = "SELECT * FROM employee_info, employee_history WHERE employee_history.employee_id = employee_info.id";
        $result = $conn->query($sql);
        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "
            <tr>
                <td class='px-5 py-3 border border-1 border-secondary rounded'>
                $row[name]
                </td>
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
                }
            } else {
                echo "No record found";
            }
        } else {
            echo "Error in " . $query . "<br>" . $conn->error;
        }
        ?>
    </table>
</div>
<?php
include('footer.php')
?>