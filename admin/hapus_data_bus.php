<?php
// Pastikan session sudah dimulai sebelum mengakses variabel session
session_start();

// Periksa apakah ada sesi 'username' yang tersimpan
if (!isset($_SESSION['username'])) {
    // Redirect atau tindakan lain jika tidak ada sesi 'username'
    header('Location: login.php'); // Ganti login.php dengan halaman login Anda
    exit();
}

// Periksa apakah ada parameter 'id' yang dikirim melalui GET
if (!isset($_GET['id'])) {
    // Tidak ada ID yang diberikan, redirect atau tindakan lain sesuai kebutuhan
    header('Location: semua_bus.php'); // Ganti halaman_yang_sesuai.php dengan halaman yang sesuai
    exit();
}

// Mengambil ID yang akan dihapus
$id_bus = $_GET['id']; // Pastikan untuk mengamankan nilai ID ini untuk mencegah SQL injection

// Koneksi ke database (gunakan cara koneksi yang telah Anda tentukan)
include "../koneksi.php";

// Lakukan penghapusan data dari tabel menggunakan perintah SQL DELETE
$sql_delete = mysqli_query($koneksi, "DELETE FROM nama_bus WHERE id_bus = '$id_bus'");
$sql_delete_harga = mysqli_query($koneksi, "DELETE FROM harga_bus WHERE id_bus = '$id_bus'");
$sql_delete_kota = mysqli_query($koneksi, "DELETE FROM kota WHERE id_bus = '$id_bus'");


if ($sql_delete && $sql_delete_harga && $sql_delete_kota) {
    // Berhasil menghapus data
    echo "Data berhasil dihapus.";
    // Lakukan tindakan atau redirect ke halaman tertentu jika diperlukan
    header('Location: semua_bus.php');
} else {
    // Gagal menghapus data
    echo "Gagal menghapus data.";
    // Handle kesalahan atau tampilkan pesan kesalahan jika perlu
}
?>
