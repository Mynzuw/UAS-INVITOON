<?php
session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header('Location: login.php'); // Redirect jika tidak terotentikasi
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/img/Logo Invitoon 1.png">
    <title>INVITOON</title>
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <!-- component -->
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">


    
</head>
<body>
<?php
include("../modules/config.php");
?>
  <nav class="navbar-sticky bg-white sticky w-full z-10 top-0 left-0 right-0 border-b border-gray-200;">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="../assets/img/Logo Invitoon 1.png" class="h-8" alt="INVITOON Logo">
                <span class="self-center text-2xl font-semibold whitespace-nowrap">ADMIN INVITOON</span>
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">

                
                
                <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'block py-2 px-3 text-black bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0' : ''; ?> ">
                    <a href="../admin/dashboard.php" class="block hover:text-blue-700" aria-current="page">DASHBOARD</a>
                </li>
                <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'users.php' ? 'block py-2 px-3 text-black bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0' : ''; ?> ">
                    <a href="../admin/users.php" class="block hover:text-blue-700" aria-current="page">USERS</a>
                </li>
                <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'komik.php' ? 'block py-2 px-3 text-black bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0' : ''; ?> ">
                    <a href="../admin/komik.php" class="block hover:text-blue-700" aria-current="page">KOMIK</a>
                </li>
            
                <li>
                    <form method="post" action="logout.php">
                        <button type="submit" name="logout" class="block py-2 px-3 text-black bg-red-700 rounded md:bg-transparent md:text-red-700 md:p-0">LOGOUT</button>
                    </form>
                </li>
                </ul>
            </div>

            
            

        </div>



    
        
    </nav>