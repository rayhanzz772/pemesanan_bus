<?php  
session_start(); // Pastikan session sudah dimulai sebelum mengakses variabel session

// Mengambil nilai dari variabel session 'user'
$user = $_SESSION['username'];
include "koneksi.php";
$result = mysqli_query($koneksi, "SELECT * FROM penumpang WHERE username = '$user'");

	
?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
<head>
<?php
    include 'config.php';
    $db = new Database();
    ?>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Tables - Basic Tables | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-examplehash" crossorigin="anonymous" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />
    <link rel="stylesheet" href="style.css">
    <!-- Vendors CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <style>
      .modal-dialog {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
      }

      .modal-content {
        text-align: center;
      }

      #closeButton {
        width: 250px;
        background-color: #6164EC;
    }
    </style>
    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
<?php include 'header.html'; ?>
            <!-- / Menu -->

              <!-- Layout container -->
                <div class="layout-page">
                 <!-- Navbar -->

                 <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">


                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0"></i>
                                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
                            </div>
                        </div>
                        <!-- /Search -->

                    </div>
                   </nav>

                  <!-- / Navbar -->

                  <!-- Content wrapper -->
                  <div class="content-wrapper">
                  <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Tiket Saya</h4>

                        <!-- Tiket Bootstrap Table -->
                        <div class="card">
  <div class="card-body">
    <div class="text-section">
    <h5>Selesaikan Pembayaran</h5>
    <p><strong>17.18 PM</strong></p>
    <p>Selesaikan dalam 58m 46s</p>
    <p>
      <hr>
    </p>
    <div class="row">
      
    </div>
    <p class="card-text" style="font-style: fw-bold">
      <strong>OKEBUS 113432553</strong>
    </p>
    <p class="card-text">
      Rp. 79000
    </p>
    </div>

  </div>
</div>  

                            













  

<!-- Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <!-- Header Modal -->
      <div class="modal-header" style="display: flex; justify-content:center; align-items:center; font-size:5px; margin-bottom: -20px">
        <h5 class="modal-title">Harapan Indah</h5>
      </div>
      
      <!-- Konten Modal -->
      <div class="modal-body">
      <h5>Kode QR TYUX345KIJIXX78 - 2933456</h5>
        <img src="images/image.png" alt="">
      </div>
      
      <!-- Footer Modal -->
      <div class="modal-footer" style="display: flex; justify-content:center; align-items:center;">
        <button type="button" class="btn btn-secondary" id="closeButton" data-dismiss="modal">OK</button>
      </div>
      
    </div>
  </div>
</div>

        <!-- end modal -->


                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->
                    <!-- Content -->

                </div>
            <!-- / Content -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->
    <script>
  document.addEventListener("DOMContentLoaded", function() {
    // Menambahkan event listener ke tombol
    var myButton = document.getElementById("myButton");
    myButton.addEventListener("click", function() {
      // Menampilkan modal saat tombol diklik
      $('#myModal').modal('show');
    });
    
    // Menambahkan event listener ke tombol "Tutup"
    var closeButton = document.getElementById("closeButton");
    closeButton.addEventListener("click", function() {
      // Menutup modal saat tombol "Tutup" diklik
      $('#myModal').modal('hide');
    });
  });
</script>
    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>