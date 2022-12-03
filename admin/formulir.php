<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: ../login.php");
  exit;
}
require 'fungtion.php';
  if(isset($_POST['submit'])){
    if(tambah($_POST)!=0){
      echo "
        <script>
          alert('Tidak berhasil menambahkan file');
        </script>
      ";
      include("Location:formulir.php");
    }
    else{
      echo "
        <script>
          alert('Berhasil menambahkan file');
        </script>
      ";
      header("Location:kelolaVilla.php");
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Taurinesia Villa</title>
  <!-- <link rel="stylesheet" href="styleAdmin.css"> -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="../user/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
  <!-- <script src="../admin/scriptAdm.js" defer> </script> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <style>
    .book h1{
      font-size: 28px;
      margin: 20px 0;
      text-align: center;
    }
    .book .inputBox textarea{
      padding: 15px;
      outline: none;
      resize: none;
    }
    textarea::-webkit-scrollbar{
      width: 0px;
    }
  </style>
</head>
<body>
  <!-- <h1 class="judul" align="center"><br><br> Tambah Data villa</h1> -->
  <section class="book" id="book">
    <h1 class="judul"">Tambah Data Villa</h1>
    <div class="row">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="inputBox">
          <h3>Nama Villa</h3>
          <input type="text" name="nama_villa" class="form-text" require>
        </div>

        <div class="inputBox">
          <h3>Gambar</h3>
          <input type="file" name="gambar_villa" class="form-text">
        </div>
        
        <div class="inputBox">
          <h3>Deskripsi</h3>
          <textarea name="deskripsi_villa" require></textarea>
        </div>

        <div class="inputBox">
          <h3>Harga Villa</h3>
          <input type="text" name="harga_villa" class="form-text" required>
        </div>

        <div class="inputBox">
          <h3>Alamat</h3>
          <textarea name="alamat_villa" require></textarea>
        </div>

        <input type="submit" name="submit" value="Kirim" class="btn">
      </form>
    </div>
  </section>
  <script>
    const textarea = document.querySelector("textarea");
    textarea.addEventListener("keyup", e =>{
      textarea.style.height = "auto";
      let scHeight = e.target.scrolHeight;
      textarea.style.height = `${scHeight}px`;
    })
  </script>
</body>
</html>