<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once("../routes/route.php"); ?>
</head>
<body>
    <!-- NAVBAR -->
    <?php include_once("../components/Navbar.php"); ?>

    <!-- KONTEN -->
    <div class="grid grid-cols-3">
        <div class="col-span-1"></div>
        <div class="col-span-1">
        <?php 
        include_once("../api/content.php");
        $chapter_id = $_GET['id'];
        $contentFound = false;

        foreach($data as $komik) {
            if ($chapter_id == $komik["chapter_id"]) {
                $contentFound = true;
                ?>
                <img src="../assets/content/<?= $komik["content"] ?>" alt="">
                <?php
            }
        }
        
        // Jika chapter ID tidak ditemukan, tampilkan pesan "DALAM TAHAP PENGEMBANGAN"
        if (!$contentFound) {
            echo "<div class='flex items-center justify-center content-center h-screen text-3xl font-bold'>DALAM TAHAP PENGEMBANGAN</div>";
        } else {
            // Jika konten ditemukan, maka include CommentsLight.php
            include_once("../components/Comments.php");
        }
        ?>
    </div>
        <div class="col-span-1"></div>
    </div>
    
    <!-- KOMEN -->
    
</body>
</html>