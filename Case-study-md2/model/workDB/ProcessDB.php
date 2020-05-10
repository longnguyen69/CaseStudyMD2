<?php

namespace wordDB;

//use dbStudent\ConnectDB;

use dbStudent\ConnectDB;

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
        $sql = "select * from Users where UserName = :userName && Password = :password";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(
            'userName' => $user,
            'password' => $password
        ));
        return $stmt->rowCount();
    }
}