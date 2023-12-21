<?php
// Koneksi ke database (gantilah dengan informasi koneksi sesuai database Anda)
include('../modules/config.php'); 

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$komik_id   = $_POST['komik_id'];
$no_chapter  = $_POST['no_chapter'];
$chapter_id = $komik_id*10000 + $no_chapter;



// Cek apakah tombol "Edit Data" ditekan
if(isset($_POST['edit_no_chapter'])) {
    // Query SQL untuk menyisipkan data ke database
   
    $sql = "UPDATE chapter SET komik_id = '$komik_id', no_chapter = '$no_chapter', chapter_id = '$chapter_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan ke database." ;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tutup koneksi ke database
$conn->close();
?>