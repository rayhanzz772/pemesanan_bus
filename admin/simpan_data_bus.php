<?php
include('../config.php');
$koneksi = new Database();
$koneksi->tambah_data_bus($_POST['nama_po'], $_POST['tujuan'], $_POST['biaya_tiket']);
header('location:semua_bus.php');
?>
