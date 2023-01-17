<?php 
session_start();
$_SESSION = [];
session_unset(); // memastikan session hilang
session_destroy(); // menghapus session

setcookie('id', '', time() - 3600); // waktu cookie id
setcookie('key', '', time() - 3600); // waktu cookie key

header("Location: login.php"); // URL kembali
exit;
?>