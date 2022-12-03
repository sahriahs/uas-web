<?php
session_start();
require '../config.php';

if (!isset($_SESSION['user'])) {
  header("Location: ../login.php");
  exit;
}

if (isset($_POST['send-mess'])) {
  $id_user = $_SESSION['id'];
  $kritik = $_POST['kritik'];
  $saran = $_POST['saran'];
  $query = "INSERT INTO kritik_saran (id, kritik,	saran)
  VALUES ('$id_user', '$kritik',	'$saran')";
  mysqli_query($db, $query);
  if ($query) {
    echo "Update gagal";
  }
}
?>

<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>
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

    <img src="images/logo.png" alt="" width="100px"></a>

    <nav class="navbar">
      <a href="index.php">home</a>
      <a href="book.php">packages</a>
      <a href="gallery.php">gallery</a>
      <a href="#footer">about</a>
      <a href="pembayaran.php">Pay</a>
    </nav>

    <div class="icons">
      <i class="fas fa-search" id="search-btn"></i>
      <i class="fas fa-user" id="login-btn"></i>
    </div>

    <form action="" class="search-bar-container">
      <input type="search" id="search-bar" placeholder="search here...">
      <label for="search-bar" class="fas fa-search"></label>
    </form>

  </header>


  <div id="darkmode" class="text-box"> </div>

  <script>
    $(document).ready(function() {
      $("#text").on({
        mouseenter: function() {
          $(this).css("color", "#ecc100");
        }
      })
    });
    $("#text").on({
      mouseout: function() {
        $(this).css("color", "white");
      }
    });
  </script>

  <!-- header section ends -->

  <!-- login form container  -->

  <!-- <div class="login-form-container">

  <i class="fas fa-times" id="form-close"></i>

  <form action="">
    <h3>login</h3>
    <input type="email" class="box" placeholder="enter your email">
    <input type="password" class="box" placeholder="enter your password">
    <input type="submit" value="login now" class="btn">
    <input type="checkbox" id="remember">
    <label for="remember">remember me</label>
    <p>forget password? <a href="register.php">click here</a></p>
    <p>don't have and account? <a href="../register.php">register now</a></p>
  </form>

  </div> -->

  <div class="login-form-container">

    <i class="fas fa-times" id="form-close"></i>

    <form action="">
      <br><h3>LOGOUT <br></h3><br><br><br>
      <h2 align="center">Yakin Untuk keluar website?</h2>
      <input type="submit" value="Batal Logout" class="btn">
      <a href="../logout.php" value="Logout Now" class="btn">Logout</a>

    </form>

  </div>

  <!-- home section starts  -->

  <section class="home" id="home">

    <div class="content">
      <h3>Welcome to Taurinesia Villa Website</h3>
      <p>The luxuries of a Resort with the Intimacy of Home</p>
      <a href="book.php" class="btn">visit us for more info </a>
    </div>

    <div class="controls">
      <span class="vid-btn active" data-src="images/vid1.mp4"></span>
      <span class="vid-btn" data-src="images/vid2.mp4"></span>
      <span class="vid-btn" data-src="images/vid3.mp4"></span>
      <span class="vid-btn" data-src="images/vid4.mp4"></span>
      <span class="vid-btn" data-src="images/vid5.mp4"></span>
    </div>

    <div class="video-container">
      <video src="images/vid1.mp4" id="video-slider" loop autoplay muted></video>
    </div>

  </section>

  <!-- home section ends -->

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

    <a href="book.php" class="btn">See More >></a><br><br>

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
            <div class="price">Rp<?= $row['harga_villa'] ?></div>
            <a href="booking.php?id_villa=<?= $row['id_villa'] ?>" class="btn">book now</a>
          </div>
        </div>
      <?php
        if ($i == 3) {
          break;
        }
        $i++;
      }
      ?>
    </div>

  </section>

  <!-- packages section ends -->

  <!-- services section starts  -->

  <section class="services" id="services">

    <h1 class="heading">
      <span>s</span>
      <span>e</span>
      <span>r</span>
      <span>v</span>
      <span>i</span>
      <span>c</span>
      <span>e</span>
      <span>s</span>
    </h1>

    <div class="box-container">

      <div class="box">
        <i class="fas fa-hotel"></i>
        <h3>Kamar</h3>
        <p>Kamar yang disediakan sagat banyak hingga kamu dpat mengajak keluarga kerabat serta rekan rekan kamu berlibur bersama Tauriesia Villa</p>
      </div>
      <div class="box">
        <i class="fas fa-utensils"></i>
        <h3>Makan dan Minuman </h3>
        <p>Menyediakan makanan dan minuman yang dapat kamu pesan </p>
      </div>
      <div class="box">
        <i class="fas fa-bullhorn"></i>
        <h3>Keamanan</h3>
        <p>Keamanan villa menjadi nomor 1, maka penting bagi kami untuk menjaga keamanan</p>
      </div>
      <div class="box">
        <i class="fas fa-globe-asia"></i>
        <h3>Banyak Tempat</h3>
        <p>Villa kami memiliki banyak cabang di pantai dan puncak yang kamu inginkan </p>
      </div>
      <div class="box">
        <i class="fas fa-plane"></i>
        <h3>Bandara</h3>
        <p>Di tempat liburan kamu tak perlu khawatir untuk berkunjung karena akses pantai atau puncak yang kamu inginkan terdapat bandara</p>
      </div>
      <div class="box">
        <i class="fas fa-hiking"></i>
        <h3>Pertualangan</h3>
        <p>Akan membuat liburan mu lebih seru karena banyak tempat yang baru dan tentunya penuh petualangan</p>
      </div>
  </section>

  <!-- services section ends -->

  <!-- gallery section starts  -->

  <section class="gallery" id="gallery">

    <h1 class="heading">
      <span>g</span>
      <span>a</span>
      <span>l</span>
      <span>l</span>
      <span>e</span>
      <span>r</span>
      <span>y</span>
    </h1>

    <div class="box-container">

      <div class="box">
        <img src="images/a1.jpg" alt="">
        <div class="content">
          <h3>Taurinesia Villa</h3>
          <p>Villa indah dengan banyak fasilitas siap membuat liburmu lebih nyaman.</p>
          <a href="gallery.php" class="btn">see more</a>
        </div>
      </div>
      <div class="box">
        <img src="images/a2.jpg" alt="">
        <div class="content">
          <h3>Taurinesia Villa</h3>
          <p>Villa indah dengan banyak fasilitas siap membuat liburmu lebih nyaman.</p>
          <a href="gallery.php" class="btn">see more</a>
        </div>
      </div>
      <div class="box">
        <img src="images/a3.jpg" alt="">
        <div class="content">
          <h3>Taurinesia Villa</h3>
          <p>Villa indah dengan banyak fasilitas siap membuat liburmu lebih nyaman.</p>
          <a href="gallery.php" class="btn">see more</a>
        </div>
      </div>

      <div class="box">
        <img src="images/a4.jpg" alt="">
        <div class="content">
          <h3>Taurinesia Villa</h3>
          <p>Villa indah dengan banyak fasilitas siap membuat liburmu lebih nyaman.</p>
          <a href="gallery.php" class="btn">see more</a>
        </div>
      </div>
      <div class="box">
        <img src="images/a5.jpg" alt="">
        <div class="content">
          <h3>Taurinesia Villa</h3>
          <p>Villa indah dengan banyak fasilitas siap membuat liburmu lebih nyaman.</p>
          <a href="gallery.php" class="btn">see more</a>
        </div>
      </div>
      <div class="box">
        <img src="images/a6.jpg" alt="">
        <div class="content">
          <h3>Taurinesia Villa</h3>
          <p>Villa indah dengan banyak fasilitas siap membuat liburmu lebih nyaman.</p>
          <a href="gallery.php" class="btn">see more</a>
        </div>
      </div>
      <div class="box">
        <img src="images/a7.jpg" alt="">
        <div class="content">
          <h3>Taurinesia Villa</h3>
          <p>Villa indah dengan banyak fasilitas siap membuat liburmu lebih nyaman.</p>
          <a href="gallery.php" class="btn">see more</a>
        </div>
      </div>
      <div class="box">
        <img src="images/a8.jpg" alt="">
        <div class="content">
          <h3>Taurinesia Villa</h3>
          <p>Villa indah dengan banyak fasilitas siap membuat liburmu lebih nyaman.</p>
          <a href="gallery.php" class="btn">see more</a>
        </div>
      </div>
      <div class="box">
        <img src="images/a9.jpg" alt="">
        <div class="content">
          <h3>Taurinesia Villa</h3>
          <p>Villa indah dengan banyak fasilitas siap membuat liburmu lebih nyaman.</p>
          <a href="gallery.php" class="btn">see more</a>
        </div>
      </div>
      <div class="box">
        <img src="images/a10.jpg" alt="">
        <div class="content">
          <h3>Taurinesia Villa</h3>
          <p>Villa indah dengan banyak fasilitas siap membuat liburmu lebih nyaman.</p>
          <a href="gallery.php" class="btn">see more</a>
        </div>
      </div>
      <div class="box">
        <img src="images/a11.jpg" alt="">
        <div class="content">
          <h3>Taurinesia Villa</h3>
          <p>Villa indah dengan banyak fasilitas siap membuat liburmu lebih nyaman.</p>
          <a href="gallery.php" class="btn">see more</a>
        </div>
      </div>
      <div class="box">
        <img src="images/a12.jpg" alt="">
        <div class="content">
          <h3>Taurinesia Villa</h3>
          <p>Villa indah dengan banyak fasilitas siap membuat liburmu lebih nyaman.</p>
          <a href="gallery.php" class="btn">see more</a>
        </div>
      </div>
    </div>

  </section>
  <!-- gallery section ends -->

  <!-- review section starts  -->
  <section class="review" id="review">

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

  </section>

  <section class="contact" id="contact">

    <h1 class="heading">
      <span>k</span>
      <span>r</span>
      <span>i</span>
      <span>t</span>
      <span>i</span>
      <span>k</span>
      <span>&</span>
      <span>s</span>
      <span>a</span>
      <span>r</span>
      <span>a</span>
      <span>n</span>
    </h1>

    <div class="row">

      <div class="image">
        <img src="images/saran.png" alt="">
      </div>

      <form action="" method="post">
        <div class="inputBox">
        </div>
        <div class="inputBox">
        </div>
        <textarea placeholder="kritik" name="kritik" id="" cols="30" rows="10" required></textarea>
        <textarea placeholder="saran" name="saran" id="" cols="30" rows="10" required></textarea>
        <input type="submit" name="send-mess" class="btn" value="Kirim">
      </form>

    </div>

  </section>



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