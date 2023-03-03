<?php
  include "../koneksi.php";
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Fasilitas Hotel</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <a href="index.php?page=fasilitashotel-input">
        <button type="button" class="btn btn-sm btn-outline-secondary">+ Fasilitas</button>
      </a>
    </div>
  </div>
</div>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Fasilitas Hotel</th>
        <th scope="col">Keterangan</th>
        <th scope="col">Gambar</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php 
     $query = $conn->query('SELECT * FROM fasilitas_hotel');
     $no = 1;
      while ($data = mysqli_fetch_array($query)) {
    ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $data['nama_fasilitashotel'] ?></td>
        <td><?php echo $data['keterangan'] ?></td>
        <td><img src="../image/<?php echo $data['gambar']; ?>" width="100"/></td>
        <td>
          <a href="index.php?page=fasilitashotel-edit&id=<?php echo $data['id']; ?>">edit</a> | 
          <a href="fasilitashotel_delete.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Anda yakin mau menghapus cerita ini ?')">Hapus</a>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>