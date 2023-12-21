<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../koneksi.php'; // Pastikan Anda telah memasukkan file koneksi ke database

    // Ambil data yang dikirimkan dari form
    $harga_bus = $_POST['harga_bus'];
    $id_kota = $_POST['kota'];
    $id_foto = $_POST['nama_bus'];
    $id_bus_baru = $_POST['id_bus_baru'];

    // Lakukan INSERT ke tabel yang terlibat dalam inner join
    $query = "INSERT INTO nama_bus (id_bus,id_foto,id_kota) VALUES ('$id_bus_baru','$id_foto','$id_kota')";
    $result = mysqli_query($koneksi, $query);

    // Ambil ID terbaru yang di-generate oleh database untuk digunakan pada INNER JOIN
    

    // Lakukan INNER JOIN untuk menyisipkan data ke dalam tabel lainnya
    $query_kota = "INSERT INTO kota (id_bus, id_kota) VALUES ('$id_bus_baru','id_kota')";
    $query_harga = "INSERT INTO harga_bus (id_bus, harga_bus) VALUES ('$id_bus_baru', '$harga_bus')";

    $result_kota = mysqli_query($koneksi, $query_kota);
    $result_harga = mysqli_query($koneksi, $query_harga);

    // Periksa apakah query berhasil dijalankan
    if ($result && $result_kota && $result_harga) {
        // Jika berhasil, kembalikan ke halaman sukses atau ke halaman sebelumnya
        header("Location: semua_bus.php");
        exit();
    } else {
        // Jika gagal, tampilkan pesan error atau lakukan tindakan yang sesuai
        echo "Gagal menambahkan data: " . mysqli_error($koneksi);
    }

    // Tutup koneksi database setelah selesai
    mysqli_close($koneksi);
}
?>
