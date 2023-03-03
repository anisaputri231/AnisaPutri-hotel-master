<?php
  include "../koneksi.php";
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Fasilitas Kamar</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <a href="index.php?page=fasilitaskamar-input">
        <button type="button" class="btn btn-sm btn-outline-secondary">+ Fasilitas Kamar</button>
      </a>
    </div>
  </div>
</div>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Tipe kamar</th>
        <th scope="col">Nama Fasilitas</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php 
     $query = $conn->query('SELECT fasilitaskamar_id,tipe_kamar,fasilitas FROM fasilitas_kamar INNER JOIN kamar ON fasilitas_kamar.kamar_id = kamar.id ');
      $no = 1;
     while ($data = mysqli_fetch_array($query)) {
    ?>
      <tr>
        <td><?php echo $no++?></td>
        <td><?php echo $data['tipe_kamar'] ?></td>
        <td><?php echo $data['fasilitas'] ?></td>
        <td>
          <a href="index.php?page=fasilitaskamar-edit&id=<?php echo $data['fasilitaskamar_id'] ?>">Edit</a> | 
          <a href="fasilitaskamar_delete.php?id=<?php echo $data['fasilitaskamar_id']; ?>" onclick="return confirm('Anda yakin mau menghapus ini ?')">Hapus</a>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>