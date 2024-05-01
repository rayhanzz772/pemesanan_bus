<?php 
session_start(); // Pastikan session sudah dimulai sebelum mengakses variabel session

// Mengambil nilai dari variabel session 'username'
$username = $_SESSION['username'];

// konekan ke database
include "koneksi.php";
$sql = mysqli_query($koneksi, "select * from penumpang where id='$_GET[id]'");
$data_penumpang = mysqli_fetch_array($sql);

$nama = $data_penumpang['nama']; // Contoh pengambilan data nama
$jenis_kelamin = $data_penumpang['jenis_kelamin'];
$nomor_identitas = $data_penumpang['nomor_identitas'];
$no = $data_penumpang['no_hp'];
$nama_po = $data_penumpang['nama_po'];
$tujuan = $data_penumpang['tujuan'];
$tgl = $data_penumpang['tgl'];
$qty = $data_penumpang['penumpang_dewasa'];
$qty_bayi = $data_penumpang['penumpang_anak'];
$biaya_tiket = $data_penumpang['harga_tiket'];
$total = $data_penumpang['total'];

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => [100, 236],
    'orientation' => 'L'
]);


$mpdf->WriteHTML("

    <h1>Tiket Bus $nama_po</h1> <img src='images/image.png' alt=''>
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
exit;

?>