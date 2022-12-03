<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: ../login.php");
  exit;
}
require "../config.php";
require "fungtion.php";
if(isset($_GET['id_villa'])){
  $query = mysqli_query($db,"SELECT * FROM data_villa WHERE id_villa=$_GET[id_villa]");
  $result = mysqli_fetch_assoc($query);
  $nama_villa = $result['nama_villa'];
  $deskripsi_villa = $result['deskripsi_villa'];
  $harga_villa = $result['harga_villa'];
  $alamat_villa = $result['alamat_villa'];
}

if(isset($_POST['submit'])){
  $nama_villa = $_POST['nama_villa'];
  $deskripsi_villa = $_POST['deskripsi_villa'];
  $harga_villa = $_POST['harga_villa'];
  $alamat_villa = $_POST['alamat_villa'];
  $gambar_villa = upload();

  $query = mysqli_query($db,
    "UPDATE data_villa SET 
    nama_villa='$nama_villa',
    gambar_villa='$gambar_villa',
    deskripsi_villa='$deskripsi_villa',
    harga_villa='$harga_villa',
    alamat_villa='$alamat_villa' 
    WHERE id_villa=$_GET[id_villa]");
  if($query){
    header("Location:kelolaVilla.php");
  } else {
    echo "Update gagal";
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
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="../user/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
  <!-- <script src="../admin/scriptAdm.js" defer> </script> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- <link rel="stylesheet" href="style.css"> -->
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
<section class="book" id="book">
  <h1 class="judul">Edit Data Villa</h1>
  <div class="row">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="inputBox">
        <h3>Nama Villa</h3>
        <input type="text" name="nama_villa" class="form-text" value='<?=$nama_villa?>'>        
      </div>

      <div class="inputBox">
        <h3>Gambar</h3>
        <input type="file" name="gambar_villa" class="form-text">
      </div>

      <div class="inputBox">
        <h3>Deskripsi</h3>
        <textarea name="deskripsi_villa" require><?=$deskripsi_villa?></textarea>        
      </div>

      <div class="inputBox">
        <h3>Harga Villa</h3>
        <input type="text" name="harga_villa" class="form-text" value='<?=$harga_villa?>'>        
      </div>

      <div class="inputBox">
        <h3>Alamat</h3>
        <textarea name="alamat_villa" require><?=$alamat_villa?></textarea>        
      </div>

      <input type="submit" name="submit" value="Perbarui Data" class="btn">
    </form>
  </div>
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