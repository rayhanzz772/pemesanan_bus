<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BUS BUS</title>
    <style>
        /* Custom CSS bisa diletakkan di sini */
        /* Contoh:
        .table-container {
            padding: 20px;
        }
        */
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <button type="button" class="btn btn-primary"><a style="color: white; text-decoration: none;" href="halaman_pembeli.php">Pesan</a></button> <!-- Klik untuk memesan -->
            </div>
        </div>
        <div class="table-responsive mt-4">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Bus</th>
                        <th scope="col">Gambar Bus</th>
                        <th scope="col">Tujuan Bus</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Sinar Jaya</td>
                        <td><img src="img/sinar_jaya.jpg" class="img-fluid" style="max-width: 100px;" alt="Sinar Jaya"></td>
                        <td>Malang, Semarang, Cirebon</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Dewi Sri</td>
                        <td><img src="img/dewi_sri.jpeg" class="img-fluid" style="max-width: 100px;" alt="Dewi Sri"></td>
                        <td>Bandung, Yogyakarta</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Putra Remaja</td>
                        <td><img src="img/putra_remaja.png" class="img-fluid" style="max-width: 100px;" alt="Putra Remaja"></td>
                        <td>Sumedang, Cilacap</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Nusantara</td>
                        <td><img src="img/nusantara.jpg" class="img-fluid" style="max-width: 100px;" alt="Nusantara"></td>
                        <td>Banyuwangi, Surabaya</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
