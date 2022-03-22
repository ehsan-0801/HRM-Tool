<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRM</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="attendance.php">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            attendance
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="attendance.php">Attedance Update</a></li>
                            <li><a class="dropdown-item" href="attendance_list.php">Attendance List</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Leave Management
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="leavePermit.php">Leave Permit</a></li>
                            <li><a class="dropdown-item" href="employeeLeaveApplication.php">Leave Application</a></li>
                            <li><a class="dropdown-item" href="employeeLeaveDocument.php">Employee leave documents</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Salary Management
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="employeeJoining.php">Employee Joining Info</a></li>
                            <li><a class="dropdown-item" href="employeeResigning.php">Employee Resigning Date</a></li>
                            <li><a class="dropdown-item" href="EmployeeJoiningInfoUpdate.php">Employee Joining Info Update</a></li>
                            <li><a class="dropdown-item" href="">Salary sheet</a></li>
                            <li><a class="dropdown-item" href="">Employee leave documents</a></li>
                        </ul>
                    </li>

            </div>
        </div>
    </nav>
</body>