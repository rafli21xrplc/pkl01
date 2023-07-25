<?php


class MataKuliah extends Controller
{
    public $db, $conn, $model;

    public function __construct()
    {
        $this->db = new DATABASE;
        $this->conn = mysqli_connect('localhost', 'root', '', 'pkl01');
    }

    public function index()
    {
        $query = "select * from matakuliah";
        $result = mysqli_query($this->conn, $query);
        $datas['datas'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $datas['title'] = 'List Mata Kuliah';
        $this->view('mataKuliah', $datas);
    }

    public function edit()
    {
        $url = explode('/', $_GET['url']);
        $query = "select * from matakuliah WHERE uuid='$url[2]'";
        $result = mysqli_query($this->conn, $query);

        $datas['datas'] =   mysqli_fetch_assoc($result);
        $datas['title'] = 'Edit Data Matakuliah';
        $this->view('editMatakuliah', $datas);
    }

    public function delete()
    {
        $url = explode('/', $_GET['url']);
        $query = "DELETE FROM matakuliah where uuid='$url[2]'";
        $result = mysqli_query($this->conn, $query);
        if ($result) header("location: " . PATH_URL . "/MataKuliah/index");
    }

    public function validationMataKuliah()
    {
        if (isset($_POST['submit'])) {
            $uuid = $_POST['uuid'];
            $code = htmlspecialchars($_POST['code']);
            $username = htmlspecialchars($_POST['username']);
            $sks = htmlspecialchars($_POST['sks']);
            $semester = htmlspecialchars($_POST['semester']);

            // move_uploaded_file($tmp_gambar, 'images/' . $nama_gambar);
            $query = "UPDATE matakuliah SET code='$code', username='$username', sks='$sks', semester='$semester' WHERE uuid = '$uuid'";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                echo '<script>alert("Data behasil ditambahkan");</script>';
                header("location: " . PATH_URL . " /MataKuliah/index");
            } else {
                echo '<script>alert("Terjadi Kesalahan");</script>';
            }
        }
    }
}
