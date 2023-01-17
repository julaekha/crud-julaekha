<?php 
session_start();
// koneksi funcition
require 'funcitons.php'; // menghubungkan file function


// cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if( $key === hash('sha256', $row['username']) ) {
        $_SESSION['login'] = true;
    }
}


// session
if( isset($_SESSION["login"]) ) {
    header("Location: index.php"); // lokasi
    exit;
}

if( isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'"); // query koneksi

    // cek username
    if( mysqli_num_rows($result) === 1 ) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])) {
            // set session
            $_SESSION["login"] = true;

            // cek remember me
            if( isset($_POST['remember']) ) {
                // buat cookie 

                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['username']), time() + 60);
            }

            header("Location: index.php"); // lokasi
            exit;
        }
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
</head>
<body>
    <h1>Halaman Login</h1>
    <?php if( isset($error) ) : ?>
        <p style="color: red; font-style: italic;">username atau password salah cuk</p>
    <?php endif; ?>
    <!-- Form login -->
    <form action="" method="post">

    <ul>
        <li>
            <!-- label username -->
            <label for="username">username :</label>
            <input type="text" name="username" id="username">
        </li>
        <li>
            <!-- label password -->
            <label for="password">password :</label>
            <input type="password" name="password" id="password">
        </li>
        <li>
            <!-- remember me -->
            <input type="checkbox" name="remember" id="remember">
            <label for="remember" name="remember">Remember me</label>
        </li>
        <p>Belum mempunyai akun? <a href="registrasi.php">Buat Akun</a></p>
        <li>
            <!-- tombol login -->
            <button type="submit" name="login">Login</button>
        </li>
    </ul>

    </form>
    <!-- tutup form -->
</body>
</html>