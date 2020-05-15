<?php

namespace control;

use dbStudent\ConnectDB;
use model\Course;
use model\Room;
use model\Score;
use model\Student;
use model\Admin;
use wordDB\ProcessDB;

class ControllerData
{
    public $process;

    public function __construct()
    {
        $this->process = new ProcessDB();
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include 'view/login/login.php';
        } else {
            $user = $_REQUEST['UserName'];
            $password = $_REQUEST['password'];
            if ($this->process->login($user, $password) > 0) {
                $_SESSION['user'] = $user;
                header('location: index.php');
            }
        }
    }

    public function logout()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            unset($_SESSION['user']);
            header('location: ./index.php?page=login');
        }
    }

    public function viewClass()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $class = $this->process->getClass();
            include 'view/class/viewClass.php';
        }
    }

    public function createClass()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $kH = $this->process->getKhoaHoc();
            $heDaoTao = $this->process->getHeDT();
            include "view/class/addClass.php";
        } else {
            $maLop = $_REQUEST['maLop'];
            $tenLop = $_REQUEST['tenLop'];
            $khoaHoc = $_REQUEST['khoaHoc'];
            $heDT = $_REQUEST['heDT'];

            if (!$this->validateStudentID($maLop)) {
                $msgID = "Mã phải viết hoa, không chứa ký tự đặc biệt và không dài quá 6";
                include "view/class/addClass.php";
            } elseif (!$this->validateStudentName($tenLop)) {
                $msgName = "Tên không được có số và ký tự đặc biệt";
                include "view/class/addClass.php";
            } else {
                $room = new Room($maLop, $tenLop, $khoaHoc, $heDT);
                $this->process->addClass($room);
                $message = "Add Completed";
                include 'view/class/addClass.php';
            }
        }
    }

    public function editClass()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $maLop = $_REQUEST['MaLop'];
            $_SESSION['maLop'] = $maLop;
            $room = $this->process->getMaClass($maLop);
            $khoaHocs = $this->process->getKhoaHoc();
            $heDTs = $this->process->getHeDT();
            include "view/class/editClass.php";
        } else {
            $maLop = $_REQUEST['MaLop'];
            $room = $this->process->getMaClass($maLop);
            $khoaHocs = $this->process->getKhoaHoc();
            $heDTs = $this->process->getHeDT();
            $maLop1 = $_SESSION['maLop'];
            $tenLop1 = $_REQUEST['tenLop'];
            $khoaHoc1 = $_REQUEST['khoaHoc'];
            $heDT1 = $_REQUEST['heDT'];

            $room = new Room($maLop1, $tenLop1, $khoaHoc1, $heDT1);
            $this->process->updateClass($room);
            $message = "Edit Completed";
            include "view/class/editClass.php";
        }

    }

    public function deleteClass()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $maLop = $_REQUEST['MaLop'];
            $_SESSION['maLop'] = $maLop;
            $room = $this->process->getIdLop($maLop);
            include "view/class/deleteClass.php";
        } else {
            $maLop1 = $_POST['maLop'];
            $this->process->deleteClass($maLop1);
            header('location: index.php');
        }
    }

    public function viewStudent()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $students = $this->process->getStudent();
            include "view/student/viewListStudent.php";
        }
    }

    public function getStudentClass()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $students = $this->process->getStudentClass($_REQUEST['MaLop']);
            include "view/class/viewStudentClass.php";
        }
    }

    public function addStudent()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $room = $this->process->getClass();
            include "view/student/addStudent.php";
        } else {
            $maSV = $_POST['maSV'];
            $tenSV = $_POST['tenSV'];
            $gioiTinh = $_POST['gioiTinh'];
            $ngaySinh = $_POST['ngaySinh'];
            $queQuan = $_POST['queQuan'];
            $maLop = $_POST['lop'];
            if (!$this->validateStudentID($maSV)) {
                $msgID = "Mã phải viết hoa, không chứa ký tự đặc biệt và không dài quá 6";
                include "view/student/addStudent.php";
            } elseif (!$this->validateStudentName($tenSV)) {
                $msgName = "Tên không được có số và ký tự đặc biệt";
                include "view/student/addStudent.php";
            } elseif (empty($ngaySinh)) {
                $msgBirth = "Ngày sinh không được để trống";
                include "view/student/addStudent.php";
            } elseif (!$this->validateStudentName($queQuan)) {
                $msgCountry = "Quê quán/Địa chỉ không được có số và ký tự đặc biệt";
                include "view/student/addStudent.php";
            } else {
                $student = new Student($maSV, $tenSV, $gioiTinh, $ngaySinh, $queQuan, $maLop);
                $this->process->addStudent($student);
                $this->process->addScoreStudent($student->maSV);
                $message = 'Add Complete';
                include "view/student/addStudent.php";
            }

        }
    }

    public function editStudent()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $maSV = $_GET['MaSV'];
            $_SESSION['maSV'] = $maSV;
            $students = $this->process->getIDStudent($maSV);
            $room = $this->process->getIdLop($students['Lop']);
            $class = $this->process->getClass();
            include 'view/student/editStudent.php';
        } else {
            $maSV = $_SESSION['maSV'];
            $tenSV = $_POST['tenSV'];
            $gioiTinh = $_POST['gioiTinh'];
            $ngaySinh = $_POST['ngaySinh'];
            $queQuan = $_POST['queQuan'];
            $lop = $_POST['lop'];

            $student = new Student($maSV, $tenSV, $gioiTinh, $ngaySinh, $queQuan, $lop);
            $this->process->updateStudent($student);
            $messageSt = "Update Complete";
            include "view/student/editStudent.php";
        }
    }

    public function deleteStudent()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $maSV = $_GET['MaSV'];
            $this->process->deleteScore($maSV);
            $this->process->deleteStudent($maSV);
            header('location: index.php?page=Student');
        }
    }

    public function deleteStudentInClass()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $maSV = $_GET['MaSV'];
            $this->process->deleteStudent($maSV);
            header('location: index.php?page=studentClass&MaLop');
        }
    }

    public function detailStudent()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $maSV = $_REQUEST['MaSV'];
            $arr = $this->process->informationStudent($maSV);
            include "view/student/viewStudent.php";
        }
    }

    public function addScore()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $maSV = $_GET['MaSV'];
            $_SESSION['sv'] = $maSV;
            $student = $this->process->getIDStudent($maSV);
            $selectScore = $this->process->getScore($maSV);
            include "view/student/score.php";
        } else {
            $maSV = $_SESSION['sv'];
            if ($_REQUEST['module1'] == '') {
                $module1 = null;
            } else {
                $module1 = $_REQUEST['module1'];
            }

            if ($_REQUEST['module2'] == '') {
                $module2 = null;
            } else {
                $module2 = $_REQUEST['module2'];
            }

            if ($_REQUEST['module3'] == '') {
                $module3 = null;
            } else {
                $module3 = $_REQUEST['module3'];
            }

            $score = new Score($maSV, $module1, $module2, $module3);
            $this->process->addScore($score);
            header('location: index.php?page=Student');

            include "view/student/score.php";
        }
    }

    public function findStudent()
    {
        if (isset($_REQUEST['keyword'])) {
            $keyword = $_REQUEST['keyword'];
            $students = $this->process->findStudent($keyword);
            include "view/student/viewStudent.php";
        } else {
            $students = $this->process->getStudent();
            include "view/student/viewStudent.php";

        }
    }

    public function viewAllCourse()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $viewCourse = $this->process->viewAllCourse();
            include "view/course/viewCourse.php";
        }
    }

    public function addCourse()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include "view/course/addCourse.php";
        } else {
            $maKH = $_REQUEST['maKH'];
            $tenKH = $_REQUEST['tenKH'];
            $description = $_REQUEST['text'];

            $course = new Course($maKH, $tenKH, $description);
            $this->process->addCourseDB($course);
            $result = 'Add Completed';
            include "view/course/addCourse.php";
        }
    }

    public function editCourse()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $maKH = $_REQUEST['MaKH'];
            $_SESSION['kh'] = $maKH;
            $course = $this->process->viewCourse($maKH);
            include "view/course/editCourse.php";
        } else {
            $maKH = $_SESSION['kh'];
            $tenKH = $_REQUEST['tenKH'];
            $description = $_REQUEST['text'];

            $course = new Course($maKH, $tenKH, $description);
            $this->process->editCourse($course);
            header('location: ./index.php?page=course');
            include "view/course/editCourse.php";
        }
    }

    public function viewDetailCourse()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $maKH = $_REQUEST['MaKH'];
            $detailCourse = $this->process->viewDetailCourse($maKH);
            include "view/course/viewDetailCourse.php";
        }
    }

    public function deleteCourse()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $maKH = $_GET['MaKH'];
            $this->process->deleteCourse($maKH);
            header('location: index.php?page=course');
        }
    }

    public function changePass()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include "view/admin/changePass.php";
        } else {
            $check = $this->process->checkPass($_SESSION['user']);
            if ($_REQUEST['oldPass'] != $check['Password']) {
                $error = "Mật khẩu cũ không khớp";
                include "view/admin/changePass.php";
            } elseif ($_REQUEST['oldPass'] == $_REQUEST['newPass']) {
                $error2 = "Mật khẩu mới không được trùng mật khẩu cũ";
                include "view/admin/changePass.php";
            } else {
                $newPass = $_POST['newPass'];
                $this->process->changePass($newPass, $_SESSION['user']);
                $message = "";
                include "view/admin/changePass.php";
            }
        }
    }

    public function createUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include "view/admin/addUser.php";
        } else {
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];

            $user = new Admin($username, $password);
            $this->process->createUser($user);
            $message = 'Tạo Thành Công';
            include "view/admin/addUser.php";
        }
    }

    public function validateStudentID($str)
    {
        $regexp = '/^[A-Z0-9]{1,6}$/';
        if (preg_match($regexp, $str)) {
            return true;
        }
        return false;
    }

    public function validateStudentName($str)
    {
        $regexp = '/^[A-Za-z]+([\ A-Za-z]+)*$/';
        if (preg_match($regexp, $str)) {
            return true;
        } else {
            return false;
        }
    }
}