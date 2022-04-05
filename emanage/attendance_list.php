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
        <div class="row">
            <div class="text-light my-2 mx-md-5 p-3 border border-1 border-secondary rounded col-md-5 col-sm-12" style="background: #ddb892;">
                <form action="checkDateWIse.php" method="POST" class="px-md-5">
                    <div class="mb-3 row">
                        <label for="dateFrom" class="col-sm-2 col-form-label">Date from:</label>
                        <div class="col-sm-10">
                            <input type="date" class="w-100 p-2 border border-3 border-light rounded" name="fromDate" id="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="dateTo" class="col-sm-2 col-form-label">Date To:</label>
                        <div class="col-sm-10">
                            <input type="date" class="w-100 p-2 border border-3 border-light rounded" name="toDate" id="">
                        </div>
                    </div>
                    <div class="w-25">
                        <input type="submit" class="btn btn-primary p-2 border border-5 border-primary rounded w-100" value="Find">
                    </div>

                </form>
            </div>
            <div class="my-2 mx-md-5 p-3 border border-1 border-secondary rounded col-md-5 col-sm-12 text-light" style="background: #0a9396;">
                <form action="checkemployeeWise.php" method="POST">
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
                        <label for="dateFrom" class="col-sm-2 col-form-label">Date from:</label>
                        <div class="col-sm-10">
                            <input type="date" class="w-100 p-2 border border-3 border-light rounded" name="fromDate" id="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="dateTo" class="col-sm-2 col-form-label">Date To:</label>
                        <div class="col-sm-10">
                            <input type="date" class="w-100 p-2 border border-3 border-light rounded" name="toDate" id="">
                        </div>
                    </div>
                    <div class="w-25">
                        <input type="submit" class="btn btn-secondary p-2 border border-5 border-secondary rounded w-100" value="Find">
                    </div>
                </form>
            </div>
        </div>
    </section>



</body>

</html>
<?php
include_once('footer.php')

?>