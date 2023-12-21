<?php
// Koneksi ke database (gantilah dengan detail koneksi Anda)
include "../modules/config.php";

if (!$conn) {
    die("koneksi gagal: " . mysqli_connect_error());
}

// Ambil data username dari permintaan AJAX
$username = mysqli_real_escape_string($conn, $_POST['username']);

// Query untuk memeriksa ketersediaan username
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $query);

// Periksa hasil query dan kirim respons ke AJAX
if (mysqli_num_rows($result) > 0) {
    echo '<span style="color: red;">Username sudah digunakan. Pilih username lain.</span>';
    
} else {
    if ($username == '') {
        echo '<span></span>';
    } else {
    echo '<span style="color: white;">Username tersedia.</span>';
    }
}

// Tutup conn
mysqli_close($conn);
?>
