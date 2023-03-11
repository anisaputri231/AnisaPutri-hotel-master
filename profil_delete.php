<?php
  include "koneksi.php";
  $id = $_GET['id'];
  
  $delete = $conn->query("DELETE FROM guest WHERE id='$id'");
  if($delete){
      echo ("<script LANGUAGE='JavaScript'>
            window.location.href='index.php?page=profil';
            </script>");
  }
?>