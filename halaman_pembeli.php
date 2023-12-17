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
<?php
    include 'config.php';
    $db = new Database();
    ?>
    <?php include 'menu_pembeli.html'?>
    <h2>Daftar Bus</h2>
            <h2>Daftar Bus</h2>
        
            <div class="table-container">
                <table class="styled-table" style="margin-top: 9px;">
                <thead>
                    <tr>
                        <th style="text-align: center;" scope="col">#</th>
                        <th scope="col">Nama Bus</th>
                        <th scope="col">Gambar Bus</th>
                        <th scope="col">Tujuan Bus</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php
$no = 1;
foreach ($db->tampil_data_bus() as $x) {
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $x['bus']; ?></td>
        <td> <?php
                            if (empty($x['alamat'])) {
                        ?>
                        <font color="red">Belum ada alamat</font>
                        <?php
                            } else {
                        ?>
                            <img src="<?php echo $x['alamat']; ?>" alt="" width="50" height="80">
                        <?php    
                            }
                        ?></td>
        <td><?php echo $x['nama_kota']; ?></td>
        <td><?php echo $x['harga_bus']; ?></td>
        <td><a href="tabel_bus.php"><button type="button" class='btn btn-primary' id="btn-1">Beli</button></a></td>

    </tr>
<?php 
} 
?>


                    
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


