<?php
require "../config.php";

  if(isset($_POST['pesan'])){
    $nama_penyewa = $_POST['nama_penyewa'];
    $no_telp = $_POST['no_telp'];
    $tanggal_datang = $_POST['tanggal_datang'];
    $tanggal_pergi = $_POST['tanggal_pergi'];
    // var_dump($tanggal_datang); die;
  
    $query = "INSERT INTO penyewaan_villa (id_villa, nama_penyewa,	no_telp,	tgl_datang,	tgl_pergi)
              VALUES ('$id_villa', '$nama_penyewa',	'$no_telp',	'$tanggal_datang',	'$tanggal_pergi)";
      mysqli_query($db,"$query");
      return mysqli_affected_rows($db);
    if($query){
      header("Location:pembayaran.php");
    } else {
      echo "Update gagal";
    }
  }
?>