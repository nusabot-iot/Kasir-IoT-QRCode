<?php
// Untuk menampilkan data
$username = $_GET['username'];
$sql = "SELECT * FROM pengguna where username='$username'";
$data = mysqli_fetch_array(mysqli_query($db, $sql));
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pengguna Ubah</h1>
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

          <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="?hal=pengguna">
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                    <label for="exampleInputEmail1">Nama Pegawai</label>
                    <input type="text" class="form-control" name="nama_pegawai" value="<?php echo $data['nama_pegawai'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $data['username'] ?>"  required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" placeholder="Kosongkan Jika Tidak Ingin Mengubah Password" class="form-control" name="password" required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="ubah" class="btn btn-warning">Ubah</button>
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