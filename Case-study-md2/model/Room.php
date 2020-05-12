<?php

namespace model;

class Room
{
    public $maLop;
    public $tenLop;
    public $khoa;
    public $khoaHoc;
    public $heDT;
    public function __construct($maLop, $tenLop, $khoa, $khoaHoc, $heDT)
    {
        $this->maLop = $maLop;
        $this->tenLop = $tenLop;
        $this->khoa = $khoa;
        $this->khoaHoc = $khoaHoc;
        $this->heDT = $heDT;
    }
}