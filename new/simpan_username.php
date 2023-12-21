<?php
include('config.php');
$koneksi = new Database();
$koneksi->tambah_user($_POST['username'], $_POST['email'],$_POST['password']);
header('location:login.php');