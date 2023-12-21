<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pastikan koneksi telah terbentuk
    include '../koneksi.php'; // Gantilah dengan file koneksi Anda

    // Ambil data yang dikirimkan dari form
    $id = $_POST['id'];
    $nama_bus = $_POST['bus'];
    $id_bus = $_POST['id_bus'];
    $id_kota = $_POST['kota'];
    $harga_bus = $_POST['harga_bus'];

    // Lakukan query untuk melakukan update data
    $query = "UPDATE nama_bus nb
              INNER JOIN kota k ON nb.id_bus = k.id_bus
              INNER JOIN harga_bus h ON nb.id_bus = h.id_bus
              SET k.id_kota = '$id_kota', h.harga_bus = '$harga_bus', nb.id_bus = 
                    '$id_bus', nb.id_bus = '$id_bus', h.id_bus = '$id_bus', k.id_bus = '$id_bus', k.id_bus = '$id_bus',
                    nb.id_kota = '$id_kota', h.harga_bus = '$harga_bus', k.id_bus = '$id_bus', k.id_kota = '$id_kota'
              WHERE nb.id = '$id'";

    $result = mysqli_query($koneksi, $query);

    // Periksa apakah query berhasil dijalankan
    if ($result) {
        // Jika berhasil, kembalikan ke halaman sebelumnya atau halaman sukses
        header("Location: semua_bus.php"); // Gantilah dengan halaman yang sesuai
        exit();
    } else {
        // Jika gagal, tampilkan pesan error atau lakukan tindakan yang sesuai
        echo "Gagal memperbarui data: " . mysqli_error($koneksi);
    }

    // Tutup koneksi database setelah selesai
    mysqli_close($koneksi);
}
?>
