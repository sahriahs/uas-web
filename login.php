<?php
session_start();
require 'config.php';

if (isset($_SESSION['submit'])) {
  header("Location: user/index.php");
  exit;
}

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $result = mysqli_query($db, "SELECT * FROM user WHERE email = '$email'");

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
      $_SESSION['submit'] = $row["email"];
      $_SESSION['priv'] = $row["priv"];
      $_SESSION['id'] = $row["id"];
      if ($_SESSION['priv'] === "admin"){
        $_SESSION["admin"]=true;
        header("Location: admin/index.php");
      } else {
        $_SESSION["user"]=true;
        header("Location: user/index.php");
      }
      exit;
    }
  }
  $error = true;
  if (isset($error)) {
    echo "
          <p style='color: red;'>
            email atau password salah!
          </p>
        ";
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
  <link rel="stylesheet" href="Style.css">
  <!-- <link rel="stylesheet" href="user/style.css"> -->
</head>

<body>
  <div class="container" align="center">
    <div class="judul"><h1>Taurinesia Villa</h1></div>
    <form action="" method="post" class="form">
      <input type="email" class="form-content" name="email" placeholder="Email"><br>
      <input type="password" class="form-content" name="password" placeholder="Password"><br>
      <button type="submit" name="submit" id="submit">Login</button><br><br>
      <div>
        <p>Belum memiliki akun? <a href="register.php">Registrasi sekarang</a></p>
      </div>
    </form>
  </div>
</body>
</html>
