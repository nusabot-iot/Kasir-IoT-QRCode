<?php
session_start();

if(!isset($_SESSION['nama_pegawai'])){
    header("Location: login.php");
}
?>