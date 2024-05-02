<!-- table disini -->
<div class="row">
  <?php foreach ($db->tampil_data_bus() as $x): ?>
    <div class="col-md-4 mb-4">
      <div class="card">
        <div class="card-header">
          <?php echo $x['nama_bus']; ?>
        </div>
        <div class="card-body">
          <h5 class="card-title">ID Bus: <?php echo $x['id_bus']; ?></h5>
          <p class="card-text">Tujuan Bus: <?php echo $x['kota']; ?></p>
          <p class="card-text">Harga: <?php echo $x['harga_bus']; ?></p>
          <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#insertDataModal<?php echo $x['id_bus']; ?>">Beli</a>
        </div>
      </div>
    </div>

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
  
</div>