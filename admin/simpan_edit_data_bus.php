<?php
include('../config.php');

$koneksi = new database();
$koneksi->edit_data_bus($_POST['id'],$_POST['nama_po'], $_POST['tujuan'], $_POST['biaya_tiket']);
header('location:semua_bus.php');
?>
