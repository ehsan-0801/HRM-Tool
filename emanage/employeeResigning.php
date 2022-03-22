<?php
include('db.php');
include_once('header.php');
?>
<style>
    .bg-custom {
        background: #a5a58d;
    }
</style>


<div class="container my-md-5">
    <form class="w-50 mx-auto p-sm-3 bg-custom
    " action="employeeResiginingCheck.php" method="POST">

        <h2 class="text-center text-primary fw-bold">Resigning of Employee</h2>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label text-light">Employee Name</label>
            <div class="col-sm-8">
                <select name="employee_id" class="form-select col-sm-8" aria-label="Default select example">
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
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label text-light">Resigning Date</label>
            <div class="col-sm-8">
                <input type="date" id="date" name="ending_date" class="form-control">
            </div>
        </div>
        <input type="submit" class="btn btn-light px-sm-3" value="Assign">
    </form>
</div>
<?php
include_once('footer.php')

?>