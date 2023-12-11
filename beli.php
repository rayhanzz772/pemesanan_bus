<?php


session_start(); // Pastikan session sudah dimulai sebelum mengakses variabel session

// Mengambil nilai dari variabel session 'username'
$username = $_SESSION['username'];

  // konekan ke database
  include "koneksi.php";
  date_default_timezone_set("Asia/Bangkok");
  $today = date("Y-m-d");
  $sql = mysqli_query($koneksi, "select * from bus where id='$_GET[id]'");
  $tampil = mysqli_fetch_array($sql);

    if(isset($_POST['hitung'])){
        date_default_timezone_set("Asia/Bangkok");
        $today = date("F j, Y, G:i "); 
        $total_bayi = 0;
        $nama    =$_POST['nama'];
        $jenis_kelamin    =$_POST['jenis_kelamin'];
        $nomor_identitas    =$_POST['nomor_identitas'];
        $no    =$_POST['no'];
        $nama_po    =$_POST['nama_po'];
        $tujuan =$_POST['tujuan'];
        $tgl    =$_POST['tgl'];
        $biaya_tiket    =$_POST['biaya_tiket'];
        $qty    =$_POST['qty'];
        $qty_bayi    =$_POST['qty_bayi'];
        if ($qty_bayi > 0) {
        $total_bayi = $qty_bayi*($biaya_tiket*0.5);
        }
            $total    =$biaya_tiket*$qty+($total_bayi);
        
        

        mysqli_query($koneksi, "INSERT IGNORE INTO penumpang
            (nama, jenis_kelamin, nomor_identitas, no_hp, nama_po, tujuan, tgl, penumpang_dewasa, penumpang_anak, harga_tiket, total, username, tgl_pesan)  VALUES 
            ('$nama','$jenis_kelamin','$nomor_identitas','$no','$nama_po','$tujuan','$tgl','$qty','$qty_bayi','$biaya_tiket','$total','$username',CURRENT_TIMESTAMP)
            ");
        header('Location: halaman_tiket.php');

        set_time_limit(0); 
        ini_set('memory_limit', '100M');

        require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => [100, 236],
    'orientation' => 'L'
]);
        
$mpdf->WriteHTML("

    <h1>Tiket Bus $nama_po</h1>
    <table border='1' cellpadding='4' cellspacing='0'>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>Jenis Kelamin</td>
                    <td>Nomor Identitas</td>
                    <td>No. HP</td>
                    <td>Nama PO Bus</td>
                    <td>Tujuan</td>
                    <td>Tanggal Berangkat</td>
                    <td>Jumlah Penumpang Dewasa</td>
                    <td>Jumlah Penumpang Bayi</td>
                    <td>Harga 1 tiket</td>
                    <td>Total Harga</td>
                </tr>
                <tr>
                    <td>$nama</td>
                    <td>$jenis_kelamin</td>
                    <td>$nomor_identitas</td>
                    <td>$no</td>
                    <td>$nama_po</td>
                    <td>$tujuan</td>
                    <td>$tgl</td>
                    <td align='center'>$qty</td>
                    <td align='center'>$qty_bayi</td>
                    <td align='right'>$biaya_tiket</td>
                    <td align='right'>$total</td>
                </tr>
            </table>
            <p>Dibeli pada : $today</p>
<p>Note : Silahkan berikan tiket bus ini kepada penjaga tiket untuk melihat jadwal keberangkatan</p>"
        );

$nama_file = 'tiket_bus_' . date('Ymd_His') . '.pdf'; // Nama file unik dengan timestamp
$path = 'tiket/' . $nama_file; // Ganti 'folder_temp' dengan nama folder Anda
$mpdf->Output($path, 'F');
$file = $path;
$fp = fopen($file, "r");

header("Cache-Control: maxage=1");
header("Pragma: public");
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=".$nama_file."");
header("Content-Description: PHP Generated Data");
header("Content-Transfer-Encoding: binary");
header('Content-Length:' . filesize($file));
ob_clean();
flush();
while (!feof($fp)) {
   $buff = fread($fp, 1024);
   print $buff;
}


exit();
}
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style-beli.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Pemesanan Tiket Bus</title>
    <script>
        function disableButton() {
            var submitButton = document.getElementById("hitungButton");
            submitButton.disabled = true; // Menonaktifkan tombol "Hitung" setelah diklik
        }
    </script>
</head>
<body>
    <section>
    <h1>Bus <?php echo $tampil['nama_po'] ?></h1>
    <h3>Form Pengisian data diri tiket</h3>
    <p>Note : Untuk penumpang dibawah 5 tahun mendapat diskon 50%</p>
    <form id="myForm" action="" method="POST"> 
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama Lengkap :</label>
    <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                  <select name="jenis_kelamin">
                        <option value="">- Pilih -</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </td>
          </tr>
              <hr />

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nomor identitas</label>
    <input name="nomor_identitas" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nomor Handphone</label>
    <input name="no" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

    <tr>
                <td><input type="hidden" name="nama_po" value="<?php echo $tampil['nama_po'] ?>"></td>
            </tr>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tanggal Berangkat</label>
    <input name="tgl" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

                <tr>
                <td><input type="hidden" name="tujuan" value="<?php echo $tampil['tujuan'] ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="biaya_tiket" value="<?php echo $tampil['biaya_tiket'] ?>"></td>
            </tr>
            <hr />
            <table>
                <tr>
                <td>Jumlah Tiket Dewasa </td>
                <td>: </td>
                <td>
                    <select name="qty">
                        <option value="">- Jumlah -</option>
                        <?php
                            for($x=1;$x<=50;$x++){
                        ?>
                        <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <br>
             <tr>
                <td>Jumlah Tiket Anak </td>
                <td>: </td>
                <td>
                    <select name="qty_bayi">
                        <option value="">- Jumlah -</option>
                        <option value="0">0</option>
                        <?php
                            for($x=1;$x<=50;$x++){
                        ?>
                        <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </td>
            </tr>
            </table>
            <br>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <input type="submit" onclick="disableButton()" name="hitung" value="Hitung">
                    <input type="reset" name="reset" value="Reset">
                </td>
            </tr>

</form>
<script>
        var form = document.getElementById("myForm");
        form.onsubmit = function() {
            disableButton(); // Menonaktifkan tombol "Hitung" setelah form terkirim
        };
    </script>
</section>
</body>
</html>

