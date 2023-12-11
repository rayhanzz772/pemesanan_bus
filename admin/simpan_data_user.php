<?php
include('../config.php');
$koneksi = new Database();
$koneksi->tambah_data_user($_POST['username'], $_POST['password'], $_POST['akses_id'], $_POST['email']);
header('location:list_user.php');
?>
