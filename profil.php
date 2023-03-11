<?php session_start() ?> 
<!DOCTYPE html>
            <html lang="en">
            
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
                    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
            </head>
            
            <body>
                <div class="container mt-5">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <?php $p = @$_GET['tab']; ?>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link <?php echo $tab == '' || $tab == 'home' ? 'active' : ''; ?>"
                                href="index.php?page=profil&tab=home">Home</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link <?php echo $tab == 'profile' ? 'active' : ''; ?>"
                                href="index.php?page=profil&tab=profile">Profile</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link <?php echo $tab == 'contact' ? 'active' : ''; ?>"
                                href="index.php?page=profil&tab=contact">Contact</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <!-- TAB HOME -->
                        <?php if($p == '' || $p == 'home') : ?>
                        <?php include "koneksi.php" ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nama Pemesan</th>
                                        <th scope="col">Tipe Kamar</th>
                                        <th scope="col">Check IN</th>
                                        <th scope="col">Check Out</th>
                                        <th scope="col">Total Bayar</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $user_id = $_SESSION["guest"]["id"]; ?>
                                <?php $query = $conn->query("SELECT reservasi.id, reservasi.user_id, reservasi.checkin, reservasi.jumlah, reservasi.status, reservasi.checkout, kamar.tipe_kamar, guest.name, reservasi.kamar_id FROM reservasi INNER JOIN kamar ON reservasi.kamar_id=kamar.id INNER JOIN guest ON reservasi.user_id=guest.id WHERE reservasi.user_id='$user_id'") ?>
                                <?php $no=1 ?>
                                <?php while ($data = mysqli_fetch_array($query)) : ?>
                                
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data['name'] ?></td>
                                    <td><?php echo $data['tipe_kamar'] ?></td>
                                    <td><?php echo $data['checkin'] ?></td>
                                    <td><?php echo $data['checkout'] ?></td>
                                    <td><?php echo $data['jumlah'] ?></td>
                                    <td><?php echo $data['status'] ?></td>
                                    <td>
                                    </td>
                                
                                    
                                </tr>
                                <?php endwhile ?>
                                </tbody>
                            
                            </table>

                        <!-- TAB PROFILE -->
                        <?php elseif($p == 'profile') : ?>
                        <?php include "koneksi.php" ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">No Telepon</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $user_id = $_SESSION["guest"]["id"]; ?>
                                <?php
                                    $query = $conn->query("SELECT guest.id, guest.name, guest.username, guest.password, guest.tlp FROM guest WHERE guest.id=$user_id");
                                ?>
                                <?php $no=1 ?>
                                <?php while ($data = mysqli_fetch_array($query)) : ?>
                                
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data['name'] ?></td>
                                    <td><?php echo $data['username'] ?></td>
                                    <td><?php echo $data['tlp'] ?></td>
                                    <td>
                                    <a href="index.php?page=profil-edit&id=<?php echo $data['id']; ?>">edit</a> | 
                                    <a href="index.php?page=profil-delete&id=<?php echo $data['id']; ?>" onclick="return confirm('Anda yakin mau menghapus User ini ?')">Hapus</a>
                                    </td>
                                    
                                
                                    
                                </tr>
                                <?php endwhile ?>
                                </tbody>
                            
                            </table>
                        </div>

                        <!-- TAB CONTAK -->
                        <?php else : ?>
                            <div class="tab-pane fade show active">Contact</div>
                        <?php endif ?>
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
                </script>
            </body>
            
            </html>