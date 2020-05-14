<?php


namespace model;


class Score
{
    public $maSV;
    public $module1;
    public $module2;
    public $module3;

    public function __construct($maSV, $module1, $module2, $module3)
    {
        $this->maSV = $maSV;
        $this->module1 = $module1;
        $this->module2 = $module2;
        $this->module3 = $module3;
    }
}