        <?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika belum, arahkan ke halaman login atau halaman yang sesuai
    header("Location: login.php");
    exit; // Penting untuk keluar dari skrip setelah melakukan redirect
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style-harga.css">
    <!-- Bootstrap CSS -->
    <title>Sewa Buku</title>
</head>

<body>
    <?php include 'menu_pembeli.html'?>
    <h2>Daftar Bus</h2>
    <?php include 'menu_pembeli.html'?>
            <h2>Daftar Bus</h2>
        
            <div class="table-container">
                <table class="styled-table" style="margin-top: 9px;">
                <thead>
                    <tr>
                        <th style="text-align: center;" scope="col">#</th>
                        <th scope="col">Nama Bus</th>
                        <th scope="col">Gambar Bus</th>
                        <th scope="col">Tujuan Bus</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th style="text-align: center;" scope="row">1</th>
                        <td>Sinar Jaya</td>
                        <td><img src="img/sinar_jaya.jpg" class="img-fluid" style="max-width: 100px;" alt="Sinar Jaya"></td>
                        <td>Malang, Semarang, Cirebon</td>
                        <td>                        
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary"><a style="color: white; text-decoration: none;" href="tabel_bus.php">Pesan</a></button> <!-- Klik untuk memesan -->
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <th style="text-align: center;" scope="row">2</th>
                        <td>Dewi Sri</td>
                        <td><img src="img/dewi_sri.jpeg" class="img-fluid" style="max-width: 100px;" alt="Dewi Sri"></td>
                        <td>Bandung, Yogyakarta</td>
                        <td>                        
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary"><a style="color: white; text-decoration: none;" href="tabel_bus.php">Pesan</a></button> <!-- Klik untuk memesan -->
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <th style="text-align: center;" scope="row">3</th>
                        <td>Putra Remaja</td>
                        <td><img src="img/putra_remaja.png" class="img-fluid" style="max-width: 100px;" alt="Putra Remaja"></td>
                        <td>Sumedang, Cilacap</td>
                        <td>                        
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary"><a style="color: white; text-decoration: none;" href="tabel_bus.php">Pesan</a></button> <!-- Klik untuk memesan -->
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <th style="text-align: center;" scope="row">4</th>
                        <td>Nusantara</td>
                        <td><img src="img/nusantara.jpg" class="img-fluid" style="max-width: 100px;" alt="Nusantara"></td>
                        <td>Banyuwangi, Surabaya</td>
                        <td>                        
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary"><a style="color: white; text-decoration: none;" href="tabel_bus.php">Pesan</a></button> <!-- Klik untuk memesan -->
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <th style="text-align: center;" scope="row">5</th>
                        <td>Haryanto</td>
                        <td><img src="img/nusantara.jpg" class="img-fluid" style="max-width: 100px;" alt="Nusantara"></td>
                        <td>Surabaya</td>
                        <td>                        
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary"><a style="color: white; text-decoration: none;" href="tabel_bus.php">Pesan</a></button> <!-- Klik untuk memesan -->
                        </div>
                        </td>
                    </tr>
                    <tr>
                    <div class="row">
                    </div>

                    </tr>
                </tbody>
            </table>
            
        </div>
    </div>
</body>

</html>


