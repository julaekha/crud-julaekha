<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data) {
    global $conn;
    $Nama = htmlspecialchars($data["Nama"]);
    $nrp = htmlspecialchars($data["NRP"]);
    $Email = htmlspecialchars($data["Email"]);
    $Jurusan = htmlspecialchars($data["Jurusan"]);
    $Gambar = htmlspecialchars($data["Gambar"]);

    // insert data
    $query = "INSERT INTO siswa VALUES ('','$Nama','$nrp','$Email','$Jurusan','$Gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM siswa WHERE id = $id");

    return mysqli_affected_rows($conn);
}


function ubah($data) {
    global $conn;
    $id = $data["id"];
    $Nama = htmlspecialchars($data["Nama"]);
    $nrp = htmlspecialchars($data["NRP"]);
    $Email = htmlspecialchars($data["Email"]);
    $Jurusan = htmlspecialchars($data["Jurusan"]);
    $Gambar = htmlspecialchars($data["Gambar"]);

    // insert data
    $query = "UPDATE siswa SET 
                                Nama = '$Nama', 
                                NRP = '$nrp', 
                                Email = '$Email',
                                Jurusan = '$Jurusan',
                                Gambar = '$Gambar' 
                            WHERE id = $id
                            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM siswa 
                WHERE
            Nama LIKE '%$keyword%' OR 
            NRP LIKE '%$keyword%' OR
            Jurusan LIKE '%$keyword%'
            ";
    return query($query);
}

// Fungsi register
function registrasi($data) {
    // ambil global data koneksi
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    // cek user sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if( mysqli_fetch_assoc($result)) {
        echo "<script>alert('username sudah ada');</script>";
        return false;
    }

    // cek konfirmasi password
    if( $password !== $password2 ) {
        echo "<script>alert('konfirmasi password tidak sesuai');</script>";
        return false;
    }
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambah user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username','$password')");
    return mysqli_affected_rows($conn);
}
?>