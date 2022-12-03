<?php
session_start();
require '../config.php';

if (!isset($_SESSION['user'])) {
  header("Location: ../login.php");
  exit;
}

if(isset($_GET['id_sewa'])){
  $id_sewa = $_GET['id_sewa'];
  $query = mysqli_query($db, "SELECT id_sewa, nama_villa, gambar_villa, deskripsi_villa, alamat_villa, harga_villa, tgl_datang, tgl_pergi, status_pembayaran 
                              FROM penyewaan_villa 
                              JOIN data_villa ON (penyewaan_villa.id_villa = data_villa.id_villa)
                              -- JOIN user ON (penyewaan_villa.id = user.id)
                              where id_sewa = $id_sewa"); 
  $result = mysqli_fetch_assoc($query);
  
  // $nama_pengguna = $result['nama_pengguna'];
  // $no_telp = $result['no_telp'];
  $gambar_villa = $result['gambar_villa'];
  $deskripsi_villa = $result['deskripsi_villa'];
  $alamat_villa = $result['alamat_villa'];
  $harga_villa = $result['harga_villa'];
  $nama_villa = $result['nama_villa'];
  $tgl_datang = $result['tgl_datang'];
  $tgl_pergi = $result['tgl_pergi'];
  $status_pembayaran = $result['status_pembayaran'];
}

if(isset($_POST['bayar'])){
  $bukti_pembayaran = $_POST['bukti_pembayaran'];
  $query = "UPDATE penyewaan_villa SET status_Pembayaran = 'Done', bukti_pembayaran = '$bukti_pembayaran'  WHERE id_sewa = $id_sewa";
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
<section class="book" id="book">
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
        <!-- <h3>Nama</h3>
        <input type="text" name="nama_penyewa" placeholder="Nama Penyewa" value="<?=$nama_pengguna?>" disabled>
      </div>
      <div class="inputBox">
        <h3>No. Telpon</h3>
        <input type="text" name="no_telp" placeholder="Nomor telpon penyewa" value="<?=$no_telp?>" disabled>
      </div> -->
      <div class="inputBox">
        <h3>Tanggal Datang</h3>
        <input type="text" name="tanggal_datang" value="<?=$tgl_datang?>" disabled>
      </div>
      <div class="inputBox">
        <h3>tanggal Pergi</h3>
        <input type="text" name="tanggal_pergi" value="<?=$tgl_pergi?>" disabled>
      </div>
      <div class="inputBox">
        <h3>status pembayaran</h3>
        <input type="text" name="status_pembayaran" value="<?=$status_pembayaran?>" disabled>
      </div>
      <div class="inputBox">
        <h3>bukti pembayaran</h3>
        <input type="text" name="bukti_pembayaran" required>
      </div>
      <input type="submit" name="bayar" class="btn" value="Bayar">
    </form>
  </div>
</section>
</body>
</html>