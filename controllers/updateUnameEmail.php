<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    // Redirect atau tindakan lainnya jika pengguna belum login
    header("Location: login.php");
    exit();
}

include '../modules/config.php';
// Periksa koneksi database
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

// Fungsi untuk membersihkan input
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Periksa apakah ada permintaan untuk mengedit username
if (isset($_POST['editUsername'])) {
    // Dapatkan data dari formulir
    $newUsername = $_POST['newUsername'];
    $userId = $_SESSION['user_id'];

    $checkQuery = "SELECT * FROM users WHERE username = '$newUsername'";
    $checkResult = $conn->query($checkQuery);

if ($checkResult->num_rows > 0) {
    echo "<script>alert('username sudah digunakan, cari username lain!');window.location='../views/profile.php';</script>";
} else {

    // Update username dalam tabel users
    $sql = "UPDATE users SET username = '$newUsername' WHERE user_id = '$userId'";

    if ($conn->query($sql) === TRUE) {
        // Redirect ke halaman profil atau tindakan lainnya setelah berhasil mengedit
        header("Location: ../profile.php");
        session_destroy();
        exit();
    } else {
        echo "Error updating username: " . $conn->error;
    }
}
}

// Periksa apakah ada permintaan untuk mengedit email
if (isset($_POST['editEmail'])) {
    // Dapatkan data dari formulir
    $newEmail = clean_input($_POST['newEmail']);
    $userId = $_SESSION['user_id'];

    $checkQuery = "SELECT * FROM users WHERE email = '$newEmail'";
    $checkResult = $conn->query($checkQuery);

if ($checkResult->num_rows > 0) {
    echo "<script>alert('Email sudah digunakan, cari email lain!');window.location='../views/profile.php';</script>";
} else {
    // Update email dalam tabel users
    $sql = "UPDATE users SET email = '$newEmail' WHERE user_id = '$userId'";

    if ($conn->query($sql) === TRUE) {
        // Redirect ke halaman profil atau tindakan lainnya setelah berhasil mengedit
        header("Location: ../views/profile.php");
        session_destroy();
        exit();
    } else {
        echo "Error updating email: " . $conn->error;
    }
}
}


// Tutup koneksi database
$conn->close();
?>
