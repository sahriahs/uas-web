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
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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

  </header>

  <br>
  <br>
  <br>
  <br>

  <!-- packages section starts  -->

  <section class="packages" id="packages">

    <h1 class="heading">
      <span>p</span>
      <span>a</span>
      <span>c</span>
      <span>k</span>
      <span>a</span>
      <span>g</span>
      <span>e</span>
      <span>s</span>
    </h1>

    <div class="box-container">
      <?php
      require "../config.php";
      $query = mysqli_query($db, "SELECT * FROM data_villa"); //099
      $i = 1;
      while ($row = mysqli_fetch_assoc($query)) {
      ?>
        <div class="box">
          <img src="../img/<?= $row['gambar_villa'] ?>" alt="">
          <div class="content">
            <h3> <i class="fas fa-map-marker-alt"></i><?= $row['nama_villa'] ?></h3>
            <p><?= $row['deskripsi_villa'] ?></p>
            <p><?= $row['alamat_villa'] ?></p>
            <div class="price">Rp<?= $row['harga_villa'] ?>/day</div>
            <a href="booking.php?id_villa=<?= $row['id_villa'] ?>" class="btn">book now</a>
          </div>
        </div>
      <?php
        $i++;
      }
      ?>
    </div>

  </section>

  <!-- <section class="review" id="review">

    <h1 class="heading">
      <span>r</span>
      <span>e</span>
      <span>v</span>
      <span>i</span>
      <span>e</span>
      <span>w</span>
    </h1>
    <div class="swiper-container review-slider">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="box">
            <img src="images/rama.jpg" alt="">
            <h3>Rama</h3>
            <p>Villa ternyaman !</p>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="box">
            <img src="images/sahriah.jpg" alt="">
            <h3>Sahriah</h3>
            <p>Villa di pantai memang lebih seru, kita dapat melihat sunset, dan berenang kapanpun kita mau, suasanan tenang, serta fasilitas lengkap, sangat menyenangkan ! </p>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="box">
            <img src="images/viona.jpg" alt="">
            <h3>Viona</h3>
            <p>Villa terseru !</p>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="box">
            <img src="images/lutfi.jpg" alt="">
            <h3>lutfi</h3>
            <p>Villa di puncak dengan hutan rindang, pilihan yang sangat tepat untukku yang suka dengan alam !</p>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->



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