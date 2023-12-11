

<!DOCTYPE html>
            <html lang="en">
            
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                <!-- import bootstrap  -->
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
                    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
            </head>
            
            <body>
                <br>
                <!-- membuat container dengan lebar colomn col-lg-10  -->
                <div class="container col-lg-10">
                    <!-- membuat tulisan alert berwarna hijau dengan tulisan di tengah  -->
                    <h3 class="alert alert-success text-center" role="alert">
                        Tutorial Modal Edit Data Dinamis
                    </h3>
                    <br>
                    <!-- membuat card untuk membungkus tabel bootstrap  -->
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-dark">
                                    <!-- set table header  -->
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Deskripsi Barang</th>
                                        <th scope="col">Jenis Barang</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        // membuat koneksi ke database 
                                        $koneksi = mysqli_connect("localhost", "root", "", "dt_bus");
            
                                        //membuat variabel angka
                                        $no = 1;
            
                                        //mengambil data dari tabel barang
                                        $select         = mysqli_query($koneksi, "select * from bus bus WHERE nama_po = 'Sinar Jaya'");
            
                                        //melooping(perulangan) dengan menggunakan while
                                        while($data= mysqli_fetch_array($select)){
                                    ?>
                                    <tr>
            
                                        <!-- menampilkan data dengan menggunakan array  -->
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['nama_po']; ?></td>
                                        <td><?php echo $data['tujuan']; ?></td>
                                        <td><?php echo $data['biaya_tiket']; ?></td>
                                        <td>
            
                                            <!-- membuat tombol dengan ukuran small berwarna biru  -->
                                            <!-- data-target setiap modal harus berbeda, karena akan menampilkan data yang berbeda pula
                                            caranya membedakannya, gunakan id sebagai pembeda data-target di setiap modal -->
                                            <a href="" class="btn btn-sm btn-info" data-toggle="modal"
                                                data-target="#modal<?php echo $data['id']; ?>">Edit</a>
            
                                            <!-- untuk melihat bentuk-bentuk modal kalian bisa mengunjungi laman bootstrap dan cari modal di kotak pencariannya -->
                                            <!-- id setiap modal juga harus berbeda, cara membedakannya dengan menggunakan id -->
                                            <div class="modal fade" id="modal<?php echo $data['id']; ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <!-- di dalam modal-body terdapat 4 form input yang berisi data.
                        data-data tersebut ditampilkan sama seperti menampilkan data pada tabel. -->
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Nama Barang</label>
                                                                    <input type="text" class="form-control"
                                                                        value="<?php echo $data['nama_po']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlTextarea1">Deskripsi
                                                                        Barang</label>
                                                                    <textarea class="form-control"
                                                                        rows="5"><?php echo $data['tujuan']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Jenis Barang</label>
                                                                    <input type="text" class="form-control"
                                                                        value="<?php echo $data['biaya_tiket']; ?>">
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary">Save changes</button>
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
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
                </script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
                </script>
            </body>
            
            </html>
            