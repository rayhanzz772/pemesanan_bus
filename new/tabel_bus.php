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
<style>
  /* CSS untuk bottom bar */
.bottom-bar {
    display: none; /* Sembunyikan bottom bar secara default */
    justify-content: space-around;
    align-items: center;
    background-color: #333;
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 10px 0;
}

.bottom-bar-item {
    text-align: center;
    color: #fff;
    text-decoration: none;
}

.bottom-bar-item svg {
    margin-bottom: 5px;
    font-size: 1.5em;
}

.bottom-bar-item.active {
    color: #ccc;
}

/* Media query untuk menampilkan bottom bar hanya pada layar dengan lebar kurang dari 500px */
@media (max-width: 500px) {
    .bottom-bar {
        display: flex; /* Tampilkan bottom bar */
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        justify-content: space-around;
        align-items: center;
        background-color: #333;
        padding: 10px 0;
    }
}

</style>
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
    <link rel="stylesheet" href="style.css">
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
  <!-- Navbar -->

    <div class="layout-wrapper layout-content-navbar">
      
        <div class="layout-container">
            <!-- Menu -->
        <?php include 'header.html'; ?>
            <!-- / Menu -->
            
              <!-- Layout container -->
                <div class="layout-page">
                 <!-- Navbar -->
                 
                  <!-- / Navbar -->

                  <!-- Content wrapper -->
                  
                  <div class="content-wrapper ">
                    <!-- Content -->
                    <div class="headers" style="display:flex; flex-direction:column;">
                      <div class="row1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292"/></svg>
                        <p>Alfamart Dipatiukur -> Mega Bekas...</p>
                      </div>
                      <div class="row2">
                        <p>Pilih dari 49 bus</p>
                      </div>
                      <div class="row3">
                        <div class="satu" style="border:gray 0.1px solid;">
                          <div style="">
                            <p>Titik Berangkat</p>
                            <p style="font-weight:bold;">Pilih titik berangkat</p>
                          </div>
                          <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 184l144 144 144-144"/></svg>
                          </div>
                        </div>
                        <div class="satu"  style="border:gray 0.1px solid;">
                          <div>
                            <p>Titik tiba</p>
                            <p style="font-weight:bold;">Pilih titik tiba</p>
                          </div>
                          <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 184l144 144 144-144"/></svg>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Bus /</span> Basic Bus</h4>
                        <!-- Basic Bootstrap Table -->
                        <?php foreach ($db->tampil_data_bus() as $x): ?>
                          <section id="content" style="text-decoration: none;">
    <!-- CONTENT -->
      <!-- MAIN -->
      <a href="" style="">
        <main  style="text-decoration: none;border:none;border-radius: 25px;">
          <div class="table-data" style="border:none;background-color:white;border-radius: 25px;">
            <div class="order" style="background-color:white;">
              <div class="head">
                <div class="head_left">
                  <h4><?php echo $x['nama_bus']; ?></h4>
                  <div class="quality_name">
                    <p>Premium</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                      <path
                        d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"
                        fill="#1BA0E1"
                      />
                    </svg>
                    <p>4,7/5</p>
                  </div>
                </div>
                <div class="head_right">
                  <h4><?php echo $x['harga_bus']; ?> <span>/kursi</span></h4>
                  <div class="quality_name2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                      <path
                        d="M12 5C7.031 5 2 6.546 2 9.5S7.031 14 12 14c4.97 0 10-1.546 10-4.5S16.97 5 12 5zm-5 9.938v3c1.237.299 2.605.482 4 .541v-3a21.166 21.166 0 0 1-4-.541zm6 .54v3a20.994 20.994 0 0 0 4-.541v-3a20.994 20.994 0 0 1-4 .541zm6-1.181v3c1.801-.755 3-1.857 3-3.297v-3c0 1.44-1.199 2.542-3 3.297zm-14 3v-3C3.2 13.542 2 12.439 2 11v3c0 1.439 1.2 2.542 3 3.297z"
                        fill="#D8CE3B"
                      />
                    </svg>
                    <p>Dapatkan 250 Poin</p>
                  </div>
                </div>
              </div>
              <div class="main">
                <div class="col_1">
                  <h6><?php echo $x['waktu_keberangkatan']; ?></h6>
                  <p>2 jam 30 mnt</p>
                  <h6><?php echo $x['waktu_tiba']; ?></h6>
                </div>
                <div class="col_2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                    <path fill="#1ba0e1" d="M128 26a102 102 0 1 0 102 102A102.12 102.12 0 0 0 128 26m0 192a90 90 0 1 1 90-90a90.1 90.1 0 0 1-90 90" />
                  </svg>
                  <img src="new/images/line.png" alt="" />
                  <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                    <path fill="#1ba0e1" d="M128 26a102 102 0 1 0 102 102A102.12 102.12 0 0 0 128 26m0 192a90 90 0 1 1 90-90a90.1 90.1 0 0 1-90 90" />
                  </svg>
                </div>
                <div class="col_3">
                  <p><?php echo $x['tujuan']; ?></p>
                  <p><?php echo $x['kota']; ?></p>
                </div>
                <div class="col_4"></div>
              </div>
            </div>
          </div>
        </main>
      </a>
      <!-- MAIN -->
    </section>
    
    <!-- CONTENT -->

    <script src="script.js"></script>
    <!-- Modal -->
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

  <?php endforeach; ?>
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
       <!-- Bottom Navbar -->
   <div class="p-0 navbar navbar-light bg-light border-top navbar-expand d-md-none d-lg-none d-xl-none fixed-bottom">
    <ul class="navbar-nav nav-justified w-100">
      <li class="nav-item">
        <a href="halaman_pembeli.php" class="nav-link text-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="1.6em" height="1.6em" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
  <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
</svg>  
<span class="small d-block">Beranda</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="tabel_bus.php" class="nav-link text-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
</svg>
<span class="small d-block">Cari Tiket</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="halaman_tiket.php" class="nav-link text-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16">
  <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z"/>
</svg>
<span class="small d-block">Tiket Saya</span>
        </a>
      <li class="nav-item dropup">
      <a href="profil.php" class="nav-link text-center" role="button" id="dropdownMenuProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
        <svg xmlns="http://www.w3.org/2000/svg" width="1.6em" height="1.6em" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
</svg>
<span class="small d-block">Profil</span>
        </a>
                    <!-- Dropup menu for profile -->
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuProfile">
                <a class="dropdown-item" href="#">Edit Profile</a>
                <a class="dropdown-item" href="#">Notification</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Logout</a>
            </div>
      </li>
    </ul>
</div>
  </body>
</html>