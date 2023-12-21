<?php
session_start();

// Ganti dengan username dan password yang sebenarnya
$valid_username = 'admininvitoon';
$valid_password = 'Trust Last';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    if ($input_username === $valid_username && $input_password === $valid_password) {
        $_SESSION['authenticated'] = true;
        header('Location: dashboard.php'); // Ganti dengan halaman yang seharusnya diakses setelah login
        exit;
    } else {
        $error_message = 'Username atau password salah';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Tambahkan link ke file CSS Tailwind -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-200 h-screen flex justify-center items-center">

<div class="bg-white p-8 rounded shadow-md w-96">
    <h2 class="text-2xl font-bold mb-6">Login</h2>
    
    <?php if (isset($error_message)) : ?>
        <p class="text-red-500 mb-4"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form method="post" action="" class="space-y-4">
        <div>
            <label for="username" class="block text-sm font-medium text-gray-600">Username:</label>
            <input type="text" name="username" class="mt-1 p-2 w-full border rounded-md" required>
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-600">Password:</label>
            <input type="password" name="password" class="mt-1 p-2 w-full border rounded-md" required>
        </div>

        <div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600">Login</button>
        </div>
    </form>
</div>

</body>
</html>
