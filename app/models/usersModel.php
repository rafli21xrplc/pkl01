<?php

class usersModel
{
    private $db;
    private $qr;
    private $conn;
    public function __construct()
    {
        $this->db = new DATABASE;
    }

    public function mysqli_query($username, $email)
    {
        $this->qr = mysqli_query($this->conn, "SELECT * FROM login WHERE username = '$username' OR email = '$username'");
        return $this->qr;
    }
}
