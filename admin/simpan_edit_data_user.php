<?php
include('../config.php');

$koneksi = new database();
$koneksi->edit_data_user($_POST['id'], $_POST['username'], $_POST['password'], $_POST['email']);
header('location:list_user.php');
?>
