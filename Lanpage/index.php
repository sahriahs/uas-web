<!DOCTYPE html>
<html lang="en">

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
    
        <img src="images/logo.png" alt="" width="100px"></a>
    
        <nav class="navbar">
            <a href="#home">home</a>
            <a href="book.html">packages</a>
            <a href="#gallery">gallery</a>
            <a href="#footer">about</a>
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
<!-- 
  <div class="login-form-container">

    <i class="fas fa-times" id="form-close"></i>

    <form action="">
      <br><h3>LOGOUT <br></h3><br><br><br>
      <h2 align="center">Yakin Untuk keluar website?</h2>
      <input type="submit" value="Batal Logout" class="btn">
      <input type="submit" value="Logout Now" class="btn">

    </form>

  </div> -->

  <!-- home section starts  -->
  
<div class="login-form-container">

    <i class="fas fa-times" id="form-close"></i>

    <form action="">
        <h3>login</h3>
        <input type="email" class="box" placeholder="enter your email">
        <input type="password" class="box" placeholder="enter your password">
        <input type="submit" value="login now" class="btn">
        <input type="checkbox" id="remember">
        <label for="remember">remember me</label>
        <p>forget password? <a href="#">click here</a></p>
        <p>don't have and account? <a href="#">register now</a></p>
    </form>

</div>

<div class="login-form-container">

    <i class="fas fa-times" id="form-close"></i>

    <form action="">
        <h3>login</h3>
        <input type="email" class="box" placeholder="enter your email">
        <input type="password" class="box" placeholder="enter your password">
        <input type="submit" value="login now" class="btn">
        <input type="checkbox" id="remember">
        <label for="remember">remember me</label>
        <p>forget password? <a href="#">click here</a></p>
        <p>don't have and account? <a href="#">register now</a></p>
    </form>

</div>
<section class="home" id="home">

  <div class="content">
      <h3>Welcome to Taurinesia Villa Website</h3>
      <p>The luxuries of a Resort with the Intimacy of Home</p>
      <a href="#" class="btn">visit us for more info </a>
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