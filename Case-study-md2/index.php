<?php
session_start();
require "model/Room.php";
require "model/Student.php";
require "model/Score.php";
require "model/Course.php";
require "model/Admin.php";
require "model/Help.php";
require "model/connectDB/ConnectDB.php";
require "model/workDB/ProcessDB.php";
require "controller/ControllerData.php";
?>
<!doctype html>
<html lang="en">
<head>
    <title>Manager Student</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="view/admin/sidebar-04/css/style.css">
        <link rel="stylesheet" href="css/myStyle.css" type="text/css">
        <link rel="stylesheet" href="css/footer.css" type="text/css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body style="background-color: #9999ff">
<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <div class="custom-menu">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
                <i class="fa fa-bars"></i>
                <span class="sr-only">Toggle Menu</span>
            </button>
        </div>
        <h1><a href="index.php" class="logo">Manager Student</a></h1>
        <ul class="list-unstyled components mb-5">
            <li class="active">
                <a href="./index.php"><span class="fa fa-home mr-3"></span> Home</a>
            </li>
            <li>
                <a href="./index.php?page=Student"><span class="fa fa-user mr-3"></span> Sinh Viên</a>
            </li>
            <li>
                <a href="./index.php?page=lop"><span class="fa fa-sticky-note mr-3"></span> Lớp</a>
            </li>
            <li>
                <a href="./index.php?page=course"><span class="fa fa-sticky-note mr-3"></span> Khóa Học</a>
            </li>
            <li>
                <a href="./index.php?page=help"><span class="fa fa-paper-plane mr-3"></span> Trợ Giúp</a>
            </li>
            <?php if (isset($_SESSION['user'])): ?>
                <li>
                    <a href="#"><span class="fa fa-paper-plane mr-3"></span><?php echo strtoupper($_SESSION['user']) ?></a>
                </li>
                <li>
                    <a href="./index.php?page=changePass"><span class="fa fa-paper-plane mr-3"></span>Đổi Mật Khẩu</a>
                </li>
                <li>
                    <a href="./index.php?page=createUser"><span class="fa fa-paper-plane mr-3"></span>Thêm ADMIN</a>
                </li>
                <li>
                    <a href="./index.php?page=logout"><span class="fa fa-paper-plane mr-3"></span>Đăng Xuất</a>
                </li>
            <?php else: ?>
                <li>
                    <a href="./index.php?page=login"><span class="fa fa-paper-plane mr-3"></span>Đăng Nhập</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
    <div id="content" class="p-4 p-md-5 pt-5 col-md-10">
        <h2 class="mb-4">Trung Tâm Đào Tạo Tin Học Double L</h2>
        <div class="card-body">
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
                    if (isset($_SESSION['user'])) {
                        $controller->addStudent();
                        break;
                    } else {
                        $controller->login();
                        break;
                    }
                case 'editSV':
                    if (isset($_SESSION['user'])) {
                        $controller->editStudent();
                        break;
                    } else {
                        $controller->login();
                        break;
                    }
                case 'deleteSV':
                    if (isset($_SESSION['user'])) {
                        $controller->deleteStudent();
                        break;
                    } else {
                        $controller->login();
                        break;
                    }
                case 'deleteSVClass':
                    if (isset($_SESSION['user'])) {
                        $controller->deleteStudentInClass();
                        break;
                    } else {
                        $controller->login();
                        break;
                    }
                case 'AddScore':
                    if (isset($_SESSION['user'])) {
                        $controller->addScore();
                        break;
                    } else {
                        $controller->login();
                        break;
                    }
                case 'detail':
                    if (isset($_SESSION['user'])) {
                        $controller->detailStudent();
                        break;
                    } else {
                        $controller->login();
                        break;
                    }
                case 'course':
                    $controller->viewAllCourse();
                    break;
                case 'addCourse':
                    if (isset($_SESSION['user'])) {
                        $controller->addCourse();
                        break;
                    } else {
                        $controller->login();
                        break;
                    }
                case 'editCourse':
                    if (isset($_SESSION['user'])) {
                        $controller->editCourse();
                        break;
                    } else {
                        $controller->login();
                        break;
                    }
                case 'detailCourse':
                    if (isset($_SESSION['user'])) {
                        $controller->viewDetailCourse();
                        break;
                    } else {
                        $controller->login();
                        break;
                    }
                case 'deleteCourse':
                    if (isset($_SESSION['user'])) {
                        $controller->deleteCourse();
                        break;
                    } else {
                        $controller->login();
                        break;
                    }
                case 'changePass':
                    if (isset($_SESSION['user'])) {
                        $controller->changePass();
                        break;
                    } else {
                        $controller->login();
                        break;
                    }
                case 'createUser':
                    if (isset($_SESSION['user'])) {
                        $controller->createUser();
                        break;
                    } else {
                        $controller->login();
                        break;
                    }
                case 'help':
                    if (isset($_SESSION['user'])) {
                        $controller->helpAdmin();
                        break;
                    } else {
                        $controller->login();
                        break;
                    }
                case 'search':
                    $controller->findStudent();
                    break;
            }
            ?>
        </div>
    </div>
