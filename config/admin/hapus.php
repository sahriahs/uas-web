<?php
require "config.php";
if(isset($_GET['id'])){
  $query = mysqli_query($db,"DELETE FROM data_villa WHERE id=$_GET[id]");
  if($query){
    header("Location:kelolaVilla.php");
  } else {
    echo "Delete gagal";
  }
}
?>