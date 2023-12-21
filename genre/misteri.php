<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../Logo Invitoon 1.png">
    <title>INVITOON</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <?php 
   session_start();

   if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
       echo '<script>document.addEventListener("DOMContentLoaded", function() {
               document.getElementById("login-button").style.display = "none";
               document.getElementById("login-button").classList.remove("hidden");
               document.getElementById("logout-button").classList.remove("hidden");
               document.getElementById("user-info").classList.remove("hidden");
       })</script>';
       $username = $_SESSION['username'];
   }
    

    ?>
    <!-- <style>
        .fakeimg {
            height: 200px;         
            background: #aaa;
        }
    </style> -->
</head>
<body class="bg-gray-200">
    <nav class="navbar-sticky bg-white sticky w-full z-10 top-0 left-0 right-0 border-b border-gray-200;">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="../Logo Invitoon 1.png" class="h-8" alt="Flowbite Logo">
                <span class="self-center text-2xl font-semibold whitespace-nowrap">INVITOON</span>
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <form class="py-2 px-3">   
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white ">Cari</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-white-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-blue dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Judul Komik" required>
                  
                </div>
            </form>
            <div class="py-2 px-3" id="login-button">
                <button type="button" data-modal-target="login-modal" data-modal-toggle="login-modal" class="login-button bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 px-4 border border-blue-700 rounded">Masuk</button>
            </div>
            
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <a id="user-info" class="hidden block py-2 px-3 text-black bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0" href="profile.php"><?php echo $username; ?></a>
            <a id="logout-button" class="hidden" href="controllers/logout.php"><svg class="ml-5 h-8 w-8 text-red-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" href="">  <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />  <polyline points="16 17 21 12 16 7" />  <line x1="21" y1="12" x2="9" y2="12" /></svg></a>
            
    </div>
          

                
                
                
                <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                <li>
                    <a href="../index.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0" aria-current="page">Home</a>
                </li>
                <li>
                    <a href="../populer.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Populer</a>
                </li>
                <li>
                    <a href="" class="block py-2 px-3 text-black bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0">Genre</a>
                </li>
                </ul>
            </div>

            
            

        </div>

        
    </nav>
    <nav class="navbar-sticky bg-white sticky w-full z-10 top-0 left-0 right-0 border-b border-gray-200;">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <div class="justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="items-center flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-48 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                <li>
                    <a href="fantasi.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Fantasi</a>
                </li>
                <li>
                    <a href="aksi.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Aksi</a>
                </li>
                <li>
                    <a href="misteri.php" class="block py-2 px-3 text-black bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0">Misteri</a>
                </li>
                <li>
                    <a href="horor.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Horor</a>
                </li>
                <li> 
                    <a href="komedi.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Komedi</a>
                </li>
                <li>
                    <a href="romantis.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Romantis</a>
                </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <main> 
    <div>
    <div class="mt-5 p-5 font-inter grid grid-cols-3 gap-2 md:grid-cols-4">
<?php
include "../koneksi.php";
                        
$sql = "SELECT * FROM komik WHERE genre='misteri'";

                        //eksekusi SQL
    $hasil = mysqli_query($conn,$sql);

                        //hitung data yang ada di tabel
                        $jmlData = mysqli_num_rows($hasil);
                        //cek apakah ada datanya
                        if ($jmlData > 0) {

                            //tampilkan datanya
                            while ($row = mysqli_fetch_assoc($hasil)) {

                        ?>
            <a href="#" class="flex flex-col items-center bg-white border border-white-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-white-100 dark:border-white-700 dark:bg-white-800 dark:hover:bg-white-700">
            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="../admin/gambar/<?= $row["cover"] ?>" alt="">
        <div class="flex flex-col justify-between p-4 leading-normal">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-white-900 dark:text-gray"><?= $row["judul_komik"] ?></h5>
    </div>
</a>
                            
<?php
                                                                        }
                                        }
?>

        
    </main>

    
        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>