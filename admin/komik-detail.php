<?php
include "header.php";
?>
<body  class="bg-gray-200">
<?php
include("../modules/config.php");
?>
<?php
    $komik_id=0;
    if (isset($_GET["komik_id"])) {
        $komik_id = $_GET["komik_id"];
        $komik_id = mysqli_real_escape_string($conn, $komik_id);
    }
    $sql = "SELECT * FROM komik WHERE komik_id=$komik_id";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $id = $row["komik_id"];
        $judul_komik = $row["judul_komik"];
        $deskripsi = $row["deskripsi"];
        $cover = $row["cover"];
    } else {
        $id = "";
        $judul_komik = "";
        $deskripsi = "";
        $cover = "";
    }
    mysqli_close($conn);
?>
<main>
<!-- Breadcrumb -->
<nav class="mx-5 mt-10 flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
  <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
    <li class="inline-flex items-center">
      <a href="komik.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
        </svg>
        KOMIK
      </a>
    </li>
    <li aria-current="page">
      <div class="flex items-center">
        <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">KOMIK DETAIL</a>
      </div>
    </li>
  </ol>
</nav>
<div class="p-10"></div>

<span class="p-10 self-center text-2xl font-semibold whitespace-nowrap">KOMIK DETAIL MANAGEMENT</span>
<p class="p-10">
    Tempat untuk mengelola komik seperti menambahkan, mengedit, dan menghapus.
</p>
</div>

<div class="grid grid-cols-2">
<div class="ml-10">
<a href="#" class="flex flex-col bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="../admin/gambar/<?= $row["cover"]; ?>" alt="">
    <div class=" p-4 leading-normal">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?= $row["judul_komik"]; ?></h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Pengarang : <?= $row["pengarang"]; ?></p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Genre : <?= $row["genre"]; ?></p>
    </div>
</a>
</div>
<div class="ml-[-5rem] mt-5 mr-20">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-900">Deskripsi</h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?= $row["deskripsi"]; ?></p>
    </div>
</a>
</div>
</div>

<div class="p-10">
<!-- Modal toggle -->
<button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
  Tambah Chapter
</button>


<!-- Main modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Tambah Chapter 
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" method="POST" action="../controllers/proses-tambah-chapter.php" enctype="multipart/form-data">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Komik ID</label>
                        <input type="number" name="komik_id" id="komik_id" class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $row["komik_id"]; ?>">
                    </div>

                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Chapter</label>
                        <input type="number" name="no_chapter" id="no_chapter" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tulis Nomor Chapter" required="">
                    </div>
                </div>
                <button type="submit" name="tambah" id="tambah" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Tambah Chapter baru
                </button>

            </form>
            
        </div>
        
    </div>
    
</div>
</div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg p-10">


    <table class="mt-5 w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
<tr>
                <th scope="col" class="px-6 py-3">
                    KOMIK ID
                </th>
                <th scope="col" class="px-6 py-3">
                    CHAPTER ID
                </th>
                <th scope="col" class="px-6 py-3">
                    NO CHAPTER
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
<?php 
include("../modules/config.php");

$komik_id=0;
    if (isset($_GET["komik_id"])) {
        $komik_id = $_GET["komik_id"];
        $komik_id = mysqli_real_escape_string($conn, $komik_id);
    }

 $sql = "SELECT * FROM chapter WHERE komik_id=$komik_id ORDER BY no_chapter DESC";
    
 $result = mysqli_query($conn,$sql);
 if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
?>
        <tr class="odd:bg-white odd:dark:bg-gray-300 even:bg-gray-50 even:dark:bg-gray-100 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-gray">
                <?= $row["komik_id"]; ?>
                </th>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-gray">
                <?= $row["chapter_id"]; ?>
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-gray">
                <?= $row["no_chapter"]; ?>
                </td>
                <td class="px-6 py-4">
                    <a href="isi_chapter.php?chapter_id=<?= $row["chapter_id"]; ?>" class="p-5 font-medium text-blue-600 dark:text-blue-500 hover:underline">MANAGE CHAPTER</a>
                
<form action="../controllers/proses_hapus_chapter.php" method="POST">
<input type="hidden" name="hapus_chapter" value="true">
<input type="hidden" name="chapter_id" value="<?= $row["chapter_id"]; ?>">
<button type="submit" href="../controllers/proses_hapus_chapter.php?chapter_id=<?= $row["chapter_id"]; ?>" class="p-5 font-medium text-red-600 dark:text-red-500 hover:underline" onclick="return confirm('Anda yakin akan menghapus data ini?')">DELETE CHAPTER</button>
</form> 
                    
                </td>
            </tr>
<?php
 }
}
mysqli_close($conn);
?>

        </tbody>
    </table>
</div>


</main>



        
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script> let table = new DataTable("#tableku"); </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>

        
</body>
</html>