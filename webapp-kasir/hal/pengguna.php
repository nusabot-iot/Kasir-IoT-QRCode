<?php
// Untuk menambahkan data
if(isset($_POST['tambah'])){
  $nama_pegawai = $_POST['nama_pegawai'];
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $sql = "INSERT INTO pengguna (username, nama_pegawai, password) VALUES ('$username', '$nama_pegawai', '$password')";
  mysqli_query($db, $sql);
}

if(isset($_GET['del'])){
  $username = $_GET['del'];
  $sql = "UPDATE pengguna SET aktif='0' WHERE username='$username' ";

  mysqli_query($db, $sql);
}

if(isset($_POST['ubah'])){
  $nama_pegawai = $_POST['nama_pegawai'];
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  if($_POST['password'] == ""){
    $sql = "UPDATE pengguna SET username='$username', nama_pegawai='$nama_pegawai' WHERE username='$username'";
  } else {
    $sql = "UPDATE pengguna SET username='$username', nama_pegawai='$nama_pegawai', password = '$password' WHERE username='$username'";
  }

  mysqli_query($db, $sql);
}

// Untuk menampilkan data
$sql = "SELECT * FROM pengguna where aktif=1";
$result = mysqli_query($db, $sql);
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pengguna</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-lg-12">
            <?php if(isset($_POST['tambah'])){ ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i> Data Berhasil Ditambah!</h5>
              Data sudah masuk ke database.
            </div>
            <?php } ?>

            <?php if(isset($_POST['ubah'])){ ?>
            <div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i> Data Berhasil Diubah!</h5>
              Data sudah di database sudah diubah.
            </div>
            <?php } ?>

            <div class="card card-primary">
              <div class="card-header">
                <h5 class="m-0">Data Pengguna</h5>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Username</th>
                    <th>Nama Pegawai</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  while($row = mysqli_fetch_array($result)){
                    ?>
                  <tr>
                    <td><?php echo $row['username'] ?></td>
                    <td><?php echo $row['nama_pegawai'] ?></td>
                    <td><a href="?hal=pengguna_ubah&username=<?php echo $row['username'] ?>">Ubah</a> | <a href="?hal=pengguna&del=<?php echo $row['username'] ?>">Hapus</a></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Username</th>
                    <th>Nama Pegawai</th>
                    <th></th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Pengguna</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="?hal=pengguna">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" name="username" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Pegawai</label>
                    <input type="text" min="0" class="form-control" name="nama_pegawai" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">password</label>
                    <input type="password" min="0" class="form-control" name="password" required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->