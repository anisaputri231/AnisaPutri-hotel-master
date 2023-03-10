<?php
  include "../koneksi.php";
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
  <h1 class="h2">Daftar Reservasi Hotel</h1>
</div>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <form class="row g-3" method="post" action="index.php?page=cari-tanggal">
    <div class="col">
      <input type="date" class="form-control" id="checkin" name="checkin">
    </div>
    <div class="col">
      <input type="submit" name="" value="cari" class="btn btn-primary">
    </div>
  </form>
  <form class="row g-3" method="post" action="index.php?page=cari-nama">
    <div class="col">
      <input type="text" class="form-control" name="user_id">
    </div>
    <div class="col">
      <input type="submit" name="" value="cari" class="btn btn-primary">
    </div>
  </form>
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
     $query = $conn->query('SELECT reservasi.id, reservasi.checkin, reservasi.jumlah, reservasi.status, reservasi.checkout, kamar.tipe_kamar, guest.name, reservasi.kamar_id FROM reservasi INNER JOIN kamar ON reservasi.kamar_id=kamar.id INNER JOIN guest ON reservasi.user_id=guest.id');
     $no=1; 
     while ($data = mysqli_fetch_array($query)) {
    ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $data['name'] ?></td>
        <td><?php echo $data['tipe_kamar'] ?></td>
        <td><?php echo $data['checkin'] ?></td>
        <td><?php echo $data['checkout'] ?></td>
        <td><?php echo $data['jumlah'] ?></td>
        <td><?php echo $data['status'] ?></td>
           <td>
            <a href="index.php?page=reservasi-edit&id=<?php echo $data['id']; ?>">ubah</a> | 
            <a href="reservasi_delete.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Anda yakin mau menghapus cerita ini ?')">Delete</a>
          </td>
       
        
      </tr>
    <?php } ?>
    </tbody>
   
  </table>
<br>
<br>
<br>
</div>