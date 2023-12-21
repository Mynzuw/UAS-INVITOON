<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trending</title>
    <?php include_once("../routes/route.php"); ?>
</head>
<body>
    <?php include_once("../components/Navbar.php"); ?>
    
    <div class="px-28 py-5">
        <div class="px-28 flex items-center justify-center">
            <div class="grid grid-cols-2 gap-4"> 
                <div class="col-span-1">
                    <div class="border-2 rounded-md py-4 px-4">
                        <h1 class="text-xl font-bold mb-4">BARU & TRENDING</h1>
                        <img src="../assets/img/Marry.jpg" class="h-96 w-full mb-3" alt="">
                        <p class="text-sm text-gray-500">Romantis</p>
                        <h1 class="text-2xl font-medium mb-1">Marry Me Instead</h1>
                        <p class="mb-1">Tin</p>
                        <p class="text-justify text-gray-500">Ju Hakyung, calon penerus Hotel Juwon, tengah dihadapkan pada pernikahan bisnis. Tiga minggu sebelum pernikahannya, ia menerima lamaran... Namun lamaran tersebut bukan datang dari calon mempelai pria, melainkan adik dari orang yang seharusnya ia nikahi! Seketika, muncul firasat buruk bahwa alur hidup Hakyung akan menyimpang dari jalur yang semestinya lurus—bersama dengan pria yang dulu merupakan partner kenakalan pertamanya di masa remaja.</p>
                    </div>
                </div>

                <div class="col-span-1">
                    <div class="border-2 rounded-md py-4 px-8">
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
                       
                        <div class="flex mb-5">
                            <div class="flex items-center justify-center">
                                <a href="chapter.php?id=<?php echo $komik["komik_id"] ?>">
                                    <img src="../assets/img/<?php echo $komik['cover']?>" class="h-24 w-24 mr-8 hover:bg-gray-100" alt="">
                                </a>
                            </div>
                            <div class="flex items-center justify-center">
                                <p class="text-xl font-bold mr-3"><?php echo $no ?></p>
                                <div class="flex-row">
                                    <p class="text-gray-500 text-xs"><?php echo $komik['genre']?></p>
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <a href="chapter.php?id=<?php echo $komik["komik_id"] ?>">
                                                <h1 class="text-xl font-bold hover:text-blue-700"><?php echo $komik['judul_komik']?></h1>
                                            </a>
                                        </div>
                                    </div>
                                   
                                    <p class="text-xs"><?php echo $komik['pengarang']?></p>
                                    
                                    
                                </div>
                            </div>
                        </div>
                        <?php $no++;} 
                        }?>
                    </div>
                </div>
            </div>
        </div>
       

</body>
</html>