<?php


class Mahasiswa extends Controller
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
        $datas['datas'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $datas['title'] = 'List Mahasiswa';
        $this->view('mahasiswa', $datas);
    }

    public function edit()
    {

        $url = explode('/', $_GET['url']);
        $query = "select * from mahasiswa WHERE uuid='$url[2]'";
        $result = mysqli_query($this->conn, $query);

        $queryDosen = "select * from dosen";
        $resultDosen = mysqli_query($this->conn, $queryDosen);

        $datas['datas'] =   mysqli_fetch_assoc($result);
        $datas['datasDosen'] = mysqli_fetch_all($resultDosen, MYSQLI_ASSOC);
        $datas['title'] = 'Edit Data Mahasiswa';
        $this->view('editMahasiswa', $datas);
    }

    public function delete()
    {
        $url = explode('/', $_GET['url']);
        $query = "DELETE FROM mahasiswa where uuid='$url[2]'";
        $result = mysqli_query($this->conn, $query);
        if ($result) header("location: " . PATH_URL . "/Mahasiswa/index");
    }

    public function validationMahasiswa()
    {
        if (isset($_POST['submit'])) {
            $uuid = $_POST['uuid'];
            $nim = htmlspecialchars($_POST['nim']);
            $username = htmlspecialchars($_POST['username']);
            $jenisKelamin = htmlspecialchars($_POST['jenisKelamin']);
            $tanggalKuliah = htmlspecialchars($_POST['tanggalKuliah']);
            $jamKuliah = htmlspecialchars($_POST['jamKuliah']);
            $dosen = htmlspecialchars($_POST['dosen']);
            $namaGambar = htmlspecialchars($_FILES['file']['name']);
            $dirGambar = htmlspecialchars($_FILES['file']['tmp_name']);
            $targetFile = 'public/images/' . basename($_FILES['file']['name']);

            move_uploaded_file($dirGambar, $targetFile);
            
            $query = "UPDATE mahasiswa SET nim='$nim', username='$username', jenisKelamin='$jenisKelamin', tanggalKuliah='$tanggalKuliah', jamKuliah='$jamKuliah' ,dosen='$dosen', nameImage='$namaGambar', dirImage='$dirGambar' WHERE uuid = '$uuid'";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                echo '<script>alert("Data behasil ditambahkan");</script>';
                header("location: " . PATH_URL . " /Mahasiswa/index");
            } else {
                echo '<script>alert("Terjadi Kesalahan");</script>';
            }
        }
    }
}
