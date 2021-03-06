<?php

namespace wordDB;

//use dbStudent\ConnectDB;

use dbStudent\ConnectDB;
use connected\Room;
use connected\Student;
use connected\Score;

class ProcessDB
{
    protected $conn;

    public function __construct()
    {
        $db = new ConnectDB();
        $this->conn = $db->connect();
    }

    //dang nhap he thong quan tri
    public function login($user, $password)
    {
        $sql = "select * from Users where UserName=:userName && Password=:password";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(
            'userName' => $user,
            'password' => $password
        ));
        return $stmt->rowCount();
    }
// Class
    // xem cac lop trong truong hoc
    public function getClass()
    {
        $sql = "select * from Lop";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll();
    }

    // them lop hoc
    public function addClass($room)
    {
        $sql = "INSERT INTO `Lop`(`MaLop`, `TenLop`, `KhoaHoc`, `HeDT`) VALUES (?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $room->maLop);
        $stmt->bindParam(2, $room->tenLop);
        $stmt->bindParam(3, $room->khoaHoc);
        $stmt->bindParam(4, $room->heDT);
        $stmt->execute();
    }

    //chinh sua lop(lay thong tin cua lop can chinh sua)
    public function getMaClass($maLop)
    {
        $sql = "SELECT * FROM `Lop` WHERE MaLop = '$maLop'";
        $stmt = $this->conn->query($sql);
        return $stmt->fetch();
    }

    //chinh sua lop(update so lieu)
    public function updateClass($room)
    {
        $sql = "UPDATE `Lop` SET `MaLop`=?,`TenLop`=?,`KhoaHoc`=?,`HeDT`=? WHERE `MaLop`=? ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $room->maLop);
        $stmt->bindParam(2, $room->tenLop);
        $stmt->bindParam(3, $room->khoaHoc);
        $stmt->bindParam(4, $room->heDT);
        $stmt->bindParam(5, $room->maLop);
        $stmt->execute();
    }

    // xoa lop
    public function deleteClass($maLop)
    {
        $sql = "DELETE FROM `Lop` WHERE MaLop = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $maLop);
        return $stmt->execute();
    }

    // hien thi khoa hoc
    public function getKhoaHoc()
    {
        $sql = "SELECT * FROM Khoahoc";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll();
    }

    // hien thi he DT
    public function getHeDT()
    {
        $sql = "SELECT * FROM `HeDT`";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll();
    }

    public function getIdLop($maLop)
    {
        $sql = "select * from Lop where MaLop = :malop";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['malop' => $maLop]);
        $arr = $stmt->fetch();
        return new Room($arr['MaLop'], $arr['TenLop'], $arr['KhoaHoc'], $arr['HeDT']);
    }

    // hien thi hoc sinh trong lop
    public function getStudentClass($maLop)
    {
        $sql = "SELECT * from Sinhvien join Lop on Sinhvien.Lop = Lop.MaLop JOIN Khoahoc on Khoahoc.MaKH = Lop.KhoaHoc JOIN HeDT ON Lop.HeDT = HeDT.MaHe JOIN Diem ON Diem.MaSV = Sinhvien.MaSV  where MaLop = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $maLop);
        $stmt->execute();
        return $stmt->fetchAll();
    }

