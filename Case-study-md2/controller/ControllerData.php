<?php

namespace control;

use dbStudent\ConnectDB;
use model\Room;
use model\Student;
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
            header('location: index.php');
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

            $room = new Room($maLop, $tenLop, $khoaHoc, $heDT);
            $this->process->addClass($room);
            $message = "Add Completed";
            include 'view/class/addClass.php';
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
//            var_dump($maLop);
            include "view/class/deleteClass.php";
        } else {
            $maLop1 = $_POST['maLop'];
//           var_dump($maLop1);
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

            $student = new Student($maSV, $tenSV, $gioiTinh, $ngaySinh, $queQuan, $maLop);
            $this->process->addStudent($student);
//            var_dump($student->maSV);
//            die();
            $this->process->addScoreStudent($student->maSV);

            $message = 'Add Complete';
            include "view/student/addStudent.php";
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

    public function deleteStudent(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $maSV = $_GET['MaSV'];
            var_dump($maSV);
            die();
            $this->process->deleteStudent($maSV);
            header('location: index.php?page=Student');
        }
    }
    public function detailStudent(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $maSV = $_REQUEST['MaSV'];
            $students = $this->process->informationStudent($maSV);
            include "view/student/viewStudent.php";
        }
    }

    public function addScore(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $maSV = $_GET['MaSV'];
//            $module1 = $_REQUEST['module1'];
//            $_SESSION['md1'] = $module1;
//            $module2 = $_REQUEST['module2'];
//            $_SESSION['md2'] = $module2;
//            $module3 = $_REQUEST['module3'];
//            $_SESSION['md3'] = $module3;
            $_SESSION['sv'] = $maSV;
            $student = $this->process->getIDStudent($maSV);
            $selectScore = $this->process->getScore($maSV);

            include "view/student/score.php";
        } else {
            $maSV = $_SESSION['sv'];
            $module1 = $_POST['module1'];
            $module2 = $_POST['module2'];
            $module3 = $_POST['module3'];
//
//            if (isset($_SESSION['md1'])){
//                $module1 = $_SESSION['md1'];
//            } else {
//                $module1 = $_POST['module1'];
//            }
//            if (isset($_SESSION['md2'])){
//                $module2 = $_SESSION['md2'];
//            } else {
//                $module2 = $_POST['module2'];
//            }
//            if (isset($_SESSION['md3'])){
//                $module3 = $_SESSION['md3'];
//            } else {
//                $module3 = $_POST['module3'];
//            }

            var_dump($module2);
            die();
        }
    }
}