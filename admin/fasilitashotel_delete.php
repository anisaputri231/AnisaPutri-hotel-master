<?php
  include "../koneksi.php";
  $id = $_GET['id'];
  
  $delete = $conn->query("DELETE FROM fasilitas_hotel WHERE id='$id'");
  if($delete){
      header("location:index.php?page=fasilitashotel-list");
  }
?>