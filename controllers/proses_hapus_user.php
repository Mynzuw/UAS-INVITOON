<?php

include '../modules/config.php';

//mengambil id yang ingin dihapus
if (isset($_POST['hapus_user'])) {
    $user_id = $_POST["user_id"];
    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM users WHERE user_id='$user_id' ";
    $hasil_query = mysqli_query($conn, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($conn).
       " - ".mysqli_error($conn));
    } else {
      echo "<script>alert('Data berhasil dihapus.');window.location='../admin/users.php';</script>";
    }
  }
?>
