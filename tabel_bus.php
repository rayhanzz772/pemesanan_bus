<?php  

	include "koneksi.php";
  $result = mysqli_query($koneksi, "select * from bus");

	
?>
<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style-harga.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BUS BUS</title>
  <!-- Sertakan jQuery -->


<!-- Sertakan DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

</head>
<body>
<?php include "menu_pembeli.html"; ?>
<h2>List harga bus</h2>

	<div class="table-container">
			<table class="styled-table" style="margin-top: 18px;" id="myTable">
  <thead>
    <tr class="table">
      <th scope="col" style="text-align: center;">#</th>
      <th scope="col">Nama PO</th>
      <th scope="col">Tujuan</th>
      <th scope="col">Biaya Tiket</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    <?php  
          // konek ke database
          include "koneksi.php";
          $no = 1;          
          while ($tampil = mysqli_fetch_array($result)) {
          echo "
          
        <tr>
          <td style='text-align: center;'>$no</td>
          <td>$tampil[nama_po]</td>
          <td>$tampil[tujuan]</td>
          <td>$tampil[biaya_tiket]</td>
          <td><a href='beli.php?id=$tampil[id]'target=_blank' class='btn btn-primary'>Beli</a></td>
        </tr>
          ";  
          $no++;
            } 
          ?>
  </tbody>
</table>
</div>
</body>
</html>