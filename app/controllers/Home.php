<?php

class Home extends Controller
{
    public $db, $conn, $model;

    public function __construct()
    {
        $this->db = new DATABASE;
        $this->conn = mysqli_connect('localhost', 'root', '', 'pkl01');
    }

    public function index()
    {
        $query = "select * from mahasiswa";
        $result = mysqli_query($this->conn, $query);

        $queryMatkul = "select * from dosen";
        $resultMatkul = mysqli_query($this->conn, $queryMatkul);
        
        $queryAbsen = "select * from absen";
        $resultAbsen = mysqli_query($this->conn, $queryAbsen);

        $datasSiswa =   mysqli_fetch_all($result, MYSQLI_ASSOC);
        $datasDosen = mysqli_fetch_all($resultMatkul, MYSQLI_ASSOC);
        $datasAbsen = mysqli_fetch_all($resultAbsen, MYSQLI_ASSOC);
        $tokens =  bin2hex(random_bytes(mt_rand(1, 10)));

        $datas = array(
            "title" => "Homepage",
            "tokens" => $tokens,
            "datasMahasiswa" => $datasSiswa,
            "datasDosen" => $datasDosen,
            "datasAbsen" => $datasAbsen ,
        );
        $this->view('home', $datas);
    }

    public function validationAbsen()
    {
        if (isset($_POST['submit'])) {

            $querySiswa = "select * from mahasiswa";
            $resultSiswa = mysqli_query($this->conn, $querySiswa);

            $queryMatkul = "select * from dosen";
            $resultMatkul = mysqli_query($this->conn, $queryMatkul);

            $datasSiswa =   mysqli_fetch_all($resultSiswa, MYSQLI_ASSOC);
            $datasDosen = mysqli_fetch_all($resultMatkul, MYSQLI_ASSOC);

            $random = password_hash(rand(1, 5), PASSWORD_DEFAULT);
            $username = htmlspecialchars($_POST['username']);
            $dosen = htmlspecialchars($_POST['dosen']);
            $datetime = htmlspecialchars($_POST['datetime']);
            $status = htmlspecialchars($_POST['status']);
            $image = "SELECT nameImage from mahasiswa WHERE username='$username'";
            $image = mysqli_fetch_assoc(mysqli_query($this->conn, $image))['nameImage'];

            $queryAbsen = "select * from absen";
            $datasAbsen = mysqli_fetch_all(mysqli_query($this->conn, $queryAbsen), MYSQLI_ASSOC);
            $tokens =  bin2hex(random_bytes(mt_rand(1, 10)));

            $datas = array(
                "title" => "Homepage",
                "datasMahasiswa" => $datasSiswa,
                "datasDosen" => $datasDosen,
                "datasAbsen" => $datasAbsen,
                "tokens" => $tokens
            );

            $queryDatas = "INSERT INTO absen VALUES('','$random','$image', '$username', '$dosen', '$datetime', '$status')";
            $result = mysqli_query($this->conn, $queryDatas);
            if ($result) {
                echo '<script>alert("Data behasil ditambahkan");</script>';
                $this->view('home', $datas);
            } else {
                echo '<script>alert("Terjadi Kesalahan");</script>';
            }
        }
    }
}
