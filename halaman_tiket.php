<?php  
session_start(); // Pastikan session sudah dimulai sebelum mengakses variabel session

// Mengambil nilai dari variabel session 'user'
$user = $_SESSION['username'];
include "koneksi.php";
$result = mysqli_query($koneksi, "SELECT * FROM penumpang WHERE username = '$user'");

	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style-harga.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BUS BUS</title>
</head>
<body>
<?php include "menu_pembeli.html"; ?>
    <h2>List Tiket Saya</h2>
    <div class="table-container">
  <table class="styled-table" style="margin-top: 18px;">
  <thead>
    <tr class="table">
      <th scope="col" style="text-align: center;">#</th>
      <th scope="col">Nama</th>
      <th scope="col">NIK</th>
      <th scope="col">No Hp</th>
      <th scope="col">Nama Bis</th>
      <th scope="col">Tujuan</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Jml tikt dws</th>
      <th scope="col">Jml tiket anak</th>
      <th scope="col">total</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    <?php  

if (mysqli_num_rows($result) === 1) {
    echo "<p>Tiket kosong</p>";
}else{

          // konek ke database
          include "koneksi.php";
          $id = 1;          
          while ($tampil = mysqli_fetch_array($result)) {
          echo "
          
        <tr>
          <td>$id</td>
          <td>$tampil[nama]</td>
          <td>$tampil[nomor_identitas]</td>
          <td>$tampil[no_hp]</td>
          <td>$tampil[nama_po]</td>
          <td>$tampil[tujuan]</td>
          <td>$tampil[tgl]</td>
          <td>$tampil[penumpang_dewasa]</td>
          <td>$tampil[penumpang_anak]</td>
          <td>$tampil[total]</td>
          <td><a href='direct_pdf.php?id=$tampil[id]'target=_blank' class='btn btn-primary'>Cetak</a></td>
        </tr>
          ";  
          $id++;
            } 
        }
          ?>
  </tbody>
</table>
</div>
</body>
</html>