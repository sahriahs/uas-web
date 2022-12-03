<?php
require 'fungtion.php';
if(isset($_POST['submit'])){
    if(tambah($_POST)!=0){
        echo "
        <script>
            alert('Tidak berhasil menambahkan file');
        </script>
        ";
        header("Location:kelolaVilla.php");
    }
    else{
        echo "
        <script>
            alert('Berhasil menambahkan file');
        </script>
        ";
        header("Location:kelolaVilla.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Villa</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
    <h1 class="judul">Tambah Data villa</h1>
    <div class="form-class">
        <h3>Tambah data pattimura</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="">Nama Villa</label><br>
            <input type="text" name="nama_villa" class="form-text"><br>

            <label for="">Gambar</label><br>
            <input type="file" name="gambar_villa" class="form-text"><br>

            <label for="">Deskripsi</label><br>
            <textarea name="deskripsi_villa" id="" cols="64" rows="10"></textarea><br>
            <!-- <input type="" name="agama" class="form-text"><br> -->

            <label for="">Harga Villa</label><br>
            <input type="text" name="harga_villa" class="form-text"><br>

            <label for="">Alamat</label><br>
            <textarea name="alamat_villa" id="" cols="64" rows="10"></textarea><br>

            <input type="submit" name="submit" value="Kirim" class="btn-submit">
        </form>
    </div>
</body>
</html>