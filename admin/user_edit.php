<?php
  include "../koneksi.php";
  $id = $_GET['id'];
  $edit = $conn->query("SELECT * FROM user WHERE id='$id'");
  while ($data = mysqli_fetch_array($edit)){

?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit User</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <a href="index.php?page=user-input">
        <button type="button" class="btn btn-sm btn-outline-secondary">+ User</button>
      </a>
    </div>
  </div>
</div>
<div class="table-responsive">
  <form method="post" action="" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" id="username" name="username" value="<?php echo $data['username'] ?>">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="text" class="form-control" id="password" name="password" value="<?php echo $data['password'] ?>">
    </div>
    <div class="mb-3">
      <label for="role" class="form-label">Role</label>
      <select id="role" class="form-select" name="role">
        <option value="admin" selected="">Admin</option> 
        <option value="resevsionis">Resevsionis</option> 
      </select>
    </div>
    <button type="submit" class="btn btn-primary" name="simpan">Submit</button>
  </form>
</div>
<?php 
}
if(isset($_POST['simpan']))
{

    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    if ($username !='' && $password !='' && $role !='') {
      $conn->query("UPDATE user SET username='$username', password='$password', role='$role' WHERE id='$id'");
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('User Berhasil Diedit');
            window.location.href='index.php?page=user-list';
            </script>");
    }else{
        echo "<b>Gagal Upload File</b>";
    }
}
?>