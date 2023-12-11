<?php

include "../koneksi.php";
// Ambil tanggal hari ini
$tanggal_hari_ini = date("Y-m-d");

// Query untuk mengambil total transaksi pada hari ini
$query = "SELECT SUM(total) AS total_transaksi FROM penumpang WHERE DATE(tgl_pesan) = '$tanggal_hari_ini'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    // Ambil data hasil query
    $row = mysqli_fetch_assoc($result);
    $total_transaksi_raw_hari_ini = $row['total_transaksi'];
    $total_transaksi_hari_ini = "Rp " . number_format($total_transaksi_raw_hari_ini, 0, ",", ".");
    // Tampilkan total transaksi atau "income" di jendela admin
} else {
    // Jika terjadi kesalahan dalam query
    echo "Gagal mengambil data.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php


    echo"$total_transaksi_hari_ini";

    ?>
</body>
</html>