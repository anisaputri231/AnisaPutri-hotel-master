<?php
  include "../koneksi.php";
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
  <h1 class="h2">Hasil cari berdasarkan Nama</h1>
</div>

<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">User Id</th>
        <th scope="col">Tipe Kamar</th>
        <th scope="col">Check IN</th>
        <th scope="col">Check Out</th>
        <th scope="col">Total Bayar</th>
        <th scope="col">Status</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    $user_id = $_POST['user_id'];
    $query = $conn->query("SELECT * FROM  reservasi JOIN kamar ON kamar.id = reservasi.kamar_id WHERE user_id like '%$user_id%'");
      while ($data = mysqli_fetch_array($query)) {
    ?>
      <tr>
        <td><?php echo $data['id'] ?></td>
        <td><?php echo $data['user_id'] ?></td>
        <td><?php echo $data['tipe_kamar'] ?></td>
        <td><?php echo $data['checkin'] ?></td>
        <td><?php echo $data['checkout'] ?></td>
        <td><?php echo $data['jumlah'] ?></td>
        <td><img src="../image/<?php echo $data['gambar']; ?>" width="100"/></td>
        <td>
          <a href="">ubah</a>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>