<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: ../login.php");
  exit;
}
require "../config.php";
if(isset($_GET['id_villa'])){
  $query = mysqli_query($db,"DELETE FROM data_villa WHERE id_villa=$_GET[id_villa]");
  if($query){
    header("Location:kelolaVilla.php");
  } else {
    echo "Delete gagal";
  }
}
?>