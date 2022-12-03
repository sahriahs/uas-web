<?php
    require 'config.php';
    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpass = $_POST['cpass'];
        if($password === $cpass){
            $password = password_hash($password, PASSWORD_DEFAULT);
            $result = mysqli_query($db, "SELECT username from user WHERE username = '$username'");
            if(mysqli_fetch_assoc($result)){
                echo "
                    <script>
                        alert('Username Telah digunakan');
                        document.location.href = 'register.php';
                    </script>";
            }
            else{
                $sql = "INSERT INTO user VALUES ('','$username','$password','')";
                $result = mysqli_query($db, $sql);

                if(mysqli_affected_rows($db) > 0){
                    echo "
                        <script>
                            alert('Registrasi Berhasil');
                            document.location.href = 'login.php';
                        </script>";
                }else{
                    echo "
                        <script>
                            alert('Registrasi Gagal Berhasil');
                            document.location.href = 'register.php';
                        </script>";
                }
            }
        }
        else{
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
    <title>Register</title>
</head>
<body>
    <div class="wrapper">
        <form action="" method="post" class="login-email">
        <p class="title">Register</p>
        <div class="field">
            <p class = "mail">Masukkan Username : </p>
            <input type="email" placeholder="Username" name="username" value="" required class="mailed">
        </div>
        <div class="field">
            <p class = "pass">Masukkan password : </p>
            <input type="password" placeholder="Password" name="password" value="" required class="passed">
        </div>
        <div class="field">
            <p class = "pass">Konfirmasi password : </p>
            <input type="password" placeholder="Password" name="cpass" value="" required class="passed">
        </div>  
        <div class="field" align ="center"> 
        <button type="submit" name="register" class="button">Register</button>
    </div>
</body>
</html>