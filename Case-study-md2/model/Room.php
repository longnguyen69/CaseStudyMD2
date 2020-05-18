<?php

namespace connected;

class Room
{
    public $maLop;
    public $tenLop;
    public $khoaHoc;
    public $heDT;
    public function __construct($maLop, $tenLop, $khoaHoc, $heDT)
    {
        $this->maLop = $maLop;
        $this->tenLop = $tenLop;
        $this->khoaHoc = $khoaHoc;
        $this->heDT = $heDT;
    }
}