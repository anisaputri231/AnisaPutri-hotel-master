<?php
  include "../koneksi.php";
  $id = $_GET['id'];
  
  $delete = $conn->query("DELETE FROM kamar WHERE id='$id'");
  if($delete){
   header("location: index.php?page=kamar-list");
  }
?>