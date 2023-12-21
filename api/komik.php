<?php
// Hubungkan ke database
include_once("../modules/config.php");

// Inisialisasi array untuk menyimpan data berita
$data = array();

// Query untuk mengambil semua data dari tabel data_diri
$sql = "SELECT * FROM komik INNER JOIN chapter ON komik.komik_id=chapter.komik_id ORDER BY no_chapter DESC";

// Eksekusi Query
$result = mysqli_query($conn, $sql);

// Periksa apakah data ditemukan
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
} else {
    // Jika data tidak ditemukan, kirim respon JSON dengan pesan error
    $data['error'] = 'Data tidak ditemukan';
}


// Inisialisasi array untuk menyimpan data berita
$data2 = array();

// Query untuk mengambil semua data dari tabel data_diri
$sql2 = "SELECT * FROM komik ";

// Eksekusi Query
$result2 = mysqli_query($conn, $sql2);

// Periksa apakah data ditemukan
if (mysqli_num_rows($result2) > 0) {
    while ($row2 = mysqli_fetch_assoc($result2)) {
        $data2[] = $row2;
    }
} else {
    // Jika data tidak ditemukan, kirim respon JSON dengan pesan error
    $data2['error'] = 'Data tidak ditemukan';
}


// Inisialisasi array untuk menyimpan data berita
$data3 = array();

// Query untuk mengambil semua data dari tabel data_diri
$sql3 = "SELECT * FROM komik LIMIT 3 ";

// Eksekusi Query
$result3 = mysqli_query($conn, $sql3);

// Periksa apakah data ditemukan
if (mysqli_num_rows($result3) > 0) {
    while ($row3 = mysqli_fetch_assoc($result3)) {
        $data3[] = $row3;
    }
} else {
    // Jika data tidak ditemukan, kirim respon JSON dengan pesan error
    $data3['error'] = 'Data tidak ditemukan';
}
?>