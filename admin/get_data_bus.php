<?php
// Koneksi ke database
include '../koneksi.php';

// Periksa apakah ada parameter ID yang diterima dari permintaan GET
if (isset($_GET['id'])) {
    // Ambil ID dari permintaan GET
    $id = $_GET['id'];

    // Query untuk mengambil data berdasarkan ID
    $query = "SELECT * FROM bus WHERE id = $id"; // Sesuaikan dengan nama tabel dan struktur kolom Anda

    // Lakukan query ke database
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Periksa apakah ada data yang ditemukan
        if (mysqli_num_rows($result) > 0) {
            // Ambil baris data sebagai array asosiatif
            $row = mysqli_fetch_assoc($result);

            // Ubah data ke format JSON dan kirimkan sebagai respons
            header('Content-Type: application/json');
            echo json_encode($row);
        } else {
            // Jika tidak ada data yang ditemukan untuk ID yang diberikan
            echo json_encode(array('error' => 'Data tidak ditemukan'));
        }
    } else {
        // Jika terjadi kesalahan dalam eksekusi query
        echo json_encode(array('error' => 'Gagal menjalankan query'));
    }
} else {
    // Jika tidak ada parameter ID yang diterima dari permintaan GET
    echo json_encode(array('error' => 'Parameter ID tidak ditemukan'));
}
?>
