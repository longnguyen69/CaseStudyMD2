<?php
namespace dbStudent;

use PDO;
use PDOException;

class ConnectDB
{
    protected $userName;
    protected $password;

    public function __construct()
    {
        $this->userName = 'root';
        $this->password = 'Adda@12354';
    }

    public function connect()
    {
        $conn = null;
        try {
            $conn = new PDO('mysql:host=localhost;dbname=managerstudentMVC', $this->userName, $this->password);

        } catch (PDOException $exception) {
            return $exception->getMessage();
        }
        return $conn;
    }
}