// Student
    // hien thi sinh vien toan truong
    public function getStudent()
    {
        $sql = "SELECT * FROM `Sinhvien` join Lop on Sinhvien.Lop = Lop.MaLop";
        $stmt = $this->conn->query($sql);
        $results = $stmt->fetchAll();
        $arr = [];
        foreach ($results as $result){
            $student = new Student($result['MaSV'],$result['TenSV'],$result['GioiTinh'],$result['NgaySinh'],$result['QueQuan'],$result['Lop'],$result['avatar']);
            array_push($arr, $student);
        }
        return $arr;
    }

    // check sinh vien
    public function checkStudent($maSV){
        $sql = "SELECT * FROM `Sinhvien` WHERE MaSV = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1,$maSV);
        $stmt->execute();
        $stmt->fetch();
        return $stmt->rowCount();
    }
    // check lop
    public function checkClass($maLop){
        $sql = "SELECT * FROM `Lop` WHERE MaLop=?";
        $stmt= $this->conn->prepare($sql);
        $stmt->bindParam(1,$maLop);
        $stmt->execute();
        $stmt->fetch();
        return $stmt->rowCount();
    }

    // them moi sinh vien
    public function addStudent($student)
    {
        $sql = "INSERT INTO `Sinhvien`(`MaSV`, `TenSV`, `GioiTinh`, `NgaySinh`, `QueQuan`, `Lop`, `avatar`) VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $student->maSV);
        $stmt->bindParam(2, $student->tenSV);
        $stmt->bindParam(3, $student->gioiTinh);
        $stmt->bindParam(4, $student->ngaySinh);
        $stmt->bindParam(5, $student->queQuan);
        $stmt->bindParam(6, $student->lop);
        $stmt->bindParam(7, $student->image);
        $stmt->execute();
    }

    public function getIDStudent($maSV)
    {
        $sql = "SELECT * FROM `Sinhvien` WHERE MaSV = '$maSV'";
        $stmt = $this->conn->query($sql);
        return $stmt->fetch();
    }

    // sua thong tin sinh vien
    public function updateStudent($student)
    {
        $sql = "UPDATE `Sinhvien` SET `MaSV`=?,`TenSV`=?,`GioiTinh`=?,`NgaySinh`=?,`QueQuan`=?,`Lop`=?, `avatar`=? WHERE `MaSV`=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $student->maSV);
        $stmt->bindParam(2, $student->tenSV);
        $stmt->bindParam(3, $student->gioiTinh);
        $stmt->bindParam(4, $student->ngaySinh);
        $stmt->bindParam(5, $student->queQuan);
        $stmt->bindParam(6, $student->lop);
        $stmt->bindParam(7, $student->image);
        $stmt->bindParam(8, $student->maSV);
        $stmt->execute();
    }

    // xoa sinh vien
    public function deleteStudent($maSV)
    {
        $sql = "DELETE FROM `Sinhvien` WHERE `MaSV`=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $maSV);
        $stmt->execute();
    }

    // xoa diem
    public function deleteScore($maSV)
    {
        $sql = "DELETE FROM `Diem` WHERE `MaSV` = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $maSV);
        $stmt->execute();
    }

    // detail sinh vien
    public function informationStudent($maSV)
    {
        $sql = "SELECT * FROM Khoahoc JOIN Lop ON Khoahoc.MaKH = Lop.KhoaHoc JOIN Sinhvien ON Lop.MaLop = Sinhvien.Lop 
                JOIN Diem ON Sinhvien.MaSV = Diem.MaSV WHERE Sinhvien.MaSV = :maSV";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam('maSV', $maSV);
        $stmt->execute();
        return $stmt->fetch();
    }

    //them sinh vien vao bang diem
    public function addScoreStudent($maSV)
    {
        $default = null;
        $sql = "INSERT INTO `Diem`(`MaSV`, `Module1`, `Module2`, `Module3`) VALUES (?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $maSV);
        $stmt->bindParam(2, $default);
        $stmt->bindParam(3, $default);
        $stmt->bindParam(4, $default);
        $stmt->execute();
    }

    // lay thong tin bang diem cua mot sinh vien
    public function getScore($maSV)
    {
        $sql = "SELECT * FROM `Diem` WHERE MaSV ='$maSV'";
        $stmt = $this->conn->query($sql);
        return $stmt->fetch();
    }

    // update diem thi cho sinh vien
    public function addScore($score)
    {
        $sql = "UPDATE `Diem` SET `MaSV`=?,`Module1`=?,`Module2`=?,`Module3`=? WHERE `MaSV`=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $score->maSV);
        $stmt->bindParam(2, $score->module1);
        $stmt->bindParam(3, $score->module2);
        $stmt->bindParam(4, $score->module3);
        $stmt->bindParam(5, $score->maSV);
        $stmt->execute();
    }

    public function findStudent($keyword)
    {
        $sql = "SELECT * FROM `Sinhvien` WHERE TenSV LIKE '%$keyword%'";
        $stmt = $this->conn->query($sql);
        $results =  $stmt->fetchAll();
        $arr = [];
        foreach ($results as $result){
            $student = new Student($result['MaSV'],$result['TenSV'],$result['GioiTinh'],$result['NgaySinh'],$result['QueQuan'],$result['Lop'],$result['avatar']);
            array_push($arr, $student);
        }
        return $arr;
    }
    // xem cac khoa hoc
    public function viewAllCourse()
    {
        $sql = "SELECT * FROM `Khoahoc`";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll();
    }

    // kiem tra khoa hoc da ton tai chua
    public function checkCourse($maKH){
        $sql = "SELECT * FROM `Khoahoc` WHERE MaKH  = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1,$maKH);
        $stmt->execute();
        $stmt->fetch();
        return $stmt->rowCount();
    }

    // them khoa hoc
    public function addCourseDB($course)
    {
        $sql = "INSERT INTO `Khoahoc`(`MaKH`, `TenKH`, `MoTa`) VALUES (?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $course->maKH);
        $stmt->bindParam(2, $course->tenKH);
        $stmt->bindParam(3, $course->description);
        $stmt->execute();
    }

    // thong tin mot khoa hoc
    public function viewCourse($maKH)
    {
        $sql = "SELECT * FROM `Khoahoc` WHERE `MaKH`=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $maKH);
        $stmt->execute();
        return $stmt->fetch();
    }

    // sua khoa hoc
    public function editCourse($course)
    {
        $sql = "UPDATE `Khoahoc` SET `MaKH`=?,`TenKH`=?,`MoTa`=? WHERE `MaKH`=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $course->maKH);
        $stmt->bindParam(2, $course->tenKH);
        $stmt->bindParam(3, $course->description);
        $stmt->bindParam(4, $course->maKH);
        $stmt->execute();
    }

    // xem chi tiet khoa hco
    public function viewDetailCourse($maKH)
    {
        $sql = "SELECT * FROM `Khoahoc` WHERE MaKH = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $maKH);
        $stmt->execute();
        return $stmt->fetch();
    }

    // xoa khoa hoc
    public function deleteCourse($maKH)
    {
        $sql = "DELETE FROM `Khoahoc` WHERE `MaKH` = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $maKH);
        $stmt->execute();
    }

    // Kiem tra password co trung khong
    public function checkPass($user)
    {
        $sql = "SELECT `Password` FROM `Users` WHERE UserName = :UserName";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(
            'UserName' => $user
        ));
        return $stmt->fetch();
    }

    // Thay doi password
    public function changePass($newPass, $user)
    {
        $sql = "UPDATE `Users` SET `Password` = :Password WHERE UserName = :UserName";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(
            'Password' => $newPass,
            'UserName' => $user
        ));
    }

    // check hoc luc
    public function checkDiem($maSV){
        $sql = "SELECT * FROM `Diem` WHERE MaSV = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1,$maSV);
        $stmt->execute();
        return $stmt->fetch();
    }

    // kiem tra user truoc khi tao
    public function checkUser($user){
        $sql = "SELECT * FROM `Users` WHERE UserName = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1,$user);
        $stmt->execute();
        $stmt->fetch();
        return $stmt->rowCount();
    }

    // Tao user moi
    public function createUser($user)
    {
        $sql = "INSERT INTO `Users`(`id`, `UserName`, `Password`) VALUES (id,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $user->username);
        $stmt->bindParam(2, $user->password);
        $stmt->execute();
    }

    // lay thong tin user
    public function getUser($userName){
        $sql = "SELECT * FROM `Users` WHERE `UserName` = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $userName);
        $stmt->execute();
        return $stmt->fetch();
    }

    // them cau hoi
    public function createHelp($user){
        $sql = "INSERT INTO `Question`(`Id`, `UserName`, `Phone`, `Question`) VALUES (?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1,$user->id);
        $stmt->bindParam(2,$user->user);
        $stmt->bindParam(3,$user->phone);
        $stmt->bindParam(4,$user->question);
        $stmt->execute();
    }

}