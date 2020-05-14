<?php


namespace model;


class Admin
{
    protected $ID;
    protected $username;
    protected $password;

    public function __construct($password)
    {
        $this->password = $password;
    }
}