<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?php include_once("../routes/route.php"); ?>
</head>
<body>
    <!-- Navbar -->
    <?php include_once("../components/Navbar.php"); ?>

    <div class="px-28 py-5">
        <!-- Carousel -->
        <?php include_once("../components/Carousel.php"); ?>

        <div class="grid grid-cols-3 mb-5">
            <div class="col-span-2 mr-5">
                <div class="grid grid-cols-3 gap-4">
                    <?php 
                    include_once("../api/komik.php"); 
                    foreach($data3 as $komik) {
                        $komikID = $komik["komik_id"];
                        $countChapterSql = "SELECT COUNT(*) as chapter_id FROM chapter WHERE komik_id =  $komikID";
                        $resultCountChapter = mysqli_query($conn, $countChapterSql);
                        $rowCountChapter = mysqli_fetch_assoc($resultCountChapter);
                        $jmlchptr = $rowCountChapter['chapter_id'];
                    ?>
                    
                    <!-- CARD KOMIK -->
                    <div class="max-w-sm bg-white border-bl-2 border-br-2 border-gray-300 rounded-lg shadow-lg">
                        <a href="chapter.php?id=<?= $komik["komik_id"] ?>">
                            <img class="rounded-t-lg w-96 h-96 object-cover" src="../assets/img/<?= $komik["cover"]; ?>" alt="" />
                        </a>
                        <div class="py-3 px-2">
                            <a href="chapter.php?id=<?= $komik["komik_id"] ?>">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 line-clamp-1"><?= $komik["judul_komik"]; ?></h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 line-clamp-1"><?= $komik["deskripsi"]; ?></p>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                                <p class="ms-2 text-sm font-bold text-gray-900 dark:text-gray"><?= $komik["rating"]; ?></p>
                                <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400"></span>
                                <a href="chapter.php?komik_id=<?= $komik["komik_id"] ?>" class="text-sm font-medium text-gray-900 "><?= $jmlchptr ?> Chapter</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-span-1 border-2 py-2 px-4 h-full rounded-md">
                <h1 class="text-2xl font-extrabold">Trending Komik</h1>
                <table class="table-auto mt-4 mb-4">
                    <thead>
                        <tr class="border-b font-bold text-sm w-full">
                            <th class="px-6 border-r py-3 w-64">Nama</th>
                            <th class="px-6 py-3 w-64">Genre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 2;
                        include ("../api/result.php");

                        function compareBySaw($a, $b) {
                            return $b['nilai_saw'] - $a['nilai_saw'];
                        }
                        
                        // Mengurutkan array $data berdasarkan nilai_saw
                        usort($data, 'compareBySaw');
                        
                        $uniqueJudulKomik = array();
                            foreach ($data as $komik) {
                                if(!in_array($komik['judul_komik'], $uniqueJudulKomik)) {
                                    $uniqueJudulKomik[] = $komik['judul_komik'];
                        ?>
                        <tr class="border-t text-center text-sm w-full h-12 hover:bg-gray-100 cursor-pointer">
                            <td class="px-6 py-3 border-r w-64 hover:text-blue-500">
                                <a href="chapter.php?id=<?php echo $komik["komik_id"] ?>">
                                    <?= $komik["judul_komik"]; ?>
                                </a>
                            </td>
                            <td class="px-6 py-3 w-64 overflow-x-auto"><?= $komik["genre"]; ?></td>
                        </tr>
                        <?php }} ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div>
            <div class="grid grid-cols-4 gap-4">
                <?php 
                include_once("../api/komik.php"); 
                foreach($data2 as $komik) {
                    if ($komik["komik_id"] >= 4) {
                        $komikID = $komik["komik_id"];
                        $countChapterSql = "SELECT COUNT(*) as chapter_id FROM chapter WHERE komik_id =  $komikID";
                        $resultCountChapter = mysqli_query($conn, $countChapterSql);
                        $rowCountChapter = mysqli_fetch_assoc($resultCountChapter);
                        $jmlchptr = $rowCountChapter['chapter_id'];
                ?>
                    <div class="max-w-sm bg-white border-bl-2 border-br-2 border-gray-300 rounded-lg shadow-lg">
                        <a href="chapter.php?id=<?= $komik["komik_id"] ?>">
                            <img class="rounded-t-lg w-96 h-96 object-cover" src="../assets/img/<?= $komik["cover"]; ?>" alt="" />
                        </a>
                        <div class="py-3 px-2">
                            <a href="chapter.php?id=<?= $komik["komik_id"] ?>">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 line-clamp-1"><?= $komik["judul_komik"]; ?></h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 line-clamp-1"><?= $komik["deskripsi"]; ?></p>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                </svg>
                                <p class="ms-2 text-sm font-bold text-gray-900 dark:text-gray"><?= $komik["rating"]; ?></p>
                                <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400"></span>
                                <a href="chapter.php?komik_id=<?= $komik["komik_id"] ?>" class="text-sm font-medium text-gray-900 "><?= $jmlchptr ?> Chapter</a>
                            </div>
                        </div>
                    </div>
                <?php } } ?>
            </div>
            
        </div>
    </div>
</body>
</html>