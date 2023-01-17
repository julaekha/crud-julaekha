<?php 
session_start();
if( !isset($_SESSION["login"]) ) {
    header("Location: login.php"); // lokasi file
    exit;
}

require 'funcitons.php'; // lokasi file function
$siswa = query("SELECT * FROM siswa"); // query data siswa

// Jika tombol pencarian di klik
if( isset($_POST["cari"])) {
    $siswa = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>Daftar Siswa</h1>
    <a href="Tambah.php">Tambah data siswa</a>

    <!-- Tombol Pencarian -->
    <br>
    <br>
    <form action="" method="post">

        <input type="text" name="keyword" size="30" autofocus placeholder="Masukan Pencarian!" autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="tombol-cari">Cari!</button>
    </form>
    <!-- Tutup tombol pencarian -->
    <br>
    <div id="container">
    <!-- Tabel data -->
    <table border="1" cellpadding="10" cellspacing="0">
    <!-- data tabel -->
    <tr>
        <th>No</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>NISN</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
    </tr>
    <?php $i = 1; ?>
    <!-- menangkap data dari html ke php -->
    <?php foreach($siswa as $row) : ?> 
    <tr>
        <td><?= $i ?></td>
        <td>
            <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a>
            <a href="hapus.php?id=<?= $row["id"]; ?>">hapus</a>
        </td>
        <td>
            <img src="img/<?= $row["Gambar"]; ?>"  width="60">
        </td>
        <!-- field table siswa -->
        <td><?= $row["NRP"]; ?></td>
        <td><?= $row["Nama"]; ?></td>
        <td><?= $row["Email"] ?></td>
        <td><?= $row["Jurusan"]; ?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>

    </table>
    </div>
    <!-- file javascript -->
    <script src="js/script.js"></script> 
</body>
</html>