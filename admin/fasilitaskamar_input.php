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
  <form action="" method="post">
    <div class="mb-3">
      <label for="tipekamar" class="form-label">Tipe Kamar</label>
      <select id="tipekamar" class="form-select" name="tipekamar">
          <?php 
            $sql=$conn->query('SELECT * FROM kamar');
            while ($data = mysqli_fetch_array($sql)) {
          ?>
            <option value="<?php echo $data['id']?>">
              <?php echo $data['tipe_kamar']; ?>
            </option> 
           <?php
            }
           ?>
        </select>
    <div class="mb-3">
      <label for="fasilitas" class="form-label">Fasilitas</label>
      <textarea class="form-control"  id="Keterangan" name="fasilitas"></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="simpan">Submit</button>
  </form>
</div>

<?php 
if(isset($_POST['simpan']))
{
    $tipekamar = $_POST['tipekamar'];
    $fasilitas = $_POST['fasilitas'];
    if ($tipekamar !==''){
        $add = $conn->query("insert into fasilitas_kamar (kamar_id,fasilitas) values ('$tipekamar','$fasilitas')");
        if ($add) {
          echo ("<script LANGUAGE='JavaScript'>
            window.alert('Fasilitas Kamar Berhasil Ditambahkan');
            window.location.href='index.php?page=fasilitaskamar-list';
            </script>");
        }
    }else{
        echo "<b>Gagal Upload File</b>";
    }
}
?>