<?php
include"koneksi.php";
?>
<section class="py-5 text-center container-fluid bg">
    <div class="container">
    <div class="row py-lg-5">
      <div class="col-lg-12 col-md-12 mx-auto">
        <form class="form-inline" method="get" action="index.php">
        <div class="row g-2">
          <div class="col">
            <label for="checkin">Check In</label>
            <input type="date" class="form-control"  id="checkin" name="checkin" required>
            <input type="hidden" class="form-control"  id="checkin" name="page" value="daftar-kamar-pesan">
          </div>
          <div class="col">
            <label for="checkout">Check Out</label>
            <input type="date" class="form-control"  id="checkout" name="checkout" required>
          </div>
          <div class="col">
            <label for="jumlah">Jumlah Kamar</label>
            <input type="number" class="form-control"  id="jumlah" name="jumlah" required>
          </div>
          <div class="col align-self-end">
            <button type="submit" class="btn btn-primary" href="signin.php">Pesan Sekarang</button>
          </div>
        </div>
        </form>
      </div>
    </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">
    <h2>Daftar Kamar CheckOut</h2>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php 
         $query = $conn->query('SELECT id, tipe_kamar, harga, gambar, fasilitas FROM kamar LEFT JOIN fasilitas_kamar ON id=fasilitaskamar_id WHERE status="checkout"');
          while ($data = mysqli_fetch_array($query)) {
        ?>
        <div class="col">
          <div class="card shadow-sm">
            <img src="image/<?php echo $data['gambar']; ?>" class="bd-placeholder-img card-img-top" width="100%" height="225"role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">

            <div class="card-body">
              <h5 class="card-title"><?php echo $data['tipe_kamar']; ?></h5>
              Fasilitas
              <ul>
                <?php
                  $queryfas = $conn->query("SELECT * FROM fasilitas_kamar WHERE kamar_id = '$data[id]'");
                  while ($fasilitas = mysqli_fetch_array($queryfas)) {
                ?>
                <li><?php echo $fasilitas['fasilitas']; ?></li>

                <?php
                  }
                ?>
              </ul>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                </div>
                <small class="text-muted">Rp. <?php echo $data['harga']; ?> / Malam</small>
              </div>
            </div>
          </div>
        </div>
        <?php
          }
        ?>
      </div>
    </div>
  </div>