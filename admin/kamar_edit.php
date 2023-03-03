<?php
  include "../koneksi.php";
  $id = $_GET['id'];
  $edit = $conn->query("SELECT * FROM kamar WHERE id='$id'");
  while ($data = mysqli_fetch_array($edit)){

?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Data Kamar</h1>
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
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tipekamar" value="<?php echo $data['tipe_kamar']; ?>">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Harga</label>
      <input type="text" class="form-control" name="harga" value="<?php echo $data['harga']; ?>">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Gambar</label>
      <input type="file" class="form-control" id="exampleInputPassword1" name="gambar" value="<?php echo $data['gambar']; ?>">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Status</label>
      <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="status" >
  <?php echo $data['status']; ?>
  <option value="ceheckin">Checkin</option>
  <option value="checkout">Checkout</option>
</select>
    </div>
    <button type="submit" class="btn btn-primary" name="simpan">Submit</button>
    <?php
        }if (isset($_POST['simpan'])) {
          $tipe = $_POST['tipekamar'];
          $harga = $_POST['harga'];
          $status = $_POST['status'];
          $name = $_FILES['gambar']['name'];
          $temp = $_FILES['gambar']['tmp_name'];
          $size = $_FILES['gambar']['size'];
          $type = $_FILES['gambar']['type'];
          $folder = "../image/";

          $update =  $conn->query("UPDATE kamar SET tipe_kamar='$tipe',
          harga='$harga', gambar='$name', status='$status' WHERE id='$id'");
          if ($update) {
            move_uploaded_file($temp, $folder . $name);
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Daftar Kamar Berhasil Ditambahkan');
                window.location.href='index.php?page=kamar-list';
                </script>");
        }else{
            echo "<b>Gagal Upload File</b>";
        }
    }
    ?>
  </form>
</div>

<!-- <?php 
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
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Daftar Kamar Berhasil Ditambahkan');
            window.location.href='index.php?page=kamar-list';
            </script>");
    }else{
        echo "<b>Gagal Upload File</b>";
    }
}
?> -->