<?php

namespace model;

class Student
{
    public $maSV;
    public $tenSV;
    public $gioiTinh;
    public $ngaySinh;
    public $queQuan;
    public $lop;
    public function __construct($maSV,$tenSV,$gioiTinh,$ngaySinh,$queQuan,$lop)
    {
        $this->maSV = $maSV;
        $this->tenSV = $tenSV;
        $this->gioiTinh = $gioiTinh;
        $this->ngaySinh = $ngaySinh;
        $this->queQuan = $queQuan;
        $this->lop = $lop;
    }
}