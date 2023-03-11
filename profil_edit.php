<?php
  include "koneksi.php";
  $id = $_GET['id'];
  $edit = $conn->query("SELECT * FROM guest WHERE id='$id'");
  while ($data = mysqli_fetch_array($edit)){
?>


  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Ubah Profil</h1>
  
</div>
    <form class="row g-3 mb-5" method="post" action="">
		  <div class="col-md-6">
          <label for="password" class="form-label">ID</label>
      <input type="text" class="form-control" id="id" name="id" value="<?php echo $data['id'] ?>">
		  </div>
		  <div class="col-md-6">
		  <label for="password" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="<?php echo $data['name'] ?>">
		  </div>
		  <div class="col-12">
          <label for="password" class="form-label">Username</label>
      <input type="text" class="form-control" id="username" name="username" value="<?php echo $data['username'] ?>">
		  </div>
		  <div class="col-md-6">
          <label for="password" class="form-label">Password</label>
         <input type="text" class="form-control" id="password" name="password">
		  </div>
		   <div class="col-md-6">
           <label for="password" class="form-label">No Telepon</label>
      <input type="text" class="form-control" id="tlp" name="tlp" value="<?php echo $data['tlp'] ?>">
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

    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $tlp = $_POST['tlp'];
    if ($name !='' ) {
        $conn->query("UPDATE guest SET name='$name', username='$username', password=md5('$password'), tlp='$tlp' WHERE id='$id'");
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Profil Berhasil Diedit');
            window.location.href='index.php?page=profil&tab=profile';
            </script>");
    }
}
?>
  