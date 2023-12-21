<?php
  include('..modules/config.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  include('header.php');
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>CRUD Produk dengan gambar - Gilacoding</title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: #0D6EFD;
      }
    button {
          background-color: #0D6EFD;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: #0D6EFD;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
    </style>
  </head>
  <body>
      <center>
        <h1>Tambah Komik</h1>
      <center>
      <form method="POST" action="proses_tambah.php" enctype="multipart/form-data" >
      <section class="base">
        <div>
          <label>Judul Komik</label>
          <input type="text" name="judul_komik" autofocus="" required="" />
        </div>
        <div>
          <label>Deskripsi</label>
         <input type="text" name="deskripsi" />
        </div>
        <div>
          <label>Genre</label>
         <input type="text" name="genre" required="" />
        </div>
        <div>
          <label>Pengarang</label>
         <input type="text" name="pengarang" required="" />
        </div>
        <div>
          <label>Cover Komik</label>
         <input type="file" name="cover" required="" />
        </div>
        <div>
         <button type="submit">Simpan Komik</button>
        </div>
        </section>
      </form>

      <?php
      include('footer.php')
      ?>
  </body>
</html>