</div>
<div class="container">

    <footer class="row">
        <div class="sozial col-xs-12 col-sm-6 col-sm-push-6">
            <ul class="row">
                <li class="col-xs-6 col-sm-2">
                    <a href="https://www.facebook.com/hirobaymaxgo">
                        <img class="logo"
                             src="https://cdn2.iconfinder.com/data/icons/black-white-social-media/32/online_social_media_facebook-128.png">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-2">
                    <a href="#">
                        <img class="logo"
                             src="https://cdn2.iconfinder.com/data/icons/black-white-social-media/32/twitter_online_social_media-128.png">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-2">
                    <a href="https://www.instagram.com/thanhlongsp/">
                        <img class="logo"
                             src="https://cdn2.iconfinder.com/data/icons/black-white-social-media/32/instagram_online_social_media_photo-128.png">
                    </a>
                </li>
                <li class="col-xs-6 col-sm-2">
                    <a href="https://mail.google.com/mail/u/0/#inbox?compose=GTvVlcSGKnKwWtxgXgsplcTqlCcnRfxXGTrKdNdkDrthBkHVTtpmxTqzDVspGXfpCMVtTkvPKQfMS">
                        <img class="logo"
                             src="https://cdn2.iconfinder.com/data/icons/black-white-social-media/32/online_social_media_google_plus-128.png">
                    </a>
                </li>
            </ul>
        </div>
        <div class="copyright col-xs-12 col-sm-3 col-sm-pull-6">
            <p> Copyright © 2020 <b><span style="color: blue">Double L</span></b></p>
        </div>
        <div class="impressum col-xs-12 col-sm-3 col-sm-pull-6">
            <p> Hotline: 098 75 52 685 </p>
        </div>
    </footer>
</div>

