<?php 
require '../funcitons.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM siswa 
            WHERE
        Nama LIKE '%$keyword%' OR 
        NRP LIKE '%$keyword%' OR
        Jurusan LIKE '%$keyword%'
";;
$siswa = query($query);


?>
    <table border="1" cellpadding="10" cellspacing="0">

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
    <td><?= $row["NRP"]; ?></td>
    <td><?= $row["Nama"]; ?></td>
    <td><?= $row["Email"] ?></td>
    <td><?= $row["Jurusan"]; ?></td>
</tr>
<?php $i++; ?>
<?php endforeach; ?>

</table>