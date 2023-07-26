<?php
session_start();

class Login extends Controller

{
    public $db, $conn, $model;
    public function __construct()
    {
        $this->db = new DATABASE;
        $this->conn = mysqli_connect('localhost', 'root', '', 'pkl01');
    }
    public function index()
    {
        if (!isset($_SESSION['tokens'])) {
            $datas['title'] = 'Login';
            $this->view('login', $datas);
        }
        $datas['title'] = 'Login';
        $datas['message'] = 'Please login again!!';
        $this->view('login', $datas);
    }

    public function validationLogin()
    {
        if (isset($_POST["submit"])) {
            $username = htmlspecialchars($_POST["username"]);
            $password = htmlspecialchars($_POST["password"]);
            $result = mysqli_query($this->conn, "SELECT * FROM users WHERE username = '$username' OR email = '$username'");
            $row = mysqli_fetch_assoc($result);

            $query = "select * from mahasiswa";
            $result = mysqli_query($this->conn, $query);

            $queryMatkul = "select * from dosen";
            $resultMatkul = mysqli_query($this->conn, $queryMatkul);

            $queryAbsen = "select * from absen";
            $resultAbsen = mysqli_query($this->conn, $queryAbsen);

            $datas['datasMahasiswa'] =   mysqli_fetch_all($result, MYSQLI_ASSOC);
            $datas['datasDosen'] = mysqli_fetch_all($resultMatkul, MYSQLI_ASSOC);
            $datasAbsen = mysqli_fetch_all($resultAbsen, MYSQLI_ASSOC);

            if (mysqli_num_rows($result) > 0) {
                if ($password == $row['password']) {
                    $datas = array(
                        "title" => "Homepage",
                        "login" => $username,
                        "datasMahasiswa" => $datas['datasMahasiswa'],
                        "datasDosen" => $datas['datasDosen'],
                        "datasAbsen" => $datasAbsen,
                        "tokens" => $row['tokens']
                    );
                    $this->view('home', $datas);
                } else {
                    echo
                    "<script> alert('Wrong Password'); </script>";
                }
            } else {
                echo
                "<script> alert('User Not Registered\n'); </script>";
            }
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        $datas['title'] = "Login";
        $this->view('login', $datas);
    }
}
