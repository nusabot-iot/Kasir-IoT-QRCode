<?php
session_start();
session_destroy();

header("Location: buat-keranjang.php");
?>