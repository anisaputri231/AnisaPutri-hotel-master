<?php
  include "../koneksi.php";
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Daftar Kamar</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <a href="index.php?page=tambah-kamar">
        <button type="button" class="btn btn-sm btn-outline-secondary">+ Kamar</button>
      </a>
    </div>
  </div>
</div>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Tipe Kamar</th>
        <th scope="col">Harga</th>
        <th scope="col">Gambar</th>
        <th scope="col">Status</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php 
     $query = $conn->query("SELECT * FROM kamar WHERE status='checkout'");
     $no=1; 
     while ($data = mysqli_fetch_array($query)) {
    ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $data['tipe_kamar'] ?></td>
        <td><?php echo $data['harga'] ?></td>
        <td><img src="../image/<?php echo $data['gambar']; ?>" width="100"/></td>
        <td><?php echo $data['status'] ?></td>
        <td>
          <a href="index.php?page=kamar-edit&id=<?php echo $data['id']; ?>">edit</a> | 
          <a href="kamar_delete.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Anda yakin mau menghapus cerita ini ?')">Hapus</a>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>
