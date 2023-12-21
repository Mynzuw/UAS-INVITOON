<?php
include "../modules/config.php";
session_start();
// Periksa dan arahkan pengguna kembali ke halaman yang diminta sebelumnya
$redirect_url = isset($_SESSION['redirect_url']) ? $_SESSION['redirect_url'] : 'index.php';

// Check if redirect_url contains "baca-chapter.php"
if (strpos($redirect_url, 'baca-chapter.php') !== false) {
    // Add #komen to the end of the URL
    $redirect_url .= '#komen';
}


// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil nilai dari form
$email_or_username = $_POST["email"];
$password = $_POST["password"];

// Cek apakah email atau username ada di dalam database
$query = "SELECT * FROM users WHERE email = '$email_or_username' OR username = '$email_or_username'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Data ditemukan, lanjutkan dengan proses otentikasi
    $row = $result->fetch_assoc();
    $hashed_password = $row["password"]; // Gantilah dengan nama kolom yang sesuai di tabel Anda
    $username = $row["username"];
    $user_id = $row["user_id"];
    $email = $row["email"];

    // Gunakan fungsi password_verify untuk memeriksa kata sandi
    if (password_verify($password, $hashed_password)) {
        // Otentikasi berhasil, lakukan tindakan yang diperlukan
        echo "<script>alert('Login berhasil!');</script>";
        
        $_SESSION["logged_in"] = true;
        $_SESSION['user_id'] = $user_id; // Gantilah dengan identitas pengguna yang sesuai
        $_SESSION['username'] = $username; // Gantilah dengan nama pengguna yang sesuai
        $_SESSION['email'] = $email;
        session_write_close(); // Menyelesaikan penulisan sesi
        
        header("Location: $redirect_url");
        
    } else {
        // Otentikasi gagal, kata sandi tidak cocok
        echo "<script>alert('Email atau kata sandi salah!');window.location='$redirect_url';</script>";
    }
} else {
    // Data tidak ditemukan, email atau username tidak valid
    echo "<script>alert('Email atau username tidak ditemukan!');window.location='$redirect_url';;</script>";
}

// Tutup koneksi ke database
$conn->close();
?>
