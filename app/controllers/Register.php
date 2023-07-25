<?php

class Register extends Controller
{
    public $db, $conn, $model;
    public function __construct()
    {
        $this->db = new DATABASE;
        $this->conn = mysqli_connect('localhost', 'root', '', 'pkl01');
    }

    public function index()
    {
        $datas['title'] = 'Register';
        $this->view('register', $datas);
    }

    public function validationRegister()
    {
        // if (!empty($_SESSION["id"])) {
        //     echo "<script>window.location.href = " . PATH_URL . "/</script>";
        // }
        if (isset($_POST["submit"])) {

            $email = mysqli_real_escape_string($this->conn, $_POST["email"]);
            $username = mysqli_real_escape_string($this->conn, $_POST["username"]);
            $password = mysqli_escape_string($this->conn, $_POST["password"]);
            $cpassword = mysqli_escape_string($this->conn, $_POST["passConfirm"]);
            $tokens =  bin2hex(random_bytes(mt_rand(1, 10)));
            $randomId = password_hash(random_int(1, 10), PASSWORD_DEFAULT);

            $checkName = mysqli_query($this->conn, "SELECT username FROM users WHERE username = '$username'");

            if (mysqli_fetch_assoc($checkName)) {
                echo "<script>alert('username sudah terdaftar!')</script>";
                echo "<script>window.location.href = " . PATH_URL . "/register</script>";
                return false;
            }

            $duplicate = mysqli_query($this->conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");

            if (mysqli_num_rows($duplicate) > 0) {
                echo
                "<script> alert('Username or Email Has Already Taken'); </script>";
            } else {
                if ($password == $cpassword) {
                    $query = "INSERT INTO users VALUES('$randomId','$email','$password','$password', '$tokens')";
                    mysqli_query($this->conn, $query);
                    echo "<script> alert('Registration Successful'); </script>";
                    echo "<script>window.location.href = " . PATH_URL . "/</script>";
                }
            }
        }
    }
}
