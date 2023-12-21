<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="Logo Invitoon 1.png">
    <title>INVITOON</title>
    <?php include_once("../routes/route.php"); ?>
    <style>
        .img-cover {
            width: 209px;
            height: 205px
        }
        .img-title {
            width: 207px;
        }
    </style>
</head>
<body>
    <?php include_once("../components/Navbar.php"); ?>

        <div class="border-b py-3 px-28">
            <nav class="navbar-sticky bg-white sticky w-full z-10 top-0 left-0 right-0 border-gray-200;">
                <div class="max-w-full-xl flex flex-wrap items-center justify-between mx-auto px-28">
                    <ul class="flex" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist"> 
                        <div class="grid grid-cols-10">
                            <?php  
                            include("../api/komik.php");
                            $uniqueGenre = array();
                            foreach ($data as $komik) {
                                if (!in_array($komik['genre'], $uniqueGenre)) {
                                    $uniqueGenre[] = $komik['genre'];
                            ?> 
                                <div class="col-span-1 flex items-center justify-center">
                                    <li class="font-reguler text-xl mr-8 text-center">
                                        <button id="<?= $komik['genre'] ?>-tab" data-tabs-target="#<?= $komik['genre'] ?>" type="button" role="tab" aria-controls="<?= $komik['genre'] ?>" aria-selected="false" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0" aria-current="page">
                                            <?php echo $komik["genre"]; ?>
                                        </button>
                                    </li>
                                </div>
                               
                            <?php 
                                    }
                                }
                            ?>
                        </div>
                    </ul>
                </div>
                
            </nav>
            
        </div>

      
        <div class="py-5 px-28">
            <div class="px-28">
                <div id="default-tab-content">
                    <?php 
                        foreach ($uniqueGenre as $genre) {
                    ?>
                    
                    <div class="" id="<?= $genre ?>" role="tabpanel" aria-labelledby="<?= $genre ?>-tab">
                        <h1 class="text-xl font-bold mb-3"><?php echo $genre ?></h1>
                        <div class="flex">
                            <div class="grid grid-cols-5 gap-2">
                            <?php
                            foreach ($data2 as $komik) {
                            if ($komik['genre'] == $genre) {
                                
                            ?>

                                <div class="col-span-1 mb-5 border-2">
                                    <a href="chapter.php?id=<?php echo $komik["komik_id"] ?>">
                                        <div class="rounded-md">
                                            <img class="img-cover mr-5" src="../assets/img/<?= $komik["cover"] ?>" alt="">
                                            <div class="flex bg-white img-title py-1 px-1 img-title hover:bg-gray-100">
                                                <p class="hover:text-blue-800"><?php echo $komik["judul_komik"] ?></p>
                                            </div>
                                        </div>
                                    </a>   
                                </div>
                                <?php
                                }
                            }
                            ?>
                            </div>
                           
                           
                        </div>    
                    </div>
                    <?php
                        }
                    ?>
                </div>   
            </div>
           
        </div>
    </div>  
</body>
</html>