<?php
include('db.php');
include_once('header.php');
?>
<style>
    .bg-custom {
        background: #588b8b;
    }
</style>


<div class="container my-md-5">
    <form class="w-50 mx-auto p-sm-3 bg-custom
    " action="employeeJoiningUpdateCheck.php" method="POST">

        <h2 class="text-center text-primary fw-bold">Employee Joining Info Update</h2>
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
            <label for="inputEmail3" class="col-sm-3 col-form-label text-light">Designation</label>
            <div class="col-sm-8">
                <select name="designation_id" class="form-select col-sm-8" aria-label="Default select example">
                    <?php
                    $sql = "SELECT * FROM designation";
                    $result = $conn->query($sql);
                    if (mysqli_num_rows($result) < 0) {
                        echo "No records found";
                    } else {
                        while ($row = $result->fetch_assoc()) {
                            echo "
                <option value='" . $row["designation_id"] . "'  name='name' >" . $row["designation_name"] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label text-light">Department</label>
            <div class="col-sm-8">
                <select name="department" class="form-select col-sm-8" aria-label="Default select example">
                    <?php
                    $sql = "SELECT * FROM designation";
                    $result = $conn->query($sql);
                    if (mysqli_num_rows($result) < 0) {
                        echo "No records found";
                    } else {
                        while ($row = $result->fetch_assoc()) {
                            echo "
                <option value='" . $row["department"] . "' name='name' >" . $row["department"] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label text-light">Gross Salary</label>
            <div class="col-sm-8">
                <input type="number" id="gross_salary" name="gross_salary" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label text-light">Basic Salary</label>
            <div class="col-sm-8">
                <input type="number" id="basic_salary" name="basic_salary" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label text-light">House Rent</label>
            <div class="col-sm-8">
                <input type="number" id="house_rent" name="house_rent" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label text-light">Medical Allowence</label>
            <div class="col-sm-8">
                <input type="number" id="medical_allowence" name="medical_allowence" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label text-light">Conveyance</label>
            <div class="col-sm-8">
                <input type="number" id="conveyance" name="conveyance" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-3 col-form-label text-light">Joining Date</label>
            <div class="col-sm-8">
                <input type="date" id="date" name="joining_date" class="form-control">
            </div>
        </div>
        <input type="submit" class="btn btn-light px-sm-3" value="Assign">
    </form>
</div>
<script src="./js/employeeJoining.js"></script>
<?php
include_once('footer.php')

?>