<script src="js/style.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script src="view/admin/sidebar-04/js/jquery.min.js"></script>
<script src="view/admin/sidebar-04/js/popper.js"></script>
<script src="view/admin/sidebar-04/js/bootstrap.min.js"></script>
<script src="view/admin/sidebar-04/js/main.js"></script>
</body>
</html>
<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"-->
<!--          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
<!--    <title>Manager Student</title>-->
<!--    <link rel="stylesheet" href="css/myStyle.css" type="text/css">-->
<!--    <link rel="stylesheet" href="css/footer.css" type="text/css">-->
<!--</head>-->
<!--<body style="background-color: #9999ff;">-->
<!--<div class="hed">-->
<!--    <ul class="nav justify-content-end">-->
<!--        <li class="nav-item">-->
<!--            <a class="nav-link active" href="./index.php">Trang chủ</a>-->
<!--        </li>-->
<!--        <ul class="navbar-nav">-->
<!--            <li class="nav-item dropdown">-->
<!--                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"-->
<!--                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                    Danh Sách-->
<!--                </a>-->
<!--                <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
<!--                    <a class="dropdown-item" href="index.php?page=Student">Sinh Viên</a>-->
<!--                    <div class="dropdown-divider"></div>-->
<!--                    <a class="dropdown-item" href="index.php?page=lop">Lớp</a>-->
<!--                    <div class="dropdown-divider"></div>-->
<!--                    <a class="dropdown-item" href="index.php?page=course">Khóa Học</a>-->
<!--                </div>-->
<!--            </li>-->
<!--        </ul>-->
<!--        <li class="nav-item">-->
<!--            <p class="nav-link" href="#"></p>-->
<!--        </li>-->
<!--        --><?php //if (isset($_SESSION['user'])): ?>
<!--            <ul class="navbar-nav">-->
<!--                <li class="nav-item dropdown">-->
<!--                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"-->
<!--                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                        --><?php //echo strtoupper($_SESSION['user']) ?>
<!--                    </a>-->
<!--                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
<!--                        <a class="dropdown-item"-->
<!--                           href="view/admin/startbootstrap-sb-admin-2-gh-pages/index.html">Setting</a>-->
<!--                        <div class="dropdown-divider"></div>-->
<!--                        <a class="dropdown-item" href="index.php?page=changePass">Change Password</a>-->
<!--                        <div class="dropdown-divider"></div>-->
<!--                        <a class="dropdown-item" href="index.php?page=createUser">Create User</a>-->
<!--                        <div class="dropdown-divider"></div>-->
<!--                        <a  class="dropdown-item" href="./index.php?page=help">Trợ Giúp</a>-->
<!--                        <div class="dropdown-divider"></div>-->
<!--                        <a class="dropdown-item" href="./index.php?page=logout">Logout</a>-->
<!--                    </div>-->
<!--                </li>-->
<!--            </ul>-->
<!--            <li class="nav-item">-->
<!--                <p class="nav-link" href="#"></p>-->
<!--            </li>-->
<!--        --><?php //else: ?>
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="./index.php?page=login">Đăng Nhập</a>-->
<!--            </li>-->
<!--        --><?php //endif ?>
<!--    </ul>-->
<!--</div>-->
<!--<div class="col">-->
<!--    <h1>-->
<!--        Trung Tâm Đào Tạo Tin Học Double L-->
<!--        <small class="text-muted">Version 2.1</small>-->
<!--    </h1>-->
<!--    <div class="card-body">-->
<!--        --><?php
//        $controller = new \control\ControllerData();
//
//        $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : null;
//        switch ($page) {
//            case 'login':
//                $controller->login();
//                break;
//            case 'logout':
//                $controller->logout();
//                break;
//            case 'lop':
//                $controller->viewClass();
//                break;
//            case 'studentClass':
//                $controller->getStudentClass();
//                break;
//            case 'edit':
//                if (isset($_SESSION['user'])) {
//                    $controller->editClass();
//                    break;
//                } else {
//                    $controller->login();
//                    break;
//                }
//            case 'create':
//                if (isset($_SESSION['user'])) {
//                    $controller->createClass();
//                    break;
//                } else {
//                    $controller->login();
//                    break;
//                }
//            case 'delete':
//                if (isset($_SESSION['user'])) {
//                    $controller->deleteClass();
//                    break;
//                } else {
//                    $controller->login();
//                    break;
//                }
//            case 'Student':
//                $controller->viewStudent();
//                break;
//            case 'createStudent':
//                if (isset($_SESSION['user'])) {
//                    $controller->addStudent();
//                    break;
//                } else {
//                    $controller->login();
//                    break;
//                }
//            case 'editSV':
//                if (isset($_SESSION['user'])) {
//                    $controller->editStudent();
//                    break;
//                } else {
//                    $controller->login();
//                    break;
//                }
//            case 'deleteSV':
//                if (isset($_SESSION['user'])) {
//                    $controller->deleteStudent();
//                    break;
//                } else {
//                    $controller->login();
//                    break;
//                }
//            case 'deleteSVClass':
//                if (isset($_SESSION['user'])) {
//                    $controller->deleteStudentInClass();
//                    break;
//                } else {
//                    $controller->login();
//                    break;
//                }
//            case 'AddScore':
//                if (isset($_SESSION['user'])) {
//                    $controller->addScore();
//                    break;
//                } else {
//                    $controller->login();
//                    break;
//                }
//            case 'detail':
//                if (isset($_SESSION['user'])) {
//                    $controller->detailStudent();
//                    break;
//                } else {
//                    $controller->login();
//                    break;
//                }
//            case 'course':
//                $controller->viewAllCourse();
//                break;
//            case 'addCourse':
//                if (isset($_SESSION['user'])) {
//                    $controller->addCourse();
//                    break;
//                } else {
//                    $controller->login();
//                    break;
//                }
//            case 'editCourse':
//                if (isset($_SESSION['user'])) {
//                    $controller->editCourse();
//                    break;
//                } else {
//                    $controller->login();
//                    break;
//                }
//            case 'detailCourse':
//                if (isset($_SESSION['user'])) {
//                    $controller->viewDetailCourse();
//                    break;
//                } else {
//                    $controller->login();
//                    break;
//                }
//            case 'deleteCourse':
//                if (isset($_SESSION['user'])) {
//                    $controller->deleteCourse();
//                    break;
//                } else {
//                    $controller->login();
//                    break;
//                }
//            case 'changePass':
//                if (isset($_SESSION['user'])) {
//                    $controller->changePass();
//                    break;
//                } else {
//                    $controller->login();
//                    break;
//                }
//            case 'createUser':
//                if (isset($_SESSION['user'])) {
//                    $controller->createUser();
//                    break;
//                } else {
//                    $controller->login();
//                    break;
//                }
//            case 'help':
//                if (isset($_SESSION['user'])) {
//                    $controller->helpAdmin();
//                    break;
//                } else {
//                    $controller->login();
//                    break;
//                }
//        }
//        ?>
<!--    </div>-->
<!--</div>-->
<!--<div class="container-fluid p-0">-->
<!--    <div class="row" id="body-row">-->
<!--        <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">-->
<!--            <ul class="list-group">-->
<!--                <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">-->
<!--                    <small>MANAGER STUDENT</small>-->
<!--                </li>-->
<!--                <a href="./index.php" class="bg-dark list-group-item list-group-item-action">-->
<!--                    <div class="d-flex w-100 justify-content-start align-items-center">-->
<!--                        <span class="fa fa-tasks fa-fw mr-3"></span>-->
<!--                        <span class="menu-collapsed">Trang chủ</span>-->
<!--                    </div>-->
<!--                </a>-->
<!--                <a href="#submenu1" data-toggle="collapse" aria-expanded="false"-->
<!--                   class="bg-dark list-group-item list-group-item-action flex-column align-items-start">-->
<!--                    <div class="d-flex w-100 justify-content-start align-items-center">-->
<!--                        <span class="fa fa-dashboard fa-fw mr-3"></span>-->
<!--                        <span class="menu-collapsed">Tùy Chọn</span>-->
<!--                        <span class="submenu-icon ml-auto"></span>-->
<!--                    </div>-->
<!--                </a>-->
<!--                <div id='submenu1' class="collapse sidebar-submenu">-->
<!--                    <a href="index.php?page=Student" class="list-group-item list-group-item-action bg-dark text-white">-->
<!--                        <span class="menu-collapsed">Sinh viên</span>-->
<!--                    </a>-->
<!--                    <a href="index.php?page=lop" class="list-group-item list-group-item-action bg-dark text-white">-->
<!--                        <span class="menu-collapsed">Lớp</span>-->
<!--                    </a>-->
<!--                    <a href="index.php?page=course" class="list-group-item list-group-item-action bg-dark text-white">-->
<!--                        <span class="menu-collapsed">Khóa Học</span>-->
<!--                    </a>-->
<!--                </div>-->
<!--                --><?php //if (isset($_SESSION['user'])): ?>
<!--                    <a href="#submenu2" data-toggle="collapse" aria-expanded="false"-->
<!--                       class="bg-dark list-group-item list-group-item-action flex-column align-items-start">-->
<!--                        <div class="d-flex w-100 justify-content-start align-items-center">-->
<!--                            <span class="fa fa-user fa-fw mr-3"></span>-->
<!--                            <span class="menu-collapsed">--><?php //echo strtoupper($_SESSION['user']); ?><!--</span>-->
<!--                            <span class="submenu-icon ml-auto"></span>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                    <div id='submenu2' class="collapse sidebar-submenu">-->
<!--                        <a href="index.php?page=changePass"-->
<!--                           class="list-group-item list-group-item-action bg-dark text-white">-->
<!--                            <span class="menu-collapsed">Đổi mật khẩu</span>-->
<!--                        </a>-->
<!--                        <a href="index.php?page=createUser"-->
<!--                           class="list-group-item list-group-item-action bg-dark text-white">-->
<!--                            <span class="menu-collapsed">Thêm admin</span>-->
<!--                        </a>-->
<!--                        <a href="./index.php?page=logout"-->
<!--                           class="list-group-item list-group-item-action bg-dark text-white">-->
<!--                            <span class="menu-collapsed">Đăng xuất</span>-->
<!--                        </a>-->
<!--                    </div>-->
<!--                --><?php //else: ?>
<!--                    <a href="index.php?page=login" class="bg-dark list-group-item list-group-item-action">-->
<!--                        <div class="d-flex w-100 justify-content-start align-items-center">-->
<!--                            <span class="fa fa-tasks fa-fw mr-3"></span>-->
<!--                            <span class="menu-collapsed">Đăng Nhập</span>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                --><?php //endif; ?>
<!--                <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">-->
<!--                    <small>OPTIONS</small>-->
<!--                </li>-->
<!--                <a href="./index.php?page=help" class="bg-dark list-group-item list-group-item-action">-->
<!--                    <div class="d-flex w-100 justify-content-start align-items-center">-->
<!--                        <span class="fa fa-question fa-fw mr-3"></span>-->
<!--                        <span class="menu-collapsed">Trợ Giúp</span>-->
<!--                    </div>-->
<!--                </a>-->
<!--                <a href="#" class="bg-dark list-group-item list-group-item-action">-->
<!--                    <div class="d-flex w-100 justify-content-start align-items-center">-->
<!--                        <span class="fa fa-envelope-o fa-fw mr-3"></span>-->
<!--                        <span class="menu-collapsed">Messages <span class="badge badge-pill badge-primary ml-2">5</span></span>-->
<!--                    </div>-->
<!--                </a>-->
<!---->
<!--            </ul>-->
<!--        </div>-->
<!--        -->
<!--    </div>-->
<!--</div>-->
<!--</div>-->
<!---->
<!---->
<!--<script src="js/style.js" type="text/javascript"></script>-->
<!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"-->
<!--        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"-->
<!--        crossorigin="anonymous"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"-->
<!--        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"-->
<!--        crossorigin="anonymous"></script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"-->
<!--        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"-->
<!--        crossorigin="anonymous"></script>-->
<!---->
<!---->
<!--<div class="container">-->
<!---->
<!--    <footer class="row">-->
<!--        <div class="sozial col-xs-12 col-sm-6 col-sm-push-6">-->
<!--            <ul class="row">-->
<!--                <li class="col-xs-6 col-sm-2">-->
<!--                    <a href="https://www.facebook.com/hirobaymaxgo">-->
<!--                        <img class="logo"-->
<!--                             src="https://cdn2.iconfinder.com/data/icons/black-white-social-media/32/online_social_media_facebook-128.png">-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li class="col-xs-6 col-sm-2">-->
<!--                    <a href="#">-->
<!--                        <img class="logo"-->
<!--                             src="https://cdn2.iconfinder.com/data/icons/black-white-social-media/32/twitter_online_social_media-128.png">-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li class="col-xs-6 col-sm-2">-->
<!--                    <a href="https://www.instagram.com/thanhlongsp/">-->
<!--                        <img class="logo"-->
<!--                             src="https://cdn2.iconfinder.com/data/icons/black-white-social-media/32/instagram_online_social_media_photo-128.png">-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li class="col-xs-6 col-sm-2">-->
<!--                    <a href="https://mail.google.com/mail/u/0/#inbox?compose=GTvVlcSGKnKwWtxgXgsplcTqlCcnRfxXGTrKdNdkDrthBkHVTtpmxTqzDVspGXfpCMVtTkvPKQfMS">-->
<!--                        <img class="logo"-->
<!--                             src="https://cdn2.iconfinder.com/data/icons/black-white-social-media/32/online_social_media_google_plus-128.png">-->
<!--                    </a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->
<!--        <div class="copyright col-xs-12 col-sm-3 col-sm-pull-6">-->
<!--            <p> Copyright © 2020 <b><span style="color: blue">Double L</span></b></p>-->
<!--        </div>-->
<!--        <div class="impressum col-xs-12 col-sm-3 col-sm-pull-6">-->
<!--            <p> Hotline: 098 75 52 685 </p>-->
<!--        </div>-->
<!--    </footer>-->
<!--</div>-->
<!--</body>-->
<!--</html>-->
