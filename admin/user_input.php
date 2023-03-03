<?php
  include "../koneksi.php";
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Tambah User</h1>
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
      <label for="username" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" id="username" name="username">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="text" class="form-control" id="password" name="password">
    </div>
    <div class="mb-3">
      <label for="username" class="form-label">No_telp</label>
      <input type="text" class="form-control" id="no_telp" name="no_telp">
    </div>
    <div class="mb-3">
      <label for="role" class="form-label">Role</label>
      <select id="role" class="form-select" name="role">
        <option value="admin" selected="">Admin</option> 
        <option value="resevsionis">Resevsionis</option> 
        <option value="user">User</option> 
      </select>
    </div>
    <button type="submit" class="btn btn-primary" name="simpan">Submit</button>
  </form>
</div>

<?php 
if(isset($_POST['simpan']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    if ($username !='' && $password != '' && $role != '') {
      $conn->query("insert into user (username,password,role) values ('$username','$password','$role')");
        echo ("<script LANGUAGE='JavaScript'>
            window.location.href='index.php?page=user-list';
            </script>");
    }else{
        echo "<b>Gagal Menambahkan user</b>";
    }
}
?>