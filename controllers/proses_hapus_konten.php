<?php
include '../modules/config.php';

if (isset($_POST['hapus_konten'])) {
 
    $content = $_POST["content"];
    $filename = $_POST["content"];

    // Split the string based on the hyphen
    $parts = explode("-", $filename);

    // Get the first part (index 0)
    $desiredValue = $parts[0];

    // Output the result
    echo $desiredValue;
    //mengambil id yang ingin dihapus
     //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM content WHERE content='$content' ";
    $hasil_query = mysqli_query($conn, $query);

   

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($conn).
       " - ".mysqli_error($conn));
    } else {
      echo "<script>alert('Data berhasil dihapus.');window.location='../admin/isi_chapter.php?chapter_id=$desiredValue';</script>";
    }
  }
?>
