<?php


class Post extends Controller
{
    public $db, $conn, $model;

    public function __construct()
    {
        $this->db = new DATABASE;
        $this->conn = mysqli_connect('localhost', 'root', '', 'pkl01');
    }

    public function validationMahasiswa()
    {
        if (isset($_POST['submit'])) {

            $nim = htmlspecialchars($_POST['nim']);
            $username = htmlspecialchars($_POST['username']);
            $jenisKelamin = htmlspecialchars($_POST['jenisKelamin']);
            $tanggalKuliah = htmlspecialchars($_POST['tanggalKuliah']);
            $jamKuliah = htmlspecialchars($_POST['jamKuliah']);
            $dosen = htmlspecialchars($_POST['dosen']);
            $namaGambar = htmlspecialchars($_FILES['file']['name']);
            $dirGambar = htmlspecialchars($_FILES['file']['tmp_name']);
            $random = password_hash(rand(1, 5), PASSWORD_DEFAULT);

            move_uploaded_file($dirGambar, '/public/images/' . $namaGambar);
            $query = "INSERT INTO mahasiswa VALUES('$random','$nim','$username','$jenisKelamin', '$tanggalKuliah', '$jamKuliah', '$dosen', '$namaGambar', '$dirGambar')";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                echo '<script>alert("Data behasil ditambahkan");</script>';
                header("location: " . PATH_URL . " /Home/index");
            } else {
                echo '<script>alert("Terjadi Kesalahan");</script>';
            }
        }
    }


    public function validationDosen()
    {
        if (isset($_POST['submit'])) {

            // var_dump($_POST);
            $code = htmlspecialchars($_POST['code']);
            $username = htmlspecialchars($_POST['username']);
            $jenisKelamin = htmlspecialchars($_POST['jenisKelamin']);
            $tanggalKuliah = htmlspecialchars($_POST['tanggalKuliah']);
            $mataKuliah = htmlspecialchars($_POST['mataKuliah']);
            // $nama_gambar = htmlspecialchars($_FILES['file']['name']);
            // $tmp_gambar = htmlspecialchars($_FILES['file']['tmp_name']);
            $random = password_hash(rand(1, 5), PASSWORD_DEFAULT);

            // move_uploaded_file($tmp_gambar, 'images/' . $nama_gambar);
            $query = "INSERT INTO dosen VALUES('$random','$code','$username','$jenisKelamin', '$tanggalKuliah', '$mataKuliah')";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                echo '<script>alert("Data behasil ditambahkan");</script>';
                header("location: " . PATH_URL . " /Home/index");
            } else {
                echo '<script>alert("Terjadi Kesalahan");</script>';
            }
        }
    }

    public function validationMataKuliah()
    {
        if (isset($_POST['submit'])) {

            $code = htmlspecialchars($_POST['code']);
            $username = htmlspecialchars($_POST['username']);
            $sks = htmlspecialchars($_POST['sks']);
            $semester = htmlspecialchars($_POST['semester']);
            $random = password_hash(rand(1, 5), PASSWORD_DEFAULT);

            // move_uploaded_file($tmp_gambar, 'images/' . $nama_gambar);
            $query = "INSERT INTO matakuliah VALUES('$random','$code','$username','$sks', '$semester')";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                echo '<script>alert("Data behasil ditambahkan");</script>';
                header("location: " . PATH_URL . " /Home/index");
            } else {
                echo '<script>alert("Terjadi Kesalahan");</script>';
            }
        }
    }


    public function postMahasiswa()
    {
        $query = "select * from dosen";
        $result = mysqli_query($this->conn, $query);
        $datas['datas'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $datas['title'] = 'Post Mahasiswa';
        $this->view('postMahasiswa', $datas);
    }
    public function postDosen()
    {
        $query = "select * from matakuliah";
        $result = mysqli_query($this->conn, $query);
        $datas['datas'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $datas['title'] = 'Post Dosen';
        $this->view('postDosen', $datas);
    }
    public function postMatakuliah()
    {
        $datas['title'] = 'Post MataKuliah';
        $this->view('postMataKuliah', $datas);
    }
}
