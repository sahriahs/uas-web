<?php
session_start();
if (!isset($_SESSION['admin'])) {
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
  <title>Taurinesia Villa</title>
  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
  <!-- style -->
  <link rel="stylesheet" href="styleAdmin.css">
  <link rel="stylesheet" href="../user/style.css">

  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="sidebar">
      <div id="menu-button">
        <input type="checkbox" name="menu-checkbox" id="menu-checkbox">
        <label for="menu-checkbox" id="menu-label">
          <div id="hamburger"></div>
        </label>
      </div><br><br>

      <div class="header">
        <div class="list-item">
          <a href="index.php">
            <img src="assets/logo.png" alt="" class="icon" width="50px">
            <span class="description-header">Taurinesia Villa</span>
          </a>
        </div>
        <div class="illustration">
          <img src="assets/10586 1.svg" alt="">
        </div>
      </div>

      <div class="main">
        <div class="list-item">
          <a href="index.php">
            <img src="assets/dashboard.svg" alt="" class="icon">
            <span class="description">Dashboard</span>
          </a>
        </div>
        <div class="list-item">
          <a href="kelolaVilla.php">
            <img src="assets/category.svg" alt="" class="icon">
            <span class="description">Kelola Villa</span>
          </a>
        </div>
        <div class="list-item">
          <a href="historyPengunjung.php">
            <img src="assets/history.svg" alt="" class="icon">
            <span class="description">History Pengunjung</span>
          </a>
        </div>
        <div class="list-item">
          <a href="#">
            <img src="assets/help.svg" alt="" class="icon new">
            <span class="description">Kritik & Saran</span>
          </a>
        </div>
        <div class="list-item">
          <a href="../logout.php">
          <img src="assets/logoutnew.svg" alt="" class="icon new">
            <span class="description">Log Out</span>
          </a>
        </div>
      </div>
    </div>
    <div class="main-content">
      <h1 class="judul" align="center"><br>Kritik dan Saran</h1>
      <div class="tabel-kritiksaran" align="center">
        <table width="90%" size="20px">
          <tr>
            <th>Nama Pengguna</th>
            <th>No Telpon</th>
            <th>Kritik</th>
            <th>Saran</th>
          </tr>
          <?php
          require "../config.php";
          $query = mysqli_query($db, "SELECT nama_pengguna, no_telp, kritik, saran FROM kritik_saran JOIN user ON (kritik_saran.id = user.id) ORDER BY id_kritik_saran DESC"); //099
          while ($row = mysqli_fetch_assoc($query)) {
          ?>
          <tr>
            <td><?= $row['nama_pengguna']?></td>
            <td><?= $row['no_telp']?></td>
            <td><?= $row['kritik']?></td>
            <td><?= $row['saran']?></td>
          </tr>  
          <?php
          }
          ?>
          
        </table>
      </div>

   </div>
  </div>
  <script src="scriptAdm.js"></script>
  <script src="../user/script.js"></script>
</body>
</html>