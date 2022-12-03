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

</head>
<body>
  <div class="container" >
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
          <a href="#">
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
          <a href="kritiksaran.php">
            <img src="assets/help.svg" alt="" class="icon">
            <span class="description">Kritik & Saran</span>
          </a>
        </div>
        <div class="list-item">
          <a href="../logout.php">
          <img src="assets/logoutnew.svg" alt="" class="icon">
            <span class="description">Log Out</span>
          </a>
        </div>
      </div>
    </div>
    <div class="main-content">
      <h1 class="judul"><br>Kelola Taurinesia Villa</h1>
      <div class="list-table center" style="overflow-x: auto;"> 
        <section class="packages" id="packages">
          <a href="formulir.php" class="btn">Tambah</a><br> <br>
          <div class="box-container">
            <?php
              require "../config.php";
              $query = mysqli_query($db, "SELECT * FROM data_villa"); //099
              $i = 1;
              while ($row = mysqli_fetch_assoc($query)) {
            ?>
                <div class="box">
                  <img src="../img/<?=$row['gambar_villa']?>" alt="">
                  <div class="content">
                      <h3> <i class="fas fa-map-marker-alt"></i><?=$row['nama_villa']?></h3>
                      <p><?=$row['deskripsi_villa']?></p>
                      <p><?=$row['alamat_villa']?></p>
                      <div class="price">Rp<?=$row['harga_villa']?></div>
                      <div>
                        <a href="edit.php?id_villa=<?=$row['id_villa']?>" class="btn">Edit</a>
                        <a href="hapus.php?id_villa=<?=$row['id_villa']?>" class="btn">Hapus</a>
                      </div>
                  </div>
                </div>
                <br>
            <?php
                  $i++;
              }
            ?>
          </div>
        </section>
      </div>
    </div>
  </div>
  <script src="scriptAdm.js"></script>
  <script src="../user/script.js"></script>

</body>
</html>