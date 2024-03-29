


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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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

                  <!-- Content wrapper -->
                  <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Bus /</span> Basic Bus</h4>

                        <!-- Basic Bootstrap Table -->
                        <div class="card">
                            <h5 class="card-header">List Bus</h5>
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Bus</th>
                                        <th scope="col">ID Bus</th>
                                        <th scope="col">Tujuan Bus</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        
                                        <?php
                                            $no = 1;
                                            foreach ($db->tampil_data_bus() as $x) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $x['nama_bus']; ?></td>
                                                    <td><?php echo $x['id_bus']; ?></td>
                                                    <td><?php echo $x['kota']; ?></td>
                                                    <td><?php echo $x['harga_bus']; ?></td>
                                                    <td>
                                                    <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#insertDataModal<?php echo $x['id_bus']; ?>">Beli</a>

                                                    <!-- <button type="button" class='btn btn-primary' data-toggle="modal" data-target="#insertDataModal">Beli</button> -->
                                                  
                                                  </td>

                                                  <?php  

        include "koneksi.php";
        $result = mysqli_query($koneksi, "select * from nama_bus");


        $id = $x['id_bus'];

        $sql = mysqli_query($koneksi, "SELECT * FROM nama_bus 
        INNER JOIN harga_bus ON nama_bus.id_bus = harga_bus.id_bus 
        INNER JOIN id_kota ON nama_bus.id_kota = id_kota.id_kota 
        INNER JOIN id_bus ON nama_bus.id_foto = id_bus.id_foto 
        WHERE nama_bus.id_bus = '$id'");

        $tampil = mysqli_fetch_array($sql);


        ?>
  

                                                  

                                                  <div class="modal" id="insertDataModal<?php echo $x['id_bus']; ?>" tabindex="-1" role="dialog" aria-labelledby="insertDataModalLabel" aria-hidden="true">
  
  
                                                    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="insertDataModalLabel">Tambah Data Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="beli.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $x['id_bus']; ?>">
          <div class="form-group">
            <label for="exampleInputEmail1" class="form-label">Nama Lengkap :</label>
            <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>

          <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select name="jenis_kelamin" class="form-control">
              <option value="--"></option>
              <?php
              foreach ($db->tampil_data_jenis_kelamin() as $x) {
                echo '<option value="' . $x['kode_jk'] . '">' . $x['keterangan_jk'] . '</option>';
              }
              ?>
            </select>
          </div>


          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nomor identitas</label>
            <input name="nomor_identitas" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nomor Handphone</label>
            <input name="no" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          


                <input type="hidden" name="nama_po" value="<?php echo $tampil['nama_bus'] ?>">
           

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Tanggal Berangkat</label>
              <input name="tgl" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>


                
                <input type="hidden" name="tujuan" value="<?php echo $tampil['kota']; ?>">
                
           


                
                    <input type="hidden" name="biaya_tiket" value="<?php echo $tampil['harga_bus']; ?>">

                    <div class="form-group">
                        <label for="qty">Jumlah Tiket Dewasa</label>
                        <select name="qty" class="form-control">
                            <option value="">- Jumlah -</option>
                            <?php
                            for ($x = 1; $x <= 10; $x++) {
                                echo '<option value="' . $x . '">' . $x . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="qty_bayi">Jumlah Tiket Anak</label>
                        <select name="qty_bayi" class="form-control">
                            <option value="">- Jumlah -</option>
                            <option value="0">0</option>
                            <?php
                            for ($x = 1; $x <= 10; $x++) {
                                echo '<option value="' . $x . '">' . $x . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                
           

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="hitung" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

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
              <!--/ Basic Bootstrap Table -->

            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                                                    </div>
                                                    <div>
                                                        <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                                                        <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                                                        <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/" target="_blank" class="footer-link me-4">Documentation</a
                  >

                  <a
                    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                    target="_blank"
                    class="footer-link me-4"
                    >Support</a
                  >
                </div>
              </div>
            </footer>
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
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>
    <script>
  document.addEventListener("DOMContentLoaded", function() {
    // Fungsi untuk menampilkan modal saat halaman dimuat
    $('#myModal').modal('show');
  });
</script>
    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>