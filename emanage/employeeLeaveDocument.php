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
            <div class="my-2 mx-md-5 p-3 border border-1 border-secondary rounded col-md-5 col-sm-12">
                <form action="" method="POST" class="px-md-5">
                    Date from:
                    <input type="date" name="fromDate" id="">
                    <br>
                    Date to:
                    <input type="date" name="toDate" id="">
                    <br>
                    <input class="btn btn-outline-primary px-3" type="submit" name="submit" value="Find">
                </form>
            </div>
            <div class="my-2 mx-md-5 p-3 border border-1 border-secondary rounded col-md-5 col-sm-12">
                <form action="" method="POST">
                    Employee name:
                    <select name="name" id="name">
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
                    <br>
                    Date from:
                    <input type="date" name="fromDate" id=""> <br>
                    Date to:
                    <input type="date" name="toDate" id="">
                    <br>
                    <input class="btn btn-outline-primary px-3" type="submit" value="Find">
                </form>
            </div>
        </div>
        <?php
        $sql = 'SELECT *
            FROM leave_manage
            WHERE MONTH(date) = MONTH(CURRENT_DATE())
            AND YEAR(date) = YEAR(CURRENT_DATE())';
        $result = $conn->query($sql);
        if (mysqli_num_rows($result) < 0) {
            echo 'No value Found';
        } else {
            var_dump($_REQUEST);
        }
        ?>
        <table class="table table-info table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </section>



</body>

</html>
<?php
include_once('footer.php')

?>