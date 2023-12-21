<?php
include '../modules/config.php';

//mengambil id yang ingin dihapus
if (isset($_POST['hapus_komik'])) {
    $komik_id = $_POST["komik_id"];
    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM komik WHERE komik_id='$komik_id' ";
    $hasil_query = mysqli_query($conn, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($conn).
       " - ".mysqli_error($conn));
    } else {
      echo "<script>alert('Data berhasil dihapus.');window.location='../admin/komik.php';</script>";
    }
  }
  ?>
