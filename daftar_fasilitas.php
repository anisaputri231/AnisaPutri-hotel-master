  <section class="py-5 text-center container-fluid bg">
    <div class="container">
    <div class="row py-lg-5">
      <div class="col-lg-12 col-md-12 mx-auto">
        <h2>Fasilitas Hotel</h2>
      </div>
    </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php 
        include "koneksi.php";
         $query = $conn->query('SELECT * FROM fasilitas_hotel');
          while ($data = mysqli_fetch_array($query)) {
        ?>
        <div class="col">
          <div class="card shadow-sm">
            <img src="image/<?php echo $data['gambar']; ?>" class="bd-placeholder-img card-img-top" width="100%" height="225"role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">

            <div class="card-body">
              <h5 class="card-title"><?php echo $data['nama_fasilitashotel'] ?></h5>
              <p class="card-text"><?php echo $data['keterangan'] ?></p>
            </div>
          </div>
        </div>
        <?php
          }
        ?>

      </div>
    </div>
  </div>