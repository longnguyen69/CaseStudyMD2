<?php

namespace connected;

class Student
{
    public $maSV;
    public $tenSV;
    public $gioiTinh;
    public $ngaySinh;
    public $queQuan;
    public $lop;
    public $image;
    public function __construct($maSV,$tenSV,$gioiTinh,$ngaySinh,$queQuan,$lop,$image)
    {
        $this->maSV = $maSV;
        $this->tenSV = $tenSV;
        $this->gioiTinh = $gioiTinh;
        $this->ngaySinh = $ngaySinh;
        $this->queQuan = $queQuan;
        $this->lop = $lop;
        $this->image = $image;

    }

    public function getMaSV()
    {
        return $this->maSV;
    }

    public function getTenSV()
    {
        return $this->tenSV;
    }

    public function getGioiTinh()
    {
        return $this->gioiTinh;
    }

    public function getNgaySinh()
    {
        return $this->ngaySinh;
    }

    public function getQueQuan()
    {
        return $this->queQuan;
    }

    public function getLop()
    {
        return $this->lop;
    }

    public function getImage()
    {
        return $this->image;
    }
}