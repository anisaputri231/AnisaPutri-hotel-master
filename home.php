  <section class="pt-5 text-center container-fluid bg">
    <div class="container">
    <div class="px-4 my-5 text-center border-bottom">
    <h2 class="display-4 fw-bold">Four Seasons Hotel</h2>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4"><b>Inspired by the beauty of Parahyangan, Four Seasons Hotel offers spectacular tourist
      views, indulgent dining, elegant rooms, and exceptional hospitality embodied by 
      the 24-hour Butler Service. in the hustle and bustle of Ciumbuleuit, yet only 
      minutes from the hustle and bustle of downtown Bandung, this hotel is 10 km from
      Husein Sastranegara International Airport and 9 km from Bandung train station.
      Four Seasons Hotel is the perfect venue for rejuvenation, luxury holidays, private 
      gatherings and well-organized events and gatherings.</b></p>
    </div>
  </div>
    </div>
  </section>
  <center><h2 class="fw-bold">A Book Hotel</h2></center>
  <section>

  <div class="container text-center pt-3">
  <div class="row row-cols-4">
<?php 
include "koneksi.php";
$query = $conn->query('SELECT id, tipe_kamar, harga, gambar, fasilitas FROM kamar LEFT JOIN fasilitas_kamar ON id=fasilitaskamar_id');
while ($data = mysqli_fetch_array($query)) {
?>
    <div class="col">
      <div class="card mb-2" style="width: 15rem;">
        <img src="image/<?php echo $data['gambar']; ?>" class="card-img-top" alt="..." height="160">
        <div class="card-body" style="height: 130px;">
          <p class="card-text">Standard Room <br> Kamar nyaman, strategis, banyak tempat makan.</p>
        </div>
      </div>
    </div>
<?php
}
?>
</div>
  </section>
 
