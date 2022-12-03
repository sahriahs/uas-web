<?php
require "config.php";

if(isset($_POST['submit'])){
  $nama_villa = $_POST['nama_villa'];
  $deskripsi_villa = $_POST['deskripsi_villa'];
  $harga_villa = $_POST['harga_villa'];
  $alamat_villa = $_POST['alamat_villa'];

  $gambar_villa = $_FILES['gambar_villa']['name'];
  $loc_gambar = $_FILES['gambar_villa']['tmp_name'];
  $direktori = "img/";
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $gambar_villa);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  move_uploaded_file($loc_gambar, $direktori.$gambar_villa);
  // if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
  //   echo "
  //     <script>
  //       alert('format gambar tidak sesuai');
      
  //     </script>
  //   ";
  // }
  // else{
  //   move_uploaded_file($loc_gambar, $direktori.$gambar_villa);
  // }
  

  


  $query = mysqli_query($db,"INSERT INTO data_villa (nama_villa, gambar_villa, deskripsi_villa, harga_villa, alamat_villa)
           VALUES ('$nama_villa','$gambar_villa','$deskripsi_villa','$harga_villa','$alamat_villa')");
  if($query){
    header("Location:index.php");
  } else {
    echo "Tambah data error";
  }
}

// function upload(){
//   $gambar_villa = $_POST['gambar_villa']['name'];
//   $tmpName = $_FILES['gambar_villa']['tmp_name'];
//   move_uploaded_file($tmpName, 'img/'.$gambar_villa);

// }

?>   

