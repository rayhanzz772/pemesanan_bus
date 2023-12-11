<?php

include '../koneksi.php';
$result = mysqli_query($koneksi, "select * from penumpang");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Sertakan DataTables -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        /* CSS untuk melebarkan tabel dan konten */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 p-0"> <!-- Kolom untuk sidebar -->
                <!-- Sidebar -->
                        <?php include "sidebar.php" ?>
            </div>
            <div class="col-md-9"> <!-- Kolom untuk card (tabel) -->
                <!-- Card untuk menampilkan tabel -->
                <div class="card">
                    <div class="card-header">
                        Data Penumpang
                    </div>
                    <div class="card-body">
                        <table class="table" id="myTable">
                        <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">No Hp</th>
                                    <th scope="col">Nama PO</th>
                                    <th scope="col">Tujuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                $no = 1;          
                                while ($tampil = mysqli_fetch_array($result)) {
                                    echo "
                                    <tr>
                                        <td style='text-align: center;'>$no</td>
                                        <td>$tampil[nama]</td>
                                        <td>$tampil[no_hp]</td>
                                        <td>$tampil[nama_po]</td>
                                        <td>$tampil[tujuan]</td>
                                    </tr>
                                    ";  
                                    $no++;
                                } 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sertakan JavaScript Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>