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
            $random = bin2hex(random_bytes(mt_rand(1, 20)));
            $uniqeNameImage = bin2hex(random_bytes(mt_rand(1, 20))) . "." . explode("/", $_FILES['file']['type'])[1];
            $targetFile = 'public/images/' . basename($uniqeNameImage);
            $dirGambar = htmlspecialchars($_FILES['file']['tmp_name']);

            if ($_FILES['file']['size'] < 2097152) {
                if (move_uploaded_file($dirGambar, $targetFile)) {
                    $query = "INSERT INTO mahasiswa VALUES('$random','$nim','$username','$jenisKelamin', '$tanggalKuliah', '$jamKuliah', '$dosen', '$uniqeNameImage', '$dirGambar')";
                    $result = mysqli_query($this->conn, $query);
                } else {
                    echo "
                <acript>alert(`Unable to upload the image`)</acript>
                ";
                }
                if ($result) {
                    echo '<script>alert("Data behasil ditambahkan");</script>';
                    header("location: " . PATH_URL . " /Home/index");
                } else {
                    echo '<script>alert("Terjadi Kesalahan");</script>';
                }
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
            $random = bin2hex(random_bytes(mt_rand(1, 20)));

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
            $random = bin2hex(random_bytes(mt_rand(1, 20)));

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
