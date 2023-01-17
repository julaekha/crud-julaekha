<?php 
session_start();
if( !isset($_SESSION["login"]) ) {
    header("Location: login.php"); // lokasi mengarahkan file
    exit;
}

require 'funcitons.php';
// cek tombol submit
if( isset($_POST["submit"])) {
    
    // cek data
    if( tambah($_POST) > 0 ) {
        echo "<script>
                alert('data berhasil di tambahkan');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "Data Gagal Ditambahkan";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data siswa</title>
</head>
<body>
    <h1>Tambah Data Siswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <!-- Insert Label NRP -->
                <label for="NRP">NRP :</label>
                <input type="text" name="NRP" id="NRP" require>
            </li>
            <li>
                <!-- Insert Label Nama -->
                <label for="Nama">Nama :</label>
                <input type="text" name="Nama" id="Nama" require>
            </li>
            <li>
                <!-- Insert Label Email -->
                <label for="Email">Email :</label>
                <input type="text" name="Email" id="Email" require>
            </li>
            <li>
                <!-- Insert Label Jurusan -->
                <label for="Jurusan">Jurusan :</label>
                <input type="text" name="Jurusan" id="Jurusan" >
            </li>
            <li>
                <!-- Insert Gambar -->
                <label for="Gambar">Gambar :</label>
                <input type="text" name="Gambar" id="Gambar" >
            </li>
            <li>
                <!-- tombol tambah data -->
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>