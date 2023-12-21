<?php
include '../modules/config.php';

if (isset($_POST['hapus_chapter'])) {
$chapter_id = $_POST["chapter_id"];

// Menghapus empat karakter terakhir dari string
$chapter_id_tanpa_angka_belakang = substr($chapter_id, 0, -4);

// Menampilkan hasil
echo $chapter_id_tanpa_angka_belakang;
//mengambil id yang ingin dihapus

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM chapter WHERE chapter_id='$chapter_id' ";
    $hasil_query = mysqli_query($conn, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($conn).
       " - ".mysqli_error($conn));
    } else {
      echo "<script>alert('Data berhasil dihapus.');window.location='../admin/komik-detail.php?komik_id=$chapter_id_tanpa_angka_belakang';</script>";
    }
  }
?>