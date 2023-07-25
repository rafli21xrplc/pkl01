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
            if (mysqli_num_rows($result) > 0) {
                if ($password == $row['password']) {
                    $datas = array(
                        "title" => "Homepage",
                        "login" => $username,
                        "tokens" => $row['tokens']
                    );
                    $this->view('home', $datas);
                    // require_once 'app/controllers/Home.php';
                } else {
                    echo
                    "<script> alert('Wrong Password'); </script>";
                }
            } else {
                echo
                "<script> alert('User Not Registered'); </script>";
            }
        }
    }

    public function logout()
    {
        echo "logout";
    }
}
