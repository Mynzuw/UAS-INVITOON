<?php
function time_elapsed_string($datetime, $full = false) {
    // Tentukan zona waktu
    $timezone = new DateTimeZone('Asia/Jakarta'); // Ganti dengan zona waktu yang sesuai

    // Waktu sekarang dengan zona waktu yang ditentukan
    $now = new DateTime('now', $timezone);

    // Waktu komentar dengan zona waktu yang ditentukan
    $ago = new DateTime($datetime, $timezone);

    // Hitung selisih waktu
    $diff = $now->diff($ago);

    // Penyesuaian minggu
    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    // Array untuk menyimpan satuan waktu
    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );

    // Loop untuk membentuk string waktu relatif
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    // Hanya ambil satu satuan waktu jika tidak membutuhkan waktu lengkap
    if (!$full) $string = array_slice($string, 0, 1);

    // Gabungkan string waktu dan tambahkan 'ago'
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function formatTanggal($datetimeFromDatabase) {
    // Ubah format tanggal dan waktu
    $timestamp = strtotime($datetimeFromDatabase);
    $formattedDate = date('l, j F Y', $timestamp);

    return $formattedDate;
}
?>

