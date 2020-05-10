<?php
namespace control;

use dbStudent\ConnectDB;
use wordDB\ProcessDB;

class ControllerData
{
    public $process;
    public function __construct()
    {
        $this->process = new ProcessDB();
    }

    public function login(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            include 'view/login/login.php';
        }
//        else {
//            $user = $_REQUEST['UserName'];
//            $password = $_REQUEST['password'];
//        }

    }
//    public function addClass(){
//        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//            $class = $_REQUEST['class'];
//            $className = $_REQUEST['className'];
//            $style = $_REQUEST['style'];
//            $course = $_REQUEST['course'];
//            $training = $_REQUEST['training'];
//
//
//        }
//    }
}