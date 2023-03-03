<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data admin dengan username dan password yang sesuai

$sql = "SELECT * FROM user WHERE Username='$username' and Password=md5('$password')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if ($row['role'] == "admin") {
      $_SESSION['username'] = $username;
      $_SESSION['level'] = "admin";
      header("location:admin/index.php");
    } elseif ($row['role'] == "resevsionis") {
      $_SESSION['username'] = $username;
      $_SESSION['level'] = "resevsionis";
      header("location: resevsionis/index.php");
    }elseif ($row['role'] == "user") {
      $_SESSION['username'] = $username;
      $_SESSION['level'] = "user";
      header("location: user/index.php");
    }
   
  }
}else {
	header("location:index.php?pesan=gagal");
}
$conn->close();


?>