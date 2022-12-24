<?php
session_start();

$pesan = "Masukan ID Keranjang dan Passcode";

if(isset($_POST['baru'])){
  include "../conf/database.php";

  $pascode = $_POST['pascode'];

  $sql = "INSERT INTO keranjang (pascode) VALUES ('$pascode')";
  mysqli_query($db, $sql);

  $sql_select = "SELECT max(id) as id_keranjang_terakhir FROM keranjang";
  $result_select = mysqli_query($db, $sql_select);
  $row = mysqli_fetch_array($result_select);

  $_SESSION['id_keranjang'] = $row['id_keranjang_terakhir'];

  header("Location: index.php");
}

if(isset($_POST['buka'])){
  include "../conf/database.php";

  $id_keranjang = $_POST['id_keranjang'];
  $pascode = $_POST['pascode'];

  $sql = "SELECT * FROM keranjang where id='$id_keranjang'";
  $result = mysqli_query($db, $sql);
  $data = mysqli_fetch_array($result);

  if($data){
    if($data['pascode'] == $pascode){
      $_SESSION['id_keranjang'] = $id_keranjang;

      header("Location: index.php");
    } else {
      $pesan = "Pascode Salah";
    }
  } else {
    $pesan = "ID Keranjang Tidak Terdaftar";
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Buat Keranjang</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Toko</b> ABC
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><?php echo $pesan ?></p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="number" name="id_keranjang" class="form-control" placeholder="ID Keranjang" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-shopping-cart"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="pascode" class="form-control" placeholder="Passcode" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" name="buka" class="btn btn-primary btn-block">Buka Keranjang</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- ATAU -</p>
        <form method="post" action="">
          <div class="input-group mb-3">
            <input type="password" name="pascode" class="form-control" placeholder="Passcode Keranjang Baru" required>
          </div>
          <button type="submit" name="baru" class="btn btn-danger btn-block"><span class="fas fa-cart-plus"></span> Buat Keranjang Baru</button>
        </form>
      </div>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
