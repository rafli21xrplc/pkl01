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
        $where = "SELECT nameImage FROM mahasiswa where uuid='$url[2]'";
        $image = mysqli_fetch_assoc(mysqli_query($this->conn, $where))['nameImage'];

        if (unlink("public/images/$image")) {
            $query = "DELETE FROM mahasiswa where uuid='$url[2]'";
            $result = mysqli_query($this->conn, $query);
            if ($result) header("location: " . PATH_URL . "/Mahasiswa/index");
        }
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
            $namaGambarLama = htmlspecialchars($_POST['nameImage']);
            $namaGambar = htmlspecialchars($_FILES['file']['name']);

            if ($_FILES['file']['size'] < 2097152) {
                if ($_FILES['file']['error'] === 0) {
                    unlink("public/images/$namaGambarLama");
                    $namaGambar = bin2hex(random_bytes(mt_rand(1, 20))) . "." . explode("/", $_FILES['file']['type'])[1];
                } else {
                    $namaGambar = $namaGambarLama;
                }

                $targetFile = 'public/images/' . basename($namaGambar);
                $dirGambar = htmlspecialchars($_FILES['file']['tmp_name']);
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
}
