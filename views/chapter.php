<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <?php include_once("../routes/route.php"); ?>
</head>
<body>
    <?php include_once("../components/Navbar.php"); ?>
    <?php include_once("../controllers/fungsiWaktu.php"); ?>
    
    <div class="px-56 py-5">
        <div class="grid grid-cols-2 mb-12">
            <div class="col-span-1 py-4">
                <?php include_once("../api/komik.php");
                $komik_id= $_GET['id'];
                $uniqueJudulKomik = array();

                foreach ($data2 as $komik) {
                    if ($komik_id == $komik["komik_id"]) {
                        if(!in_array($komik['judul_komik'], $uniqueJudulKomik)) {
                            $uniqueJudulKomik[] = $komik['judul_komik'];
                ?>
                <a href="#" class="flex flex-col bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-lg hover:bg-gray-100 mr-5">
                    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="../assets/img/<?= $komik["cover"] ?>" alt="">
                    <div class="flex flex-col p-4 leading-normal">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900"><?php echo $komik["judul_komik"] ?></h5>
                        <div class="flex mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 font-normal text-gray-700 dark:text-gray-400 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                            <p class="font-normal text-xs text-gray-700 dark:text-gray-400"><?php echo $komik["pengarang"] ?></p>
                        </div>
                        <p class="font-normal text-gray-700 dark:text-gray-400"><?php echo $komik["genre"] ?></p>
                        <div class="flex items-end content-end mt-auto">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-yellow-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                </svg>
                                <span class="ml-1"><?php echo $komik["rating"] ?></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-span-1 py-4">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Deskripsi</h5>
                <p class="text-justify line-clamp-11"><?php echo $komik["deskripsi"] ?></p>
            </div>
            <?php } } } ?>
        </div>

        <div class="px-12">
            <?php 
            include_once("../api/komik.php");
            $komik_id= $_GET['id'];
            foreach ($data as $komik) {
                if ($komik_id == $komik["komik_id"]) {
            
            ?>
            <a href="baca-chapter.php?id=<?= $komik["chapter_id"]; ?>" class="">
                <div class="flex justify-between mb-5 border-2 py-2 px-4 hover:bg-gray-100">
                    <div class="flex">
                        <img class="w-20 h-20 mr-5" src="../assets/img/<?= $komik["cover"] ?>" alt="">
                        <div class="flex items-center">
                            EPISODE <?php echo $komik["no_chapter"] ?>
                        </div>
                    </div>
                    <div class="flex justify-center items-center text-xs text-gray-400">
                        <div class="mr-2"><?php echo formatTanggal($komik["tanggal"]) ?></div>
                        <div class="flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                            <p class="text-xs text-gray-400"><?php echo $komik["likes"]?></p>     
                        </div>
                    </div>
                </div>    
            </a>
            <?php } } ?>
        </div>
    </div>
</body>
</html>