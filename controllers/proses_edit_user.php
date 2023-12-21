<?php
include '../modules/config.php';

// Periksa apakah ada permintaan untuk mengedit username
if (isset($_POST['editUnameEmail'])) {
    // Dapatkan data dari formulir
    $newUsername = $_POST['newUsername'];
    $newEmail = $_POST['newEmail'];
    $userId = $_POST['user_id'];


    // Update username dalam tabel users
    $sql  = "UPDATE users SET username = '$newUsername', email = '$newEmail'";
    $sql .= "WHERE user_id = '$userId'";

    if ($conn->query($sql) === TRUE) {
        // Redirect ke halaman profil atau tindakan lainnya setelah berhasil mengedit
        header("Location: ../admin/users.php");
        session_destroy();
        exit();
    } else {
        echo "Error updating username: " . $conn->error;
    }
}
?>