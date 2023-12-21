<?php


if (session_status() === PHP_SESSION_NONE) {
    // Jika belum, maka memulai sesi
    session_start();
}
$_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];

include("../components/Modal.php"); 

if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
    echo '<script>document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("login-button").style.display = "none";
            document.getElementById("login-button").classList.remove("hidden");
            document.getElementById("user-info").classList.remove("hidden");
    })</script>';
    $username = $_SESSION['username'];
}
?>


</header>
<nav class="navbar-sticky bg-white sticky w-full z-20 top-0 left-0 right-0 border-b border-gray-200;">
    <div class="max-w-full-xl flex flex-wrap items-center justify-between mx-auto px-28">
        <a href="index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="../assets/img/Logo Invitoon 1.png" class="h-8" alt="Invitoon Logo">
            <span class="self-center text-2xl font-semibold whitespace-nowrap">INVITOON</span>
        </a>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul class="flex items-center flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 border border-blue-700 rounded' : ''; ?> ">
                    <a href="../views/dashboard.php" class="block hover:text-blue-700" aria-current="page">Home</a>
                </li>
                <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'trending.php' ? 'bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 border border-blue-700 rounded' : ''; ?>">
                    <a href="../views/trending.php" class="block hover:text-blue-700">Populer</a>
                </li>
                <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'kategori.php' ? 'bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 border border-blue-700 rounded' : ''; ?>">
                    <a href="../views/kategori.php" class="block hover:text-blue-700">Genre</a>
                </li>
            </ul>
        </div>
        <div class="flex md:order-2 md:space-x-0 rtl:space-x-reverse">
                  
<form class="flex items-center mr-2     ">   
    <label for="simple-search" class="sr-only">Search</label>
    <div class="relative w-full">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2"/>
            </svg>
        </div>
        <input type="text" id="search_data" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 " placeholder="Search komik name..." required>
    </div>
    <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
        </svg>
        <span class="sr-only">Search</span>
    </button>
</form>
            <div class="py-2">
                <button type="login-button" id="login-button"  class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 border border-blue-700 rounded" data-modal-target="login-modal" data-modal-toggle="login-modal">Masuk</button>
                <a id="user-info" class="hidden bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 border border-blue-700 rounded" href="profile.php"><?php echo $username; ?></a>

            </div>
            <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>
    </div>

    
</nav>

<script>
  $(document).ready(function(){
      
    $('#search_data').autocomplete({
      source: "../controllers/fetch.php",
      minLength: 1,
      select: function(event, ui)
      {
        $('#search_data').val(ui.item.value);
        window.location.href = "chapter.php?id=" + ui.item.id;
      }
    }).data('ui-autocomplete')._renderItem = function(ul, item){
      return $("<li class='ui-autocomplete-row sticky'></li>")
        .data("item.autocomplete", item)
        .append(item.label)
        .appendTo(ul);
    };

  });
</script>