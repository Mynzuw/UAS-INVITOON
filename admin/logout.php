<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    // Hapus sesi dan redirect ke halaman login
    session_destroy();
    header('Location: login.php');
    exit;
}
?>