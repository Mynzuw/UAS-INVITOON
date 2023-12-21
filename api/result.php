<?php
// Hubungkan ke database
include "../modules/config.php";

// Inisialisasi array untuk menyimpan data berita
$data = array();

// Query untuk mengambil semua data dari tabel data_diri
$sql = "SELECT * FROM saw_result INNER JOIN komik ON saw_result.komik_id=komik.komik_id";

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

// // Tampilkan data dalam format JSON
// echo json_encode($data);

// Tutup koneksi database
// mysqli_close($conn);

?>