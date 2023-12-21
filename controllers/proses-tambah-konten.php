<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../modules/config.php';

	// membuat variabel untuk menampung data dari form
  $chapter_id   = $_POST['chapter_id'];
  $content = $_FILES['content']['name'];


//cek dulu jika ada gambar komik jalankan coding ini
if($content != "") {
  $ekstensi_diperbolehkan = array('png','jpg','webp'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $content); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['content']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $chapter_id.'-'.$angka_acak.'-'.$content; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, '../assets/content/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO content (chapter_id, content) VALUES ('$chapter_id', '$nama_gambar_baru')";
                  $result = mysqli_query($conn, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($conn).
                           " - ".mysqli_error($conn));
                  } else {
                    //tampil alert dan akan redirect ke halaman isi_chapter.php
                    //silahkan ganti isi_chapter.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='../admin/isi_chapter.php?chapter_id=$chapter_id';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='../admin/isi_chapter.php?chapter_id=$chapter_id';</script>";
            }
} else {
   $query = "INSERT INTO content (chapter_id,  content) VALUES ('$chapter_id', null)";
                  $result = mysqli_query($conn, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($conn).
                           " - ".mysqli_error($conn));
                  } else {
                    //tampil alert dan akan redirect ke halaman isi_chapter.php
                    //silahkan ganti isi_chapter.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='../admin/isi_chapter.php?chapter_id=$chapter_id';</script>";
                  }
}