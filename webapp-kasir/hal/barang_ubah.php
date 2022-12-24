<?php
// Untuk menampilkan data
$id = $_GET['id'];
$sql = "SELECT * FROM barang where id='$id'";
$data = mysqli_fetch_array(mysqli_query($db, $sql));
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Barang Ubah</h1>
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
              <form method="post" action="?hal=barang">
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                    <label for="exampleInputEmail1">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" value="<?php echo $data['nama_barang'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Stok</label>
                    <input type="number" min="0" class="form-control" name="stok" value="<?php echo $data['stok'] ?>"  required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Harga</label>
                    <input type="number" min="0" class="form-control" name="harga" value="<?php echo $data['harga'] ?>"  required>
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