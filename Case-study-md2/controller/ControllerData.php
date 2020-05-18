<?php
namespace control;

use dbStudent\ConnectDB;
use connected\Course;
use connected\Help;
use connected\Room;
use connected\Score;
use connected\Admin;
use connected\Student;
use wordDB\ProcessDB;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
                header('location: ./index.php');
                exit();
            } else {
                $error = "Wrong username or password";
                include 'view/login/login.php';
            }
        }
    }

    public function logout()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            unset($_SESSION['user']);
            header('location: ./index.php?page=login');
            exit();
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

            if ($this->process->checkClass($_REQUEST['maLop']) > 0){
                $error = 'Lớp đã tồn tại, Mời bạn tạo lại';
            } else {
                $maLop = $_REQUEST['maLop'];
                $tenLop = $_REQUEST['tenLop'];
                $khoaHoc = $_REQUEST['khoaHoc'];
                $heDT = $_REQUEST['heDT'];

                if (!$this->validateStudentID($maLop)) {
                    $msgID = "Mã phải viết hoa, không chứa ký tự đặc biệt và không dài quá 6";
//                    include "view/class/addClass.php";
                } elseif (!$this->validateStudentName($tenLop)) {
                    $msgName = "Tên không được có số và ký tự đặc biệt";
//                    include "view/class/addClass.php";
                } else {
                    $room = new Room($maLop, $tenLop, $khoaHoc, $heDT);
                    $this->process->addClass($room);
                    $message = "Thêm thành công";
//                    include 'view/class/addClass.php';
                }
            }
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
            include "view/class/deleteClass.php";
        } else {
            $maLop1 = $_POST['maLop'];
            $this->process->deleteClass($maLop1);
            header('location: index.php');
            exit();
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
            if ($this->process->checkStudent($_POST['maSV']) > 0){
                $error = 'Đã tồn tại sinh viên này, mời bạn thêm lại';
            } else {
                $maSV = $_POST['maSV'];
                $tenSV = $_POST['tenSV'];
                $gioiTinh = $_POST['gioiTinh'];
                $ngaySinh = $_POST['ngaySinh'];
                $queQuan = $_POST['queQuan'];
                $maLop = $_POST['lop'];
                $image = $_FILES['image'];
                $nameFile = $image['name'];


                if (!$this->validateStudentID($maSV)) {
                    $msgID = "Mã phải viết hoa, không chứa ký tự đặc biệt và không dài quá 6";
//                    include "view/student/addStudent.php";
                } elseif (!$this->validateStudentName($tenSV)) {
                    $msgName = "Tên không được có số và ký tự đặc biệt";
//                    include "view/student/addStudent.php";
                } elseif (empty($ngaySinh)) {
                    $msgBirth = "Ngày sinh không được để trống";
//                    include "view/student/addStudent.php";
                } elseif (!$this->validateStudentName($queQuan)) {
                    $msgCountry = "Quê quán/Địa chỉ không được có số và ký tự đặc biệt";
//                    include "view/student/addStudent.php";
                } else {
                    $student = new Student($maSV, $tenSV, $gioiTinh, $ngaySinh, $queQuan, $maLop, $nameFile);
                    $this->process->addStudent($student);
                    $this->process->addScoreStudent($student->maSV);
                    move_uploaded_file($image['tmp_name'], 'uploads/' . $nameFile);
                    $message = 'Thêm thành công';
//                    include "view/student/addStudent.php";
                }
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
            $_SESSION['avatar'] = $students['avatar'];

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

            if ($_FILES['image']['name'] == "") {
                $image = $_SESSION['avatar'];
                $student = new Student($maSV, $tenSV, $gioiTinh, $ngaySinh, $queQuan, $lop, $image);
            } else {
                $image = $_FILES['image'];
                $nameFile = $image['name'];
                move_uploaded_file($image['tmp_name'], 'uploads/' . $nameFile);
                $student = new Student($maSV, $tenSV, $gioiTinh, $ngaySinh, $queQuan, $lop, $nameFile);
            }

            $this->process->updateStudent($student);
            $messageSt = "Cập nhật thành công";
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
            exit();
        }
    }

    public function deleteStudentInClass()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $maSV = $_GET['MaSV'];
            $this->process->deleteStudent($maSV);
            header('location: index.php?page=studentClass&MaLop');
            exit();
        }
    }

    public function detailStudent()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $maSV = $_REQUEST['MaSV'];
            $arr = $this->process->informationStudent($maSV);
            $check = $this->process->checkDiem($maSV);
