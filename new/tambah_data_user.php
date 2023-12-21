<?php
// Pastikan sesi dimulai
session_start();

// Periksa apakah pengguna sudah login atau belum
if (!isset($_SESSION['username'])) {
    // Jika belum, arahkan ke halaman login atau halaman lainnya
    header("Location: login.php");
    exit();
}

include 'koneksi.php'; // Sertakan file konfigurasi database Anda di sini

// Ambil data pengguna dari database berdasarkan username yang sudah login
$username = $_SESSION['username'];
$query = "SELECT * FROM user WHERE username = '$username'";
$result = mysqli_query($koneksi, $query);

// Ambil data pengguna dalam bentuk array asosiatif
$userData = mysqli_fetch_assoc($result);

// Jika formulir dikirimkan untuk menyimpan perubahan
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Ambil data yang diubah dari formulir
    $nikBaru = $_POST['nik'];
    $teleponBaru = $_POST['no'];
    $alamatBaru = $_POST['alamat'];

    // Update data pengguna dalam database
    $updateQuery = "UPDATE user SET nik = '$nikBaru', no = '$teleponBaru', alamat = '$alamatBaru' WHERE username = '$username'";
    $updateResult = mysqli_query($koneksi, $updateQuery);

    if ($updateResult) {
        // Jika berhasil mengupdate data, arahkan ke halaman profil atau halaman lainnya
        header("Location: profil.php");
        exit();
    } else {
        // Jika gagal, tampilkan pesan kesalahan yang lebih spesifik
        $error = "Gagal mengupdate data: " . mysqli_error($koneksi);
    }
}
?>