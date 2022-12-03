<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>login</title>

<div class="login-form-container">

    <i class="fas fa-times" id="form-close"></i>

    <form action="" method="post">
        <h3>login</h3>
        <input type="email" class="box" name ="username" placeholder="enter your email">
        <input type="password" class="box" name ="password" placeholder="enter your password">
        <input type="submit" value="login now" name ="submit" class="btn">
        <input type="checkbox" id="remember">
        <label for="remember">remember me</label>
        <p>forget password? <a href="#">click here</a></p>
        <p>don't have and account? <a href="register.php">register now</a></p>
    </form>
</head>
<body>
</body>
</html>
<?php 
        session_start();
        require 'config.php';
    
        if(isset($_SESSION['submit'])){
            header("Location: user/index.php");
            exit;
        }
    
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
    
            $result = mysqli_query($db, "SELECT * FROM user WHERE username = '$username'");
    
            if(mysqli_num_rows($result) === 1){
                $row = mysqli_fetch_assoc($result);
                if(password_verify($password, $row['password'])){
                    $_SESSION['submit'] = $row["username"];
                    $_SESSION['priv'] = $row["priv"];
                    if($_SESSION['priv'] === "admin"){
                        header("Location: admin/index.php");
                    }
                    else{header("Location: user/index.php");}
                    exit;
                }
            }
            $error = true;
            if(isset($error)){
                echo "
                    <p style='color: red;'>
                        Username atau password salah!
                    </p>
                ";
            }
        }
        ?>
    
    <script>if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>