<?php

class Admin extends Controller
{
    private $db;
    private $conn;
    private $model;
    public function __construct()
    {
        $this->db = new DATABASE;
        $this->conn = mysqli_connect('localhost', 'root', '', 'pwpb');
    }

    public function index()
    {
        $datas['title'] = 'Admin';
        $this->view('admin', $datas);
    }

    public function created()
    {
        $datas['title'] = 'Admin Created';
        $this->view('created', $datas);
    }

    public function CreatedInsert()
    {
        if (isset($_POST['submit'])) {

            $name = htmlspecialchars($_POST['name']);
            $alamat = htmlspecialchars($_POST['alamat']);
            $deskripsi = htmlspecialchars($_POST['deskripsi']);
            $nama_gambar = htmlspecialchars($_FILES['file']['name']);
            $tmp_gambar = htmlspecialchars($_FILES['file']['tmp_name']);
            $random = password_hash(rand(1, 5), PASSWORD_DEFAULT);

            move_uploaded_file($tmp_gambar, 'images/' . $nama_gambar);
            $query = "INSERT INTO wisata VALUES('$random','$name','$alamat','$deskripsi', '$nama_gambar')";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                echo '<script>alert("wisata behasil ditambahkan");</script>';
                header('');
            } else {
                echo '<script>alert("Terjadi Kesalahan");</script>';
            }
        }
    }
}
