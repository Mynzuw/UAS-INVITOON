<?php

// Koneksi ke database
include "../modules/config.php";

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Hapus semua data dari tabel saw_result
$sqlDeleteSAW = "DELETE FROM saw_result";
$conn->query($sqlDeleteSAW);

// Query untuk mengambil data komik
$sql = "SELECT komik_id, judul_komik, rating FROM komik";
$result = $conn->query($sql);

// Loop melalui hasil query
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Menghitung rata-rata likes (anda perlu menyesuaikan query sesuai kebutuhan)
        $sqlLikes = "SELECT AVG(likes) AS average_likes FROM chapter WHERE komik_id = " . $row['komik_id'];
        $resultLikes = $conn->query($sqlLikes);
        $averageLikes = ($resultLikes->num_rows > 0) ? $resultLikes->fetch_assoc()['average_likes'] : 0;

        // Menghitung SAW
        $sawValue = ($row['rating'] * 0.6) + ($averageLikes * 0.4);

        // Menyimpan nilai SAW ke dalam database
        $sqlSaveSAW = "INSERT INTO saw_result (komik_id, judul_komik, nilai_saw) VALUES (" . $row['komik_id'] . ", '" . $row['judul_komik'] . "', " . $sawValue . ")";
        $conn->query($sqlSaveSAW);
    }
} else {
    echo "Tidak ada data komik.";
}

// Tutup koneksi
$conn->close();
?>