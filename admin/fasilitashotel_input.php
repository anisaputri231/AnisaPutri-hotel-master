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
  <form method="post" action="" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="fasilitashotel" class="form-label">Fasilitas Hotel</label>
      <input type="text" class="form-control" id="fasilitashotel" name="fasilitashotel">
    </div>
    <div class="mb-3">
      <label for="keterangan" class="form-label">Keterangan</label>
      <textarea class="form-control"  id="keterangan" name="keterangan"></textarea>
    </div>
    <div class="mb-3">
      <label for="gambar" class="form-label">Gambar</label>
      <input type="file" class="form-control" id="gambar" name="gambar">
    </div>
    <button type="submit" class="btn btn-primary" name="simpan">Submit</button>
  </form>
</div>

<?php 
if(isset($_POST['simpan']))
{
    $temp = $_FILES['gambar']['tmp_name'];
    $name = $_FILES['gambar']['name'];
    $size = $_FILES['gambar']['size'];
    $type = $_FILES['gambar']['type'];
    $fasilitashotel = $_POST['fasilitashotel'];
    $keterangan = $_POST['keterangan'];
    $folder = "../image/";
    if ($type =='image/jpeg' or $type == 'image/png') {
        move_uploaded_file($temp, $folder . $name);
        $conn->query("insert into fasilitas_hotel (nama_fasilitashotel,keterangan,gambar) values ('$fasilitashotel','$keterangan','$name')");
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Fasilitas Hotel Berhasil Ditambahkan');
            window.location.href='index.php?page=fasilitashotel-list';
            </script>");
    }else{
        echo "<b>Gagal Upload File</b>";
    }
}
?>