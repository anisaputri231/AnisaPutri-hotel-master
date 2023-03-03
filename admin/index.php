<?php
include "../header.php";

session_start();

if ($_SESSION ['level'] ="") {
  header("location: . ./index.php");
  # code...
}

if ($_SESSION ['level'] =="admin") {
  header("location: ../admin/index.php");
  # code...
}

echo $_SESSION['level'];

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Hotelku - Dashboard</title>
    <link rel="canonical" href="../css/dashboard.css">

    

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

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

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Four Seasons Hotel</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="../logout.php">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?page=kamar-list">
              <span data-feather="home"></span>
              Kamar
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=fasilitaskamar-list">
              <span data-feather="users"></span>
              Fasilitas Kamar
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=fasilitashotel-list">
              <span data-feather="file"></span>
              Fasilitas Hotel
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=reservasi-list">
              <span data-feather="shopping-cart"></span>
              Reservasi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=user-list">
              <span data-feather="shopping-cart"></span>
              User
            </a>
          </li>
        </ul>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=reservasi-list">
              <span data-feather="shopping-cart"></span>
            </a>
          </li>
        </ul>
        
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <?php 
        if(isset($_GET['page'])){
          $page = $_GET['page'];
       
          switch ($page) {
            case 'kamar-list':
              include "kamar_list.php";
              break;
            case 'cari-tanggal':
              include "caritanggal.php";
              break;
            case 'cari-nama':
              include "carinama.php";
              break;
            case 'tambah-kamar':
              include "kamar_input.php";
              break;
            case 'fasilitashotel-list':
              include "fasilitashotel_list.php";
              break; 
            case 'fasilitashotel-input':
              include "fasilitashotel_input.php";
              break;
            case 'fasilitaskamar-list':
              include "fasilitaskamar_list.php";
              break;
            case 'fasilitaskamar-input':
              include "fasilitaskamar_input.php";
              break;
            case 'reservasi-list':
              include "reservasi_list.php";
              break;
            case 'fasilitashotel-edit':
              include "fasilitashotel_edit.php";
              break;  
            case 'fasilitaskamar-edit':
              include "fasilitaskamar_edit.php";
              break;
            case 'kamar-edit':
              include "kamar_edit.php";
              break;
            case 'reservasi-edit':
              include "reservasi_edit.php";
              break; 
            case 'user-edit':
              include "user_edit.php";
              break;
            case 'user-list':
              include "user_list.php";
              break;  
            case 'user-input':
              include "user_input.php";
              break;    
            default:
              echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
              break;
          }
        }else{
          include "reservasi_list.php";
        }
       
      ?>
    </main>
  </div>
</div>


    <script src="../js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
