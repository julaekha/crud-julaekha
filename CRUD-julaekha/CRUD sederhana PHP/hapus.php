<?php 
session_start();
if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'funcitons.php';
$id = $_GET["id"];
if( hapus($id) > 0 ) {
    echo "<script>
                alert('data berhasil di di hapus');
                document.location.href = 'index.php';
            </script>";
} else {
    echo "<script>
                alert('data gagal di hapus');
        </script>";
}

?>