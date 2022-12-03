<?php
  session_start();
  require '../config.php';

  if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit;
  }
if(isset($_GET['id_villa'])){
  $query = mysqli_query($db,"SELECT * FROM data_villa WHERE id_villa=$_GET[id_villa]");
  $result = mysqli_fetch_assoc($query);
  $id_villa = $result['id_villa'];
  $nama_villa = $result['nama_villa'];
  $gambar_villa = $result['gambar_villa'];
  $deskripsi_villa = $result['deskripsi_villa'];
  $harga_villa = $result['harga_villa'];
  $alamat_villa = $result['alamat_villa'];
}

if(isset($_POST['Pesan'])){
  $id_user = $_SESSION['id'];
  $tanggal_datang = $_POST['tanggal_datang'];
  $tanggal_pergi = $_POST['tanggal_pergi'];

  $query = "INSERT INTO penyewaan_villa (id_villa, id,	tgl_datang,	tgl_pergi, status_pembayaran)
              VALUES ('$id_villa', '$id_user',	'$tanggal_datang',	'$tanggal_pergi', 'Pending')";
  mysqli_query($db, $query);
  if($query){
    header("Location:pembayaran.php");
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
  <title> Taurinesia Villa </title>
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
  <script src="script.js" defer> </script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
  <header>

    <div id="menu-bar" class="fas fa-bars"></div>
    <img src="images/logo.png" alt="" width="80px">

  </header>

  <br>
  <br>
  <br>
  <br>

  <section class="book" id="book">

    <h1 class="heading">
      <span>b</span>
      <span>o</span>
      <span>o</span>
      <span>k</span>
      <span class="space"></span>
      <span>n</span>
      <span>o</span>
      <span>w</span>
    </h1>
    <div class="row">
      <div class="image">
        <!-- <img src="images/b1.png" alt=""> -->
        <section class="packages" id="packages" >
          <div class="box-container">
            <div class="box">
              <img src="../img/<?= $gambar_villa?>" alt="">
              <div class="content">
                <h3> <i class="fas fa-map-marker-alt"></i><?= $nama_villa?></h3>
                <p><?= $deskripsi_villa?></p>
                <p><?= $alamat_villa?></p>
                <div class="price">Rp<?= $harga_villa?>/day</div>
              </div>
            </div>
          </div>
        </section>
      </div>

      <form action="" method="post">
        <div class="inputBox">
          <h3>Tanggal Datang</h3>
          <input type="date" name="tanggal_datang" required>
        </div>
        <div class="inputBox">
          <h3>tanggal Pergi</h3>
          <input type="date" name="tanggal_pergi" required>
        </div>
        <input type="submit" name="Pesan" class="btn" value="Booking">
      </form>
    </div>
  </section>
</body>