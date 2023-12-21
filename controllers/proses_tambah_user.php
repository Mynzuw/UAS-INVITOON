<?php
include "../modules/config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];

    // Validasi form, misalnya, pastikan kata sandi dan konfirmasi kata sandi cocok
    if ($password !== $confirmPassword) {
        echo "<script>alert('Kata sandi dan konfirmasi kata sandi tidak cocok!');window.location='../admin/users.php';</script>";
        exit();
    }

    // Lakukan proses pendaftaran
    // Anda perlu menyesuaikan ini dengan logika dan pengaturan database Anda
    // Misalnya, lakukan pengecekan apakah email atau username sudah ada di database

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Cek apakah email atau username sudah terdaftar
    $checkQuery = "SELECT * FROM users WHERE email = '$email' OR username = '$username'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        echo "<script>alert('username atau email sudah diterdaftar!');window.location='../admin/users.php';</script>";
    } else {
        // Jika belum terdaftar, lakukan proses pendaftaran
        // Gantilah dengan logika pendaftaran yang sesuai dengan aplikasi Anda

        // Contoh: Hash kata sandi sebelum menyimpan ke database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Contoh: Simpan data pengguna ke database
        $insertQuery = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";
        $insertResult = $conn->query($insertQuery);

        if ($insertResult) {
            echo "<script>alert('Pendaftaran berhasil!');window.location='../admin/users.php';</script>";
        } else {
            echo "<script>alert('Pendaftaran gagal. Silakan coba lagi.');window.location='../admin/users.php';</script>";
        }

    }

    // Tutup koneksi ke database
    $conn->close();
}
?>