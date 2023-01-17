<?php 
require 'funcitons.php';
// tombol di submit
if( isset($_POST["register"])) {
    if( registrasi($_POST) > 0 ) {
        echo "<script>alert('user baru ditambahkan');</script>";
    } else {
        echo mysqli_error($conn);
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <!-- Style CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Halaman Registrasi</h1>
<!-- Input Form -->
<form action="" method="post">

    <ul>
        <li>
            <!-- inserts username -->
            <label for="username">username :</label>
            <input type="text" name="username" id="username">
        </li>
        <li>
            <!-- insert password -->
            <label for="password">password :</label>
            <input type="password" name="password" id="password">
        </li>
        <li>
            <!-- insert verifikasi password -->
            <label for="password2">Konfirmasi password :</label>
            <input type="password" name="password2" id="password2">
        </li>
        <li>
            <!-- Tombol Register -->
            <button type="submit" name="register">Register!</button>
        </li>
    </ul>
    <p>sudah mempunyai akun ? <a href="login.php">Login</a></p>

</form>

</body>
</html>