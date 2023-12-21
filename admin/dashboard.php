<?php
include "header.php";
?>
    

<body class="bg-gray-200">
<?php
include("../modules/config.php");
// Query to get the total number of komik
$sqlKomik = "SELECT COUNT(*) AS total_komik FROM komik";
$resultKomik = mysqli_query($conn, $sqlKomik);
$rowKomik = mysqli_fetch_assoc($resultKomik);
$totalKomik = $rowKomik['total_komik'];

// Query to get the total number of users
$sqlUsers = "SELECT COUNT(*) AS total_users FROM users";
$resultUsers = mysqli_query($conn, $sqlUsers);
$rowUsers = mysqli_fetch_assoc($resultUsers);
$totalUsers = $rowUsers['total_users'];

// Query to get the total number of chapters
$sqlChapters = "SELECT COUNT(*) AS total_chapters FROM chapter";
$resultChapters = mysqli_query($conn, $sqlChapters);
$rowChapters = mysqli_fetch_assoc($resultChapters);
$totalChapters = $rowChapters['total_chapters'];

// Close the database connection
mysqli_close($conn);
?>

<main >


<div class="p-10">
<span class="self-center text-2xl font-semibold whitespace-nowrap">DASHBOARD</span>
<p class="mb-10">
Dashbord untuk platform INVITOON mencakup informasi seperti jumlah total komik, jumlah total users, dan jumlah total chapter
</p>


<div class="flex flex-wrap bg-indigo-900 ">
    
    <a href="komik.php" class="mt-4 w-full lg:w-6/12 xl:w-4/12 px-5 mb-4">
    <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-3 xl:mb-0 shadow-lg">
        <div class="flex-auto p-4">
        <div class="flex flex-wrap">
            <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
            <h5 class="text-blueGray-400 uppercase font-bold text-xs"> JUMLAH KOMIK</h5>
            <span class="font-semibold text-xl text-blueGray-700"><?php echo $totalKomik ?></span>
            </div>
            <div class="relative w-auto pl-4 flex-initial">
            <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full  bg-red-500">
                <i class="fas fa-book"></i>
            </div>
            </div>
        </div>
        </div>
    </div>
    </a>

    <a href="users.php" class=" mt-4 w-full lg:w-6/12 xl:w-4/12 px-5">
    <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-4 xl:mb-0 shadow-lg">
        <div class="flex-auto p-4">
        <div class="flex flex-wrap">
            <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
            <h5 class="text-blueGray-400 uppercase font-bold text-xs">JUMLAH USERS</h5>
            <span class="font-semibold text-xl text-blueGray-700"><?php echo $totalUsers ?></span>
            </div>
            <div class="relative w-auto pl-4 flex-initial">
            <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full  bg-pink-500">
                <i class="fas fa-users"></i>
            </div>
            </div>
        </div>
        </div>
    </div>
    </a>

    <div class="mt-4 w-full lg:w-6/12 xl:w-4/12 px-5">
    <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
        <div class="flex-auto p-4">
        <div class="flex flex-wrap">
            <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
            <h5 class="text-blueGray-400 uppercase font-bold text-xs">JUMLAH SELURUH CHAPTER</h5>
            <span class="font-semibold text-xl text-blueGray-700"><?php echo $totalChapters ?></span>
            </div>
            <div class="relative w-auto pl-4 flex-initial">
            <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full  bg-lightBlue-500">
                <i class="fas fa-file"></i>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>

</div>
  
</body>
</html>