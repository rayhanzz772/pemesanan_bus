<?php
session_start();
// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika belum, arahkan ke halaman login atau halaman yang sesuai
    header("Location: ../login.php");
    exit; // Penting untuk keluar dari skrip setelah melakukan redirect
}


?>

<?php

include "../koneksi.php";

$query = "SELECT SUM(total) AS total_transaksi FROM penumpang";
$result = mysqli_query($koneksi, $query);

if ($result) {
    // Ambil data hasil query
    $row = mysqli_fetch_assoc($result);
    $total_transaksi_raw = $row['total_transaksi'];
    $total_transaksi = "Rp " . number_format($total_transaksi_raw, 0, ",", ".");
    // Tampilkan total transaksi atau "income" di jendela admin
} else {
    // Jika terjadi kesalahan dalam query
    echo "Gagal mengambil data.";
}

$query = "SELECT COUNT(id) AS total_id FROM user";
$result = mysqli_query($koneksi, $query);

// Periksa apakah query berhasil dieksekusi
if ($result) {
    // Ambil data hasil query
    $row = mysqli_fetch_assoc($result);
    $total_id = $row['total_id'];
} else {
    // Jika terjadi kesalahan dalam query
    echo "Gagal mengambil data.";
}

// Ambil tanggal hari ini
date_default_timezone_set("Asia/Bangkok");
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

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

    <?php include 'sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <?php include "topbar.php" ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>


                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body border-bottom-warning">
                                    <div class="chart-area">
                                        <?php include 'chart.php' ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- CARD PENDAPATAN -->
                            <?php include "card_pendapatan.php" ?>;
                        <!-- END CARD PENDAPATAN -->
                    </div>
            

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include "footer.php"?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>