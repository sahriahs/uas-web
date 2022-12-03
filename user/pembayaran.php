<?php
session_start();
require '../config.php';

if (!isset($_SESSION['user'])) {
  header("Location: ../login.php");
  exit;
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
  <style>
    .table-pembayaran{
      margin-top: 100px;
      /* align-content: center;
      align-items: center; */
      align-self: center;
    }
    .table-pembayaran table{
      align-content: center;
      border-color: black;
      border: 5px;
    }
  </style>
</head>

<body>
  <header>
    <div id="menu-bar" class="fas fa-bars"></div>
    <img src="images/logo.png" alt="" width="80px"></a>
    <nav class="navbar">
      <a href="index.php">home</a>
      <a href="book.php">packages</a>
      <a href="gallery.php">gallery</a>
      <a href="#footer">about</a>
      <a href="pembayaran.php">Pay</a>
    </nav>
  </header>
  <div class="table-pembayaran">
    <table width="80%">
      <tr>
        <th>No</th>
        <!-- <th>Nama Pengguna</th>
        <th>Nomor Telp</th> -->
        <th>Nama Villa</th>
        <th>Tanggal Datang</th>
        <th>Tanggal Pergi</th>
        <th>Pembayaran</th>
        <th>Status Pembayaran</th>
        <th>Tindakan</th>
      </tr>
      <?php
      require "../config.php";
      $id_user = $_SESSION['id'];
      $query = mysqli_query($db, "SELECT id_sewa, nama_villa, tgl_datang, tgl_pergi, harga_villa, status_pembayaran
                                    FROM penyewaan_villa 
                                    JOIN data_villa ON (penyewaan_villa.id_villa = data_villa.id_villa)
                                    -- JOIN user ON (penyewaan_villa.id = user.id)
                                    WHERE penyewaan_villa.id = $id_user");
      $i=0;
      while ($row = mysqli_fetch_assoc($query)) {
        $i++;
      ?>
        <tr>
          <td><?= $i ?></td>
          <td><?= $row['nama_villa'] ?></td>
          <td><?= $row['tgl_datang'] ?></td>
          <td><?= $row['tgl_pergi'] ?></td>
          <td><?= $row['harga_villa'] ?>/day</td>
          <td><?= $row['status_pembayaran'] ?></td>
          <?php
          if ($row['status_pembayaran'] == 'Pending') {
          ?>
            <td><a href="bayar.php?id_sewa=<?= $row['id_sewa'] ?>" class="btn">bayar</a></td>
          <?php
          } 
          else {
          ?>
            <td>selesai</td>
          <?php
          }
          ?>
        </tr>
      <?php
      }
      ?>
    </table>    
  </div>



  <br>
  <br>
  <br>
  <br>
  <br>
  <br>

  <section class="footer" id="footer">

    <div class="box-container">

      <div class="box">
        <h3>about us</h3>
        <p>Taurinesia Villa merupakan villa terbaik di Samarinda dengan segala keindahan panrai dan puncak, dengan full services, siap menjadi tempat liburan mu berbeda ! </p>
      </div>
      <div class="box">
        <h3>branch locations</h3>
        <a href="#packages">juanda Villa</a>
        <a href="#packages"> Antasari Villa</a>
        <a href="#packages">Pramuka Villa</a>
        <a href="#packages">Perjuangan Villa</a>
      </div>
      <div class="box">
        <h3>quick links</h3>
        <a href="#home">home</a>
        <a href="#pacakages">packages</a>
        <a href="#gallery">gallery</a>
        <a href="#contact">about</a>
        </nav>
      </div>
      <div class="box">
        <h3>follow us</h3>
        <a href="#">facebook</a>
        <a href="#">instagram</a>
        <a href="#">twitter</a>
        <a href="#">linkedin</a>
      </div>

    </div>

    <h1 class="credit"> created by <span> Kelompok 2 </span> | The luxuries of a Resort with the Intimacy of Home ! </h1>

  </section>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <!-- custom js file link  -->
  <script src="js/script.js"></script>

</body>

</html>