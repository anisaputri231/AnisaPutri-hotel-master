<?php session_start(); ?>
<?php include "header.php";?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Album example · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">

    

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="hotel.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body>
    
<header>
  <nav class="navbar navbar-dark bg-dark fixed-top shadow-sm navbar-expand-lg">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong>FOUR SEASONS HOTEL</strong>
      </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=daftar-kamar">Kamar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=daftar-fasilitas">Fasilitas</a>
        <li>                      <?php if ( !empty( $_SESSION["guest"])) : ?>                                       
        <ul class="navbar-nav ms-auto">
            
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $_SESSION["guest"]["username"] ?>
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="index.php?page=profil">Profil</a></li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
            </li>
        </ul>  
        <?php else : ?>
            <li class="nav-item">
          <a class="nav-link" href="signin.php">Login</a>
        <li>   
        <?php endif ?>      
      </ul>
    </div>
    </div>
  </nav>
</header>

<main>
  <?php 
        if(isset($_GET['page'])){
            $page = $_GET['page'];
            switch ($page) {
                case 'daftar-kamar':
                    include "daftar_kamar.php";
                    break;
                case 'daftar-fasilitas':
                    include "daftar_fasilitas.php";
                    break;    
                case 'daftar-kamar-pesan':
                    include "daftar_kamar_pesan.php";
                    break;
                case 'konfirmasi':
                    include "konfirmasi.php";
                    break;   
                case 'profil':
                    include "profil.php";
                    break; 
                case 'profil':
                    include "profil.php";
                    break; 
                case 'profil-edit':
                    include "profil_edit.php";
                    break; 
                case 'profil-delete':
                    include "profil_delete.php";
                    break; 
                default:
                    echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
                break;
            }
        }else{
        include "home.php";
        }
  ?>

</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1 text-center">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
    <p class="mb-0 text-center">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="../getting-started/introduction/">getting started guide</a>.</p>
  </div>
</footer>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
      
  </body>
</html>
<?php
include"footer.php";
?>