<?php

include 'config.php';
$db = new database();


session_start(); // Pastikan session sudah dimulai sebelum mengakses variabel session

// Mengambil nilai dari variabel session 'username'
$username = $_SESSION['username'];

  // konekan ke database
  include "koneksi.php";
  date_default_timezone_set("Asia/Bangkok");
  $today = date("Y-m-d");

  $id = $_POST['id'];


$sql = mysqli_query($koneksi, "SELECT * FROM nama_bus 
                               INNER JOIN harga_bus ON nama_bus.id_bus = harga_bus.id_bus 
                               INNER JOIN id_kota ON nama_bus.id_kota = id_kota.id_kota 
                               INNER JOIN id_bus ON nama_bus.id_foto = id_bus.id_foto 
                               WHERE nama_bus.id_bus = '$id'");

  $tampil = mysqli_fetch_array($sql);

  $sql_harga = mysqli_query($koneksi, "select * from harga_bus where id='$id'");
  $tampil_harga = mysqli_fetch_array($sql_harga);

  $sql_kota = mysqli_query($koneksi, "select * from kota where id='$id'");
  $tampil_kota = mysqli_fetch_array($sql_kota);

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
        $biaya_tiket    =intval($_POST['biaya_tiket']);
        $qty    =intval($_POST['qty']);
        $qty_bayi    =intval($_POST['qty_bayi']);
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