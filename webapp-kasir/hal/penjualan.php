<?php
// Untuk menampilkan data
$sql = "SELECT * FROM penjualan";
$result = mysqli_query($db, $sql);


if(isset($_GET['detail'])){
  $sql_detail = "SELECT penjualan_detail.id, barang.nama_barang, penjualan_detail.jumlah, penjualan_detail.harga
  FROM barang
  INNER JOIN penjualan_detail
  ON barang.id = penjualan_detail.id_barang
  WHERE penjualan_detail.id_keranjang = '{$_GET['detail']}'";
  $result_detail = mysqli_query($db, $sql_detail);
}
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Penjualan</h1>
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
            <div class="card card-primary">
              <div class="card-header">
                <h5 class="m-0">Data Penjualan</h5>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Waktu</th>
                    <th>ID Keranjang</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  while($row = mysqli_fetch_array($result)){
                    ?>
                  <tr>
                    <td><?php echo $row['waktu'] ?></td>
                    <td><?php echo $row['id_keranjang'] ?></td>
                    <td><a href="?hal=penjualan&detail=<?php echo $row['id_keranjang'] ?>" class="btn btn-primary">Detail</a></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Waktu</th>
                    <th>ID Keranjang</th>
                    <th></th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>


            <?php if(isset($_GET['detail'])){?>

            <div class="card card-primary">
              <div class="card-header">
                <h5 class="m-0">ID Keranjang: <?php echo $_GET['detail'] ?></h5>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  while($row = mysqli_fetch_array($result_detail)){
                    ?>
                  <tr>
                    <td><?php echo $row['nama_barang'] ?></td>
                    <td><?php echo $row['jumlah'] ?></td>
                    <td><?php echo $row['harga'] ?></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <?php } ?>

          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->