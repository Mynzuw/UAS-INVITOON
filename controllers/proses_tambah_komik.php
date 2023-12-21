<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../modules/config.php';

	// membuat variabel untuk menampung data dari form
  $judul_komik   = $_POST['judul_komik'];
  $deskripsi     = $_POST['deskripsi'];
  $genre    = $_POST['genre'];
  $pengarang    = $_POST['pengarang'];
  $cover = $_FILES['cover']['name'];


//cek dulu jika ada gambar komik jalankan coding ini
if($cover != "") {
  $ekstensi_diperbolehkan = array('png','jpg', 'jpeg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $cover); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['cover']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$cover; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, '../assets/img/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO komik (judul_komik, deskripsi, genre, pengarang, cover) VALUES ('$judul_komik', '$deskripsi', '$genre', '$pengarang', '$nama_gambar_baru')";
                  $result = mysqli_query($conn, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($conn).
                           " - ".mysqli_error($conn));
                  } else {
                    //tampil alert dan akan redirect ke halaman komik.php
                    //silahkan ganti komik.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='../admin/komik.php';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='../admin/komik.php';</script>";
            }
} else {
   $query = "INSERT INTO komik (judul_komik, deskripsi, genre, pengarang, cover) VALUES ('$judul_komik', '$deskripsi', '$genre', '$pengarang', null)";
                  $result = mysqli_query($conn, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($conn).
                           " - ".mysqli_error($conn));
                  } else {
                    //tampil alert dan akan redirect ke halaman komik.php
                    //silahkan ganti komik.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='../admin/komik.php';</script>";
                  }
}