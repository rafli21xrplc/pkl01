<?php


class Dosen extends Controller
{
    public $db, $conn, $model;

    public function __construct()
    {
        $this->db = new DATABASE;
        $this->conn = mysqli_connect('localhost', 'root', '', 'pkl01');
    }

    public function index()
    {
        $query = "select * from dosen";
        $result = mysqli_query($this->conn, $query);
        $datas['datas'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $datas['title'] = 'List Dosen';
        $this->view('dosen', $datas);
    }

    public function edit()
    {

        $url = explode('/', $_GET['url']);
        $query = "select * from dosen WHERE uuid='$url[2]'";
        $result = mysqli_query($this->conn, $query);

        $queryMatkul = "select * from mataKuliah";
        $resultMatkul = mysqli_query($this->conn, $queryMatkul);

        $datas['datas'] =   mysqli_fetch_assoc($result);
        $datas['datasMatkul'] = mysqli_fetch_all($resultMatkul, MYSQLI_ASSOC);
        $datas['title'] = 'Edit Data Dosen';
        $this->view('editDosen', $datas);
    }

    public function delete()
    {
        $url = explode('/', $_GET['url']);
        $query = "DELETE FROM dosen where uuid='$url[2]'";
        $result = mysqli_query($this->conn, $query);
        if ($result) header("location: " . PATH_URL . "/Dosen/index");
    }

    public function validationDosen()
    {
        if (isset($_POST['submit'])) {
            $uuid = $_POST['uuid'];
            $code = htmlspecialchars($_POST['code']);
            $username = htmlspecialchars($_POST['username']);
            $jenisKelamin = htmlspecialchars($_POST['jenisKelamin']);
            $tanggalKuliah = htmlspecialchars($_POST['tanggalKuliah']);
            $mataKuliah = htmlspecialchars($_POST['mataKuliah']);
            
            // move_uploaded_file($tmp_gambar, 'images/' . $nama_gambar);
            $query = "UPDATE dosen SET code='$code', username='$username', jenisKelamin='$jenisKelamin', tanggalKuliah='$tanggalKuliah', mataKuliah='$mataKuliah' WHERE uuid = '$uuid'";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                echo '<script>alert("Data behasil ditambahkan");</script>';
                header("location: " . PATH_URL . " /Dosen/index");
            } else {
                echo '<script>alert("Terjadi Kesalahan");</script>';
            }
        }
    }
}