//            var_dump($check);
//            die();
            if ($check['Module1'] == null || $check['Module2'] == null || $check['Module3'] == null) {
                $error = 'Bạn chưa học xong khóa học!';
            } else {
                $medium = ($check['Module1'] + $check['Module2'] + $check['Module3']) / 3;
                if ($medium < 5){
                    $message = 'Trung Bình';
                } elseif ($medium <7) {
                    $message = 'Khá';
                } else {
                    $message = 'Giỏi';
                }
            }
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

            if (!$this->validateScore($module1) && $module1 > 10) {
                $msgScore1 = "Điểm chỉ có thẻ là số và không lớn quá 10";
                include "view/student/score.php";
            } elseif ($this->validateScore($module2) && $module2 > 10) {
                $msgScore2 = "Điểm chỉ có thẻ là số và không lớn quá 10";
                include "view/student/score.php";
            } elseif ($this->validateScore($module3) && $module3 > 10) {
                $msgScore3 = "Điểm chỉ có thẻ là số và không lớn quá 10";
                include "view/student/score.php";
            } else {
                $score = new Score($maSV, $module1, $module2, $module3);
                $this->process->addScore($score);
                header('location: index.php?page=Student');
                exit();
//                include "view/student/score.php";
            }

            include "view/student/score.php";
        }
    }

    public function findStudent()
    {
        if (isset($_REQUEST['keyword'])) {
            $keyword = $_REQUEST['keyword'];
            $students = $this->process->findStudent($keyword);
            include "view/student/viewListStudent.php";
        } else {
            $students = $this->process->getStudent();
            include "view/student/viewListStudent.php";

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
            if ($this->process->checkCourse($_REQUEST['maKH'])>0){
                $error = "Khóa học này đã tồn tại, mời bạn tạo lại";
            } else {
                $maKH = $_REQUEST['maKH'];
                $tenKH = $_REQUEST['tenKH'];
                $description = $_REQUEST['text'];

                $course = new Course($maKH, $tenKH, $description);
                $this->process->addCourseDB($course);
                $result = 'Add Completed';
            }
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
            exit();
        }
        include "view/course/editCourse.php";
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
            exit();
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

            if ($this->process->checkUser($username) > 0){
                $errorCreateUser = "Tài khoản đã tồn tại, mời bạn tạo lại!";
            } else {
                $user = new Admin($username, $password);
                $this->process->createUser($user);
                $message = 'Tạo Thành Công';
            }
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

    public function validateScore($str)
    {
        $regexp = '/^[0-9]{1}$/';
        if (preg_match($regexp, $str)) {
            return true;
        } else {
            return false;
        }
    }

    public function helpAdmin(){
        if ($_SERVER['REQUEST_METHOD'] == "GET"){
            include "view/help/help.php";
        } else {

            include "PHPMailer-master/src/PHPMailer.php";
            include "PHPMailer-master/src/Exception.php";
            include "PHPMailer-master/src/OAuth.php";
            include "PHPMailer-master/src/POP3.php";
            include "PHPMailer-master/src/SMTP.php";
            $obj = $this->process->getUser($_SESSION['user']);
            $ids = $obj['id'];
            $idUser = $_SESSION['user'];
            $phone = $_REQUEST['phone'];
            $question = $_REQUEST['question'];

            $mail = new PHPMailer(true);
            try {
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'mailtestprotocol@gmail.com';
                $mail->Password   = 'qgwjlazwreuahyma'; //mat khau xac minh hai buoc cua google
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('mailtestprotocol@gmail.com', 'Guest');
                $mail->addAddress('nguyenthanhlongtlck@gmail.com', 'Guest');

                $mail->Subject = $phone;
                $mail->Body    = $question;
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

            $objHelp = new Help($ids,$idUser,$phone,$question);
            $this->process->createHelp($objHelp);
            $message = 'Gửi thành công, Cảm ơn bạn chúng tôi sẽ phản hồi bạn sớm nhất có th!ể';
            include "view/help/help.php";
        }
    }
}