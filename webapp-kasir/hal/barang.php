<?php
// Untuk menambahkan data
if(isset($_POST['tambah'])){
  $nama_barang = $_POST['nama_barang'];
  $stok = $_POST['stok'];
  $harga = $_POST['harga'];

  $sql = "INSERT INTO barang (nama_barang, stok, harga) VALUES ('$nama_barang', '$stok', '$harga')";
  mysqli_query($db, $sql);
}

if(isset($_GET['del'])){
  $id = $_GET['del'];
  $sql = "UPDATE barang SET aktif='0' WHERE id='$id' ";

  mysqli_query($db, $sql);
}

if(isset($_POST['ubah'])){
  $nama_barang = $_POST['nama_barang'];
  $stok = $_POST['stok'];
  $harga = $_POST['harga'];
  $id = $_POST['id'];

  $sql = "UPDATE barang SET nama_barang='$nama_barang', stok='$stok', harga='$harga' WHERE id='$id'";
  mysqli_query($db, $sql);
}

// Untuk menampilkan data
$sql = "SELECT * FROM barang where aktif=1";
$result = mysqli_query($db, $sql);
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Barang</h1>
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
                <h5 class="m-0">Data Barang</h5>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Harga (Rp.)</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  while($row = mysqli_fetch_array($result)){
                    ?>
                  <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['nama_barang'] ?></td>
                    <td><?php echo $row['stok'] ?></td>
                    <td><?php echo $row['harga'] ?></td>
                    <td><a href="?hal=barang_ubah&id=<?php echo $row['id'] ?>">Ubah</a> | <a href="?hal=barang&del=<?php echo $row['id'] ?>">Hapus</a></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Harga (Rp.)</th>
                    <th></th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Barang</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="?hal=barang">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Stok</label>
                    <input type="number" min="0" class="form-control" name="stok" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Harga</label>
                    <input type="number" min="0" class="form-control" name="harga" required>
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