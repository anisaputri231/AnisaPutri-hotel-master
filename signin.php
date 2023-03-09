<!doctype html>
<html lang="en">
  <head>
  	<title>Login 05</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="img" style="background-image: url(image/12.jpg);"></div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Masuk</h3>
			      		</div>
			      	</div>
						<form action="" class="signin-form" method="post">
			      		<div class="form-group mt-3">
			      			<input type="text" class="form-control" required name="username">
			      			<label class="form-control-placeholder" for="username">Username</label>
			      		</div>
		            <div class="form-group">
		              <input id="password-field" type="password" class="form-control" required name="password">
		              <label class="form-control-placeholder" for="password">Password</label>
		              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
		            </div>
		            <div class="form-group">
		            	<button type="submit" name="login" class="form-control btn bg-primary rounded submit px-3">Sign In</button>
		            </div>
		          </form>
		          <p class="text-center">Not a member? <a data-toggle="tab" href="signup.php">Sign Up</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="../js/jquery.min.js"></script>
  <script src="../js/popper.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/main.js"></script>

	</body>
</html>
<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';
if (isset($_POST['login'])) {
    
	$username = $_POST['username'];
	$password = $_POST['password'];
	 
	 
	// menyeleksi data user dengan username dan password yang sesuai
	$login = $conn->query("select * from guest where username='$username' and password=md5('$password')");
	// menghitung jumlah data yang ditemukan
	$cek = mysqli_num_rows($login);
	 
	// cek apakah username dan password di temukan pada database
	if($cek > 0){
		$data = mysqli_fetch_assoc($login);
        if ( isset($_GET["checkin"]) && isset($_GET["checkout"]) && $_GET["jumlah"]){
			$checkin = $_GET["checkin"];
			$checkout = $_GET["checkout"];
			$jumlah = $_GET["jumlah"];
            $_SESSION['guest'] = [
                "id" => $data["id"],
                "name" => $data["name"],
                "username" => $data["username"]
            ];
            // alihkan ke halaman dashboard admin
            print_r($_SESSION["guest"]);
            header("location:index.php?page=daftar-kamar-pesan&checkin=$checkin&checkout=$checkout&jumlah=$jumlah");
        } else {
            $_SESSION['guest'] = [
                "id" => $data["id"],
                "name" => $data["name"],
                "username" => $data["username"]
            ];
            print_r($_SESSION["guest"]);
			header("location:index.php");
        }
	 
	} else {
		header("location:index.php?pesan=gagal");
	}

}
 
?>