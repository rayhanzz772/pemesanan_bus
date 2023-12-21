
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Cards</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="tabel_css.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "sidebar.php";?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include "topbar.php";?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">SEMUA BUS</h1>
                    </div>

                    <div class="row">
                    <div class="card shadow mb-4 w-100">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="thead-light">
                                    <!-- set table header  -->
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Bus</th>
                                        <th scope="col">ID Bus</th>
                                        <th scope="col">Tujuan</th>
                                        <th scope="col">Harga Tiket</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    include '../config.php';
                                    $db = new Database();

                                    
                                    
                    $no = 1;
                    foreach ($db->tampil_data_bus() as $x) {
                        
                        ?>
                        
                                    <tr>
                                        <!-- menampilkan data dengan menggunakan array  -->
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $x['nama_bus']; ?></td>
                                        <td><?php echo $x['id_bus']; ?></td>
                                        <td><?php echo $x['kota']; ?></td>
                                        <td><?php echo $x['harga_bus']; ?></td>
                                        <td>        
                                            <!-- membuat tombol dengan ukuran small berwarna biru  -->
                                            <!-- data-target setiap modal harus berbeda, karena akan menampilkan data yang berbeda pula
                                            caranya membedakannya, gunakan id sebagai pembeda data-target di setiap modal -->
                                            <a href="" class="btn btn-sm btn-info" data-toggle="modal"
                                                data-target="#modal<?php echo $x['id']; ?>">Edit</a> | 
                                            
                                                <a class="btn btn-sm btn-danger" href='hapus_data_bus.php?id=<?php echo $x["id_bus"]; ?>'
                                                 onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                                



                                            <!-- Modal Konfirmasi -->
                                            <div class="modal fade" id="modal_delete_<?php echo $x['id_bus']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalDeleteLabel">Konfirmasi Penghapusan</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Apakah Anda yakin ingin menghapus data ini?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <button type="button" class="btn btn-danger" id="hapusData">Hapus</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            
                                                




                                                        
                                            <!-- untuk melihat bentuk-bentuk modal kalian bisa mengunjungi laman bootstrap dan cari modal di kotak pencariannya -->
                                            <!-- id setiap modal juga harus berbeda, cara membedakannya dengan menggunakan id -->
                                            <div class="modal fade" id="modal<?php echo $x['id']; ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit bis</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <!-- di dalam modal-body terdapat 4 form input yang berisi data.
                                                        data-data tersebut ditampilkan sama seperti menampilkan data pada tabel. -->
                                                        <div class="modal-body">
                                                            <form action="simpan_edit_data_bus.php" method="POST" enctype="multipart/form-data">
                                                            <input type="hidden" name="id" value="<?php echo $x['id']; ?>"/>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Nama Bus</label>
                                                                    <input type="text" name="bus" class="form-control"
                                                                        value="<?php echo $x['nama_bus']; ?>">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1"> Bus</label>
                                                                    <input type="text" name="id_bus" class="form-control"
                                                                        value="<?php echo $x['id_bus']; ?>">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Tujuan</label>
                                                                    
                                                                    <select name="kota">

                                                                        <option value="--"></option>
                                                                        <?php
                                                                        foreach ($db->nama_data_kota() as $x) {
                                                                            echo '<option value="' . $x['id_kota'] . '">' . $x['kota'] . '</option>';
                                                                        }
                                                                        ?>
                                                                    </select>

                                                                    
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Biaya Tiket</label>
                                                                    <input type="text" class="form-control" name="harga_bus"
                                                                        value="">
                                                                </div>
                                                                <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                                        
                    </div>

                    <div class="row">
                    <!-- KONTEN 2 -->
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; OKEBUS</span>
                    </div>
                </div>
            </footer>
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

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script>
    $(document).ready(function() {
        // Pastikan tombol "Hapus" dengan kelas confirm-delete memiliki event listener
        $('.confirm-delete').on('click', function() {
            // Tampilkan modal konfirmasi
            $('#konfirmasiHapus').modal('show');
        });

        // Pastikan tombol "Hapus" di dalam modal konfirmasi memiliki event listener
        $('#hapusData').on('click', function() {
            // Lakukan tindakan penghapusan di sini
            console.log('Tombol "Hapus" di dalam modal konfirmasi diklik.'); // Cek apakah ini ditampilkan di konsol browser
        });
    });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Fungsi untuk menampilkan modal saat halaman dimuat
    $('#myModal').modal('show');
  });
</script>

</body>

</html>