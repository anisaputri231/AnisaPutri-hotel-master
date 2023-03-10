  <?php
  include "../koneksi.php";
  $id = $_GET['id'];
  $edit = $conn->query("SELECT * FROM reservasi WHERE id='$id'");
  while ($data = mysqli_fetch_array($edit)){
?>


  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Ubah Reservasi</h1>
  
</div>
    <form class="row g-3 mb-5" method="post" action="">
		  <div class="col-md-6">
		    <label for="checkin" class="form-label">Checkin</label>
		    <input type="date" class="form-control" id="checkin" name="checkin" readonly value="<?php echo $data['checkin']; ?>">
		  </div>
		  <div class="col-md-6">
		    <label for="checkout" class="form-label">Checkout</label>
		    <input type="date" class="form-control" id="checkout" name="checkout" readonly value="<?php echo $data['checkout']; ?>">
		  </div>
		  <div class="col-12">
		    <label for="nama" class="form-label">User Id</label>
			<?php $guest_name = $conn->query("SELECT * FROM guest WHERE id='$data[user_id]'"); ?>
			<?php $dataguest = $guest_name->fetch_assoc() ?>
		    <input type="text" class="form-control" id="nama" name="namapemesan" readonly value="<?php echo $dataguest['name']; ?>">
		  </div>
		  <div class="col-md-6">
		    <label for="tipekamar" class="form-label">Tipe Kamar</label>
		    <input type="number" class="form-control" id="tipekamar" readonly value="<?php echo $data['kamar_id'] ?>" name="jumlahkamar">
		  </div>
		   <div class="col-md-6">
		    <label for="inputCity" class="form-label">Jumlah Kamar</label>
		    <input type="number" class="form-control" id="inputCity" readonly value="<?php echo $data['jumlah'] ?>" name="jumlahkamar">
		  </div>
		  <div class="col-md-12">
		    <label for="inputCity" class="form-label">Status</label>
		    <select class="form-select" id="inputCity" name="status">
				  <option selected value="proses">Proses</option>
				  <option value="checkin">Check IN</option>
				  <option value="checkout">Check OUT</option>
				</select>
		  </div>
		  <div class="col-12">
		    <button type="submit" class="btn btn-primary" name="simpan">Ubah</button>
		  </div>
		<?php } ?>
		</form>
  </div>
<?php 
if(isset($_POST['simpan']))
{

    $status = $_POST['status'];
    $harga = $_POST['harga'];
    $folder = "../image/";
    if ($status !='' ) {
        $conn->query("UPDATE reservasi SET status='$status' WHERE id='$id'");
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Daftar Reservasi Berhasil Ditambahkan');
            window.location.href='index.php?page=reservasi-list';
            </script>");
    }else{
        echo "<b>Gagal Upload File</b>";
    }
}
?>
  