<?php
  require 'config.php';
  $data = mysqli_query($db,"SELECT FROM GROUP BY");
  $grafik = mysqli_query($db,"SELECT FROM GROUP BY");
  if(isset($_SESSION['submit'])){
    if($_SESSION['priv'] == 'user'){
        header("location: user/index.php");
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bermastautin Villa</title>
  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
  <!-- style -->
  <link rel="stylesheet" href="styleAdmin.css">
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
          <a href="admin.php">
            <img src="assets/logo.png" alt="" class="icon" width="50px">
            <span class="description-header">Bermastautin Villa</span>
          </a>
        </div>
        <div class="illustration">
          <img src="assets/10586 1.svg" alt="">
        </div>
      </div>

      <div class="main">
        <div class="list-item">
          <a href="#">
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
      </div>

    </div>

    <div class="main-content">
      <h1 class="judul" align="center"><br>Dashboard</h1>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<body>
<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>
var xValues = [<?php while($row = mysqli_fetch_array($data)){echo '"'.$row[''].'",';}?>];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets:{ 
      data: [<?php while($row = mysqli_fetch_array($grafik)){echo '"'.$row[''].'",';}?>];,
      borderColor: "red",
      fill: false
    },
  options: {
    legend: {display: false}
    }
  }
 }
);
</script>
        <?php
        // require "arsip/index.php";
        ?>
      <!-- </div> -->
    </div>
  </div>
  <script src="scriptAdm.js"></script>

</body>
</html>