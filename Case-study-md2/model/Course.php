<?php


namespace model;


class Course
{
    public $maKH;
    public $tenKH;
    public $description;
    public function __construct($maKH,$tenKH,$description)
    {
        $this->maKH = $maKH;
        $this->tenKH = $tenKH;
        $this->description = $description;
    }
}