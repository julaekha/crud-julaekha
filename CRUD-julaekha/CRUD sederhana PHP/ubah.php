<?php 
session_start();
if( !isset($_SESSION["login"]) ) {
    header("Location: login.php"); // lokasi
    exit;
}

require 'funcitons.php';
// Ambil Data URL
$id = $_GET["id"];
// query data siswa berdasarkan id
$siswa = query("SELECT * FROM siswa WHERE id = $id")[0];


// cek tombol submit
if( isset($_POST["submit"])) {
    // cek data
    if( ubah($_POST) > 0 ) {
        echo "<script>
                alert('data berhasil di ubah');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
                alert('data gagal di ubah');
                document.location.href = 'index.php';
            </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah data siswa</title>
</head>
<body>
    <h1>Ubah Data Siswa</h1>
    <!-- form ubah data -->
    <form action="" method="post">
        <!-- hidden input id -->
        <input type="hidden" name="id" value="<?= $siswa["id"]; ?>">
        <ul>
            <li>
                <!-- label NRP -->
                <label for="NRP">NRP :</label>
                <input type="text" name="NRP" id="NRP" require value="<?= $siswa["NRP"] ?>">
            </li>
            <li>
                <!-- label nama -->
                <label for="Nama">Nama :</label>
                <input type="text" name="Nama" id="Nama" require value="<?= $siswa["Nama"] ?>">
            </li>
            <li>
                <!-- label Email -->
                <label for="Email">Email :</label>
                <input type="text" name="Email" id="Email" require value="<?= $siswa["Email"] ?>">
            </li>
            <li>
                <!-- label Jurusans -->
                <label for="Jurusan">Jurusan :</label>
                <input type="text" name="Jurusan" id="Jurusan" require value="<?= $siswa["Jurusan"] ?>">
            </li>
            <li>
                <!-- label upload Gambar -->
                <label for="Gambar">Gambar :</label>
                <input type="text" name="Gambar" id="Gambar" require value="<?= $siswa["Gambar"] ?>">
            </li>
            <li>
                <!-- tombol ubah data -->
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>
    <!-- tutup form -->
</body>
</html>