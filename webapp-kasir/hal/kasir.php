<?php
if(isset($_POST['tampil'])){
  $sql = "SELECT keranjang_detail.id, barang.nama_barang, keranjang_detail.jumlah, keranjang_detail.harga
  FROM barang
  INNER JOIN keranjang_detail
  ON barang.id = keranjang_detail.id_barang
  WHERE keranjang_detail.id_keranjang = '{$_POST['id_keranjang']}'";

  $result = mysqli_query($db, $sql);

  $total_belanja = 0;

}

if(isset($_POST['bayar'])){
  $sql_penjualan = "INSERT INTO penjualan (id_keranjang) VALUES ('{$_POST['id_keranjang']}')";

  $sql_penjualanDetail = "INSERT INTO penjualan_detail (id_keranjang, id_barang, jumlah, harga)
  SELECT id_keranjang, id_barang, jumlah, harga
  FROM keranjang_detail
  WHERE id_keranjang =  '{$_POST['id_keranjang']}'";

  $sql_hapusKeranjang = "DELETE FROM keranjang WHERE id = '{$_POST['id_keranjang']}'";

  mysqli_query($db, $sql_penjualan);
  mysqli_query($db, $sql_penjualanDetail);
  mysqli_query($db, $sql_hapusKeranjang);

}
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Kasir</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <form method="post" action="">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-12">
                        <input type="number" name="id_keranjang" min="1" value="<?php echo $_POST['id_keranjang'] ?>" class="form-control" placeholder="ID Keranjang" required autofocus <?php if(isset($_POST['tampil'])) echo "readonly"?>>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <?php if(!isset($_POST['tampil'])){ ?>
                      <input type="submit" name="tampil" class="btn btn-primary" value="Tampilkan Keranjang">
                    <?php } ?>
                    <?php if(isset($_POST['tampil'])){ ?>
                      <input type="submit" name="bayar" class="btn btn-danger" value="Bayar">
                    <?php } ?>
                  </div>
                </form>
              </div>
            </div>

            <?php if(isset($_POST['tampil'])){ ?>
            <div class="card card-primary card-outline">
              <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Nama Barang</th>
                      <th>Harga</th>
                      <th>Jumlah</th>
                      <th>Sub Total</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                      <td><?php echo $row['nama_barang'] ?></td>
                      <td><?php echo $row['harga'] ?></td>
                      <td><?php echo $row['jumlah'] ?></td>
                      <td><?php echo number_format($row['harga']*$row['jumlah'],"2",",",".") ?></td>
                    </tr>
                    <?php 
                    $total_belanja = $total_belanja + ($row['harga'] * $row['jumlah']);
                    }
                   ?>
                  </tbody>
                </table>
                <div class="form-group">
                  <h4><b style="color:green">Total: Rp. <?php echo number_format($total_belanja,"2",",",".") ?></b></h4>
                </div>
              </div>
            </div><!-- /.card -->
            <?php } ?>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->