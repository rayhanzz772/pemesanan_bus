<?php
session_start();

// Periksa apakah pengguna sudah login
if (($_SESSION['username']== 'admin')) {
    // Jika belum, arahkan ke halaman login atau halaman yang sesuai
    header("Location: admin/index.php");
    exit; // Penting untuk keluar dari skrip setelah melakukan redirect
}elseif(($_SESSION['username'])) {
    header("Location: halaman_pembeli.php");
}elseif(!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>