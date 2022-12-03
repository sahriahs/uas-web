<?php
require 'config.php';
if (isset($_POST['register'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpass = $_POST['cpass'];
  $nama_pengguna = $_POST['nama_pengguna'];
  $no_telp = $_POST['no_telp'];

  if ($password === $cpass) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $result = mysqli_query($db, "SELECT email from user WHERE email = '$email'");
    if (mysqli_fetch_assoc($result)) {
      echo "
          <script>
            alert('Username Telah digunakan');
            document.location.href = 'register.php';
          </script>";
    } else {
      $sql = "INSERT INTO user VALUES ('', '$email', '$password', '', '$nama_pengguna', '$no_telp')";
      $result = mysqli_query($db, $sql);

      if (mysqli_affected_rows($db)) {
        echo "
            <script>
              alert('Registrasi Berhasil');
              document.location.href = 'login.php';
            </script>";
      } else {
        echo "
            <script>
              alert('Registrasi Gagal Berhasil');
              document.location.href = 'register.php';
            </script>";
      }
    }
  } else {
    echo "
        <script>
          alert('Password tidak sama');
          document.location.href = 'register.php';
        </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="">
  <title>Taurinesia Villa</title>
  <link rel="stylesheet" href="Style.css">
</head>

<body>
  <div class="container" align="center">
    <div class="judul"><h1>Taurinesia Villa</h1></div>
    <form action="" method="post" class="form">
      <div>
        <input type="text" placeholder="Nama pengguna" name="nama_pengguna" required class="form-content">
      </div>
      <div>
        <input type="text" placeholder="Nomor Telpon" name="no_telp" required class="form-content">
      </div>
      <div>
        <input type="email" placeholder="email" name="email" required class="form-content">
      </div>
      <div>
        <input type="password" placeholder="Password" name="password" required class="form-content">
      </div>
      <div>
        <input type="password" placeholder="Konfirmasi Password" name="cpass" required class="form-content">
      </div>
      <div align="center">
        <button type="submit" name="register" id="submit">Register</button>
      </div>
</body>

</html>