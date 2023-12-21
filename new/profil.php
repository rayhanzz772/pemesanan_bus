<?php

session_start(); // Pastikan session sudah dimulai sebelum mengakses variabel session

// Mengambil nilai dari variabel session 'username'
$username = $_SESSION['username'];

  // konekan ke database
  include "koneksi.php";

  $sql = mysqli_query($koneksi, "SELECT * FROM user where username = '$username'");

  $tampil = mysqli_fetch_array($sql);

?>


<!DOCTYPE html>


<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
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

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

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
                  <div class="container-xxl flex-grow-1 container-p-y">
                  <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light">Profile</span> Page</h4>
                  <button type="button" class='btn btn-primary mb-3 ' data-toggle="modal" data-target="#insertDataModal">Tambah Data</button>

                  <div class="modal" id="insertDataModal" tabindex="-1" role="dialog" aria-labelledby="insertDataModalLabel" aria-hidden="true">
  
                    <?php  

                  include "koneksi.php";
                  $sql = mysqli_query($koneksi, "SELECT * FROM user where username = '$username'");

                  $tampil = mysqli_fetch_array($sql);


                  ?>


                    <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                  <h5 class="modal-title" id="insertDataModalLabel">Tambah Data User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <div class="modal-body">
                  <form action="tambah_data_user.php" method="POST" enctype="multipart/form-data">

                  <div class="form-group">
                      <label for="exampleInputEmail1" class="form-label">Username :</label>
                      <input name="nama" value="<?php echo $tampil['username'] ?>" disabled type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>

                  <div class="form-group">
                      <label for="exampleInputEmail1" class="form-label">Username :</label>
                      <input name="email" value="<?php echo $tampil['email'] ?>" disabled type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>

                  <div class="form-group">
                      <label for="exampleInputEmail1" class="form-label">NIK :</label>
                      <input name="nik" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>

                  <div class="form-group">
                      <label for="exampleInputEmail1" class="form-label">Telepon :</label>
                      <input name="no" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>

                  <div class="form-group">
                      <label for="exampleInputEmail1" class="form-label">Alamat :</label>
                      <input name="alamat" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>





                  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                  </form>
                  </div>
                  </div>
                  </div>
                  </div>



                  <!-- Content wrapper -->
                  <div class="content-wrapper">
                    
                  <div class="col-md">
                  <div class="card mb-3">
                    <div class="row g-0">
                      <div class="col-md-4">

                      <?php


                            // Periksa apakah nilai image_url kosong atau tidak
                            if (empty($tampil['image_url'])) {
                                // Jika image_url kosong, tampilkan metode input foto
                                ?>
                                <div style="text-align: center; margin: 70px;">
                                    <form action="upload.php" method="post" enctype="multipart/form-data">
                                        <input type="file" name="fileToUpload" id="fileToUpload">
                                        <br>
                                        <input type="submit" value="Upload Image" name="submit">
                                    </form>
                                </div>
                                <?php
                            } else {
                                // Jika image_url tidak kosong, tampilkan foto
                                ?>
                                <div style="text-align: center;">
                                    <img src="<?php echo $tampil['image_url']; ?>" style="margin: 20px;" alt="Profile Picture" width="300" height="300">
                                </div>
                                <?php
                            }
                            ?>



                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">Profile User</h5>

                          <p class="card-text">
                            Nama  : <?php echo $tampil['username'] ?>
                          </p>
                          <p class="card-text">
                            Email : <?php echo $tampil['email'] ?>
                          </p>

                          <p class="card-text">
                            <?php 
                            
                            if (empty($tampil['nik'])) {
                              echo "NIK   : -";
                              
                          } else {
                            ?>
                            <p><?php echo"NIK   : ", $tampil['nik']?></p>
                            <?php
                          }
                            
                            
                            
                            ?>
                          </p>

                          <p class="card-text">
                            <?php 
                            
                            if (empty($tampil['no'])) {
                              echo "-";
                              
                          } else {
                            ?>
                            <p><?php echo"Telepon   : ", $tampil['no']?></p>
                            <?php
                          }
                            
                            
                            
                            ?>
                          </p>

                          <p class="card-text">
                            <?php 
                            
                            if (empty($tampil['alamat'])) {
                              echo "-";
                              
                          } else {
                            ?>
                            <p><?php echo"Alamat   :  ", $tampil['alamat']?></p>
                            <?php
                          }
                            
                            
                            
                            ?>
                          </p>

                          <?php


                            // Periksa apakah nilai image_url kosong atau tidak
                            if (empty($tampil['image_url'])) {
                                // Jika image_url kosong, tampilkan metode input foto
                                
                            } else {
                              ?>
                              <div>
                                  <form action="upload.php" method="post" enctype="multipart/form-data">
                                      <input type="file" name="fileToUpload" id="fileToUpload">
                                      <br>
                                      <br>
                                      <input type="submit" value="Ubah Foto" name="submit">
                                  </form>
                              </div>
                              <?php
                            }
                            ?>



                        </div>
                      </div>
                    </div>
                  </div>
                </div>

            </div>
            <!-- / Content -->

            <!-- Footer -->

            <!-- / Footer -->

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


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>