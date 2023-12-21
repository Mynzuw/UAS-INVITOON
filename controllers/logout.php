<?php
// logout.php
session_start();

// Hapus informasi login dari session
unset($_SESSION['user_id']);
unset($_SESSION['username']);

// Hancurkan sesi
session_destroy();

// Redirect atau tindakan lain setelah logout

header("Location: ../views/dashboard.php");
exit();
?>