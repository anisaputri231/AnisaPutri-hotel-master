<?php
  include "../koneksi.php";
?>

<?php 
if(isset($_POST['simpan']))
{
    $temp = $_FILES['gambar']['tmp_name'];
    $name = $_FILES['gambar']['name'];
    $size = $_FILES['gambar']['size'];
    $type = $_FILES['gambar']['type'];
    $tipekamar = $_POST['tipekamar'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];
    $folder = "../image/";
    if ($type =='image/jpeg' or $type == 'image/png') {
        move_uploaded_file($temp, $folder . $name);
        $conn->query("insert into kamar (tipe_kamar,harga,gambar,status) values ('$tipekamar','$harga','$name','$status')");
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Daftar Kamar Berhasil Ditambahkan');
            window.location.href='index.php?page=kamar-list';
            </script>");
    }else{
        echo "<b>Gagal Upload File</b>";
    }
}
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Input Data Kamar</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <a href="index.php?page=kamar-list">
        <button type="button" class="btn btn-sm btn-outline-secondary">Daftar Kamar</button>
      </a>
    </div>
  </div>
</div>
<div class="table-responsive">
  <form method="post" action="" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tipe Kamar</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tipekamar">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Harga</label>
      <input type="text" class="form-control" name="harga">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Gambar</label>
      <input type="file" class="form-control" id="exampleInputPassword1" name="gambar">
    </div>
    <div class="mb-3">
    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="status">
  <option>Status</option>
  <option value="checkout">Proses</option>
  <option value="checkin">Checkin</option>
  <option value="checkout">Checkout</option>
</select>
    </div>
    <button type="submit" class="btn btn-primary" name="simpan">Submit</button>
  </form>
</div>

