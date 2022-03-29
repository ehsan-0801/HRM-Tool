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
            <form action="salaryInfocheckIndividual.php" method="POST">
                <h2 class="my-2 fs-1 fw-bold text-primary text-center">Employee Salary</h2>
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

                <div class="row">
                    <div class="col-md-4 ">

                    </div>
                    <div class="col-md-4 ">

                    </div>
                    <div class="col-md-4 ">
                        <input type="submit" class="btn btn-primary p-2 border border-5 border-primary rounded w-100" value="Show">
                    </div>
                </div>
            </form>
        </div>

    </section>



</body>

</html>
<?php
include_once('footer.php')

?>