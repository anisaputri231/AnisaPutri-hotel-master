
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
			      			<h3 class="mb-4">Daftar</h3>
			      		</div>
			      	</div>
						<form action="" class="signin-form" method="post">
						<div class="form-group mt-3">
			      			<input type="text" class="form-control" required name="name">
			      			<label class="form-control-placeholder" for="name">Name</label>
			      		</div>
			      		<div class="form-group mt-3">
			      			<input type="text" class="form-control" required name="username">
			      			<label class="form-control-placeholder" for="username">Username</label>
			      		</div>
		            <div class="form-group">
		              <input id="password-field" type="password" class="form-control" required name="password">
		              <label class="form-control-placeholder" for="password">Password</label>
		              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
		            </div>
					<div class="form-group mt-3">
			      			<input type="text" class="form-control" required name="no_telp">
			      			<label class="form-control-placeholder" for="no_telp">No_telp</label>
			      		</div>
		            <div class="form-group">
		            	<button type="submit" name="daftar" class="form-control btn bg-primary rounded submit px-3" href="signin.php">Sign In</button>
		            </div>
		          </form>
		          <p class="text-center">Not a member? <a data-toggle="tab" href="#signup">Sign Up</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>
  
	<?php
	session_start();
 
	if (isset($_SESSION['login'])) {
	    header("Location: index.php");
	}
  include "koneksi.php";
  if (isset($_POST["daftar"])) {
	$name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
	$no_telp = $_POST['no_telp'];

    $daftar   = $conn->query("INSERT INTO guest (name, username, password, tlp) VALUES ('$name', '$username', md5('$password'), '$no_telp')");
    if ($daftar) {
      echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Pendaftaran Berhasil, Klik OK untuk Login')
      window.location.href='signin.php';
    </SCRIPT>");
    }else{
      echo "gagal";
    }
  }

?>

	<script src=js/jquery.min.js></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>