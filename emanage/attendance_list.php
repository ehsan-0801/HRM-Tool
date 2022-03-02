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
                <form action="checkDateWIse.php" method="POST" class="px-md-5">
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
            <form action="checkemployeeWise.php" method="POST">
                    Employee name:
                    <select name="name" id="name">
                <?php
                $sql = 'SELECT * FROM employee_info';
                $result = $conn->query($sql);
                if (mysqli_num_rows($result) < 0){
                    echo 'No value Found';
                }
                else{
                    while($row = $result->fetch_assoc()) {
                        echo "
                        <option value='".$row["id"]."' name='' >".$row["name"]."</option>";
                      
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
    </section>



</body>

</html>
<?php
include_once('footer.php')

?>