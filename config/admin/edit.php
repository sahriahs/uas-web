<?php
require "config.php";
require "fungtion.php";
if(isset($_GET['id'])){
    $query = mysqli_query($db,"SELECT * FROM data_villa WHERE id=$_GET[id]");
    $result = mysqli_fetch_assoc($query);
    $nama_villa = $result['nama_villa'];
    // $gambar_villa = $result['gambar_villa'];
    $deskripsi_villa = $result['deskripsi_villa'];
    $harga_villa = $result['harga_villa'];
    $alamat_villa = $result['alamat_villa'];
}

if(isset($_POST['submit'])){
    $nama_villa = $_POST['nama_villa'];
    $deskripsi_villa = $_POST['deskripsi_villa'];
    $harga_villa = $_POST['harga_villa'];
    $alamat_villa = $_POST['alamat_villa'];

    $gambar_villa = upload();
    // $gambar_villa = $_FILES['gambar_villa']['name'];
    // $error = $_FILES['gambar_villa']['error'];
    // $loc_gambar = $_FILES['gambar_villa']['tmp_name'];
    // $direktori = "img/";
    // $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    // $ekstensiGambar = explode('.', $gambar_villa);
    // $ekstensiGambar = strtolower(end($ekstensiGambar));
    // // var_dump($ekstensiGambar); die;
    // move_uploaded_file($loc_gambar, $direktori.$gambar_villa);
    // if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
    //   echo "
    //     <script>
    //       alert('format gambar tidak sesuai');
    //     </script>
    //   ";
    //   return false;
    // }
    // if($error == 4){
    //   echo "
    //     <script>
    //       alert('masukkan gambar');
    //     </script>
    //   ";
    //   return false;
    // }
    
    // move_uploaded_file($loc_gambar, $direktori.$gambar_villa);
    // if(!$gambar_villa){
    //   return false;
    // }
    $query = mysqli_query($db,
      "UPDATE data_villa SET 
        nama_villa='$nama_villa',
        gambar_villa='$gambar_villa',
        deskripsi_villa='$deskripsi_villa',
        harga_villa='$harga_villa',
        alamat_villa='$alamat_villa' 
        WHERE id=$_GET[id]");
    if($query){
        header("Location:kelolaVilla.php");
    } else {
        echo "Update gagal";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
        <h1 class="judul">Sistem data villa</h1>
    
    <div class="form-class">
        <h3>Edit Data data_villa</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="">Nama Villa</label><br>
            <input type="text" name="nama_villa" class="form-text" value='<?=$nama_villa?>'><br>
            
            <label for="">Gambar</label><br>
            <input type="file" name="gambar_villa" class="form-text"><br>
            
            <label for="">Deskripsi</label><br>
            <textarea name="deskripsi_villa" cols="64" rows="10" ><?=$deskripsi_villa?></textarea><br>
            
            <label for="">Harga Villa</label><br>
            <input type="text" name="harga_villa" class="form-text" value='<?=$harga_villa?>'><br>

            <label for="">Alamat</label><br>
            <textarea name="alamat_villa" cols="64" rows="10" ><?=$alamat_villa?></textarea><br>

            <input type="submit" name="submit" value="Kirim" class="btn-submit">
        </form>
    </div>

</body>
</html>