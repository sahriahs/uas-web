<?php

function tambah(){
  require "config.php";

    $nama_villa = $_POST['nama_villa'];
    $deskripsi_villa = $_POST['deskripsi_villa'];
    $harga_villa = $_POST['harga_villa'];
    $alamat_villa = $_POST['alamat_villa'];
    $gambar_villa = upload();
    if(!$gambar_villa){
      return false;
    }
    
    $query = "INSERT INTO data_villa (nama_villa, gambar_villa, deskripsi_villa, harga_villa, alamat_villa)
              VALUES ('$nama_villa','$gambar_villa','$deskripsi_villa','$harga_villa','$alamat_villa')";
    mysqli_query($db,"$query");
    return mysqli_affected_rows($db);

}

function upload(){
  $gambar_villa = $_FILES['gambar_villa']['name'];
  $error = $_FILES['gambar_villa']['error'];
  $loc_gambar = $_FILES['gambar_villa']['tmp_name'];
  $direktori = "../img/";
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $gambar_villa);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  move_uploaded_file($loc_gambar, $direktori.$gambar_villa);
  if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
    echo "
      <script>
        alert('format gambar tidak sesuai');
      </script>
    ";
    return false;
  }
  if($error == 4){
    echo "
      <script>
        alert('masukkan gambar');
      </script>
    ";
    return false;
  }
  
  move_uploaded_file($loc_gambar, $direktori.$gambar_villa);
  return $gambar_villa;
}
?>