<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grafik Penghasilan</title>
    <!-- Sisipkan Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Canvas untuk grafik -->

    <?php
    include "../koneksi.php";

    // $query = "SELECT total FROM penumpang";
    // $result = mysqli_query($koneksi, $query);
    
    // if ($result) {
    //     $total_transaksi = []; // Membuat array kosong untuk menyimpan nilai total
    //     // Loop untuk mengambil setiap baris hasil query
    //     while ($row = mysqli_fetch_assoc($result)) {
    //         $total_transaksi[] = $row['total']; // Menambahkan nilai 'total' ke dalam array
    //     }
    // } else {
    //     // Jika terjadi kesalahan dalam query
    //     echo "Gagal mengambil data.";
    // }

    $query = "SELECT nama_po, COUNT(*) as total_pemesanan FROM penumpang GROUP BY nama_po";
    $result = mysqli_query($koneksi, $query);

    // Array untuk menyimpan nama bis dan jumlah pemesanannya
    $nama_bis = [];
    $jumlah_pemesanan = [];

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $nama_bis[] = $row['nama_po'];
            $jumlah_pemesanan[] = $row['total_pemesanan'];
        }
    } else {
        echo "Tidak ada data yang ditemukan.";
    }

    mysqli_close($koneksi);


    ?>
<canvas id="chartPemesanan"></canvas>
<script>
        // Mengambil data yang sudah didapatkan dari PHP
        var namaBis = <?php echo json_encode($nama_bis); ?>;
        console.log(namaBis)
        var jumlahPemesanan = <?php echo json_encode($jumlah_pemesanan); ?>;
        console.log(jumlahPemesanan)
        // Membuat chart menggunakan Chart.js
        var ctx = document.getElementById('chartPemesanan').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: namaBis,
                datasets: [{
                    label: 'Jumlah Pemesanan Bus',
                    data: jumlahPemesanan,
                    backgroundColor: 'rgba(246,194,62,0.8)', // Warna untuk setiap bar
                    borderColor: 'rgb(100,100,100)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
