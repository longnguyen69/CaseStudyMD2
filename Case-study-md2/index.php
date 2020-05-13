<?php
session_start();
require "model/Room.php";
require "model/Student.php";
require "model/connectDB/ConnectDB.php";
require "model/workDB/ProcessDB.php";
require "controller/ControllerData.php";


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>

</head>
<body>

<div class="hed">
    <ul class="nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link active" href="./index.php">Trang chủ</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=lop">Lớp</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Khóa học</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=Student">Sinh viên</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Môn học</a>
        </li>
        <li class="nav-item">
            <p class="nav-link" href="#"></p>
        </li>
        <?php if (isset($_SESSION['user'])): ?>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo strtoupper($_SESSION['user']) ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Setting</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="./index.php?page=logout">Logout</a>
                    </div>
                </li>
            </ul>
            <li class="nav-item">
                <p class="nav-link" href="#"></p>
            </li>
        <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="./index.php?page=login">Đăng Nhập</a>
            </li>
        <?php endif ?>
    </ul>
</div>
<?php
$controller = new \control\ControllerData();

$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : null;
switch ($page) {
    case 'login':
        $controller->login();
        break;
    case 'logout':
        $controller->logout();
        break;
    case 'lop':
        $controller->viewClass();
        break;
    case 'studentClass':
        $controller->getStudentClass();
        break;
    case 'edit':
        if (isset($_SESSION['user'])) {
            $controller->editClass();
            break;
        } else {
            $controller->login();
            break;
        }
    case 'create':
        if (isset($_SESSION['user'])) {
            $controller->createClass();
            break;
        } else {
            $controller->login();
            break;
        }
    case 'delete':
        if (isset($_SESSION['user'])) {
            $controller->deleteClass();
            break;
        } else {
            $controller->login();
            break;
        }
    case 'Student':
        $controller->viewStudent();
        break;
    case 'createStudent':
        $controller->addStudent();
        break;
    case 'editSV':
        $controller->editStudent();
        break;
    case 'deleteSV':
        $controller->deleteStudent();
        break;
}
?>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>
