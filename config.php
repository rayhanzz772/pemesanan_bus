<?php

class Database {
    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "dt_bus";
    var $koneksi = "";

    function __construct() {
        $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (mysqli_connect_errno()) {
            echo "Koneksi database gagal : " . mysqli_connect_error();
        }
    }

    function tampil_data() {
        $data = mysqli_query($this->koneksi, "SELECT a.*, b.* FROM data_peminjam a INNER JOIN jenis_kelamin b ON b.kode_jk = a.jenis_kelamin");
        while ($row = mysqli_fetch_array($data)) {
            $hasil[] = $row;
        }
        return $hasil;
    }

    function login($username)
    {
    $data = mysqli_query($this->koneksi, "SELECT * FROM user WHERE username = '$username'");

    if (mysqli_num_rows($data) == 0) {
        echo "<b>Data user tidak ditemukan</b>";
        $hasil = [];
        header('location: login.php');
    } else {
        while ($row = mysqli_fetch_array($data)) {
            $hasil[] = $row;
        }
    }

    return $hasil;
    }


    function tambah_user($user, $email, $password)
{
    // Gunakan prepared statement untuk menghindari serangan SQL injection
    $stmt = $this->koneksi->prepare("INSERT INTO user (user, email, akses_id, password) VALUES (?, ?, ?, ?)");
    // Bind parameter ke query
    $akses_id = 2; // Sesuaikan nilai akses_id sesuai kebutuhan
    $stmt->bind_param("ssis", $user, $email, $akses_id, $password);

    // Eksekusi query
    $stmt->execute();
    $stmt->close();
}

function edit_data_bus($id,$nama_po, $tujuan, $biaya_tiket){
    mysqli_query($this->koneksi, "UPDATE bus SET nama_po = '$nama_po', tujuan = '$tujuan', biaya_tiket = '$biaya_tiket' WHERE id = '$id'");
}

function edit_data_user($id, $username, $password, $email){
    mysqli_query($this->koneksi, "UPDATE user SET username = '$username', password = '$password', email = '$email' WHERE id = '$id'");
}

function hapus_data_bus($id)
{
mysqli_query($this->koneksi, "DELETE FROM bus WHERE id = '$id'");
}

function hapus_data_user($id)
{
mysqli_query($this->koneksi, "DELETE FROM user WHERE id = '$id'");
}

function tambah_data_bus($nama_po, $tujuan, $biaya_tiket)
{
mysqli_query($this->koneksi, "INSERT INTO bus VALUES ('', '$nama_po', '$tujuan', '$biaya_tiket')");
}

function tambah_data_user($username, $password, $akses_id, $email)
{
mysqli_query($this->koneksi, "INSERT INTO user VALUES ('', '$username', '$password', '$akses_id', '$email')");
}

    // function tampil_data_jenis_kelamin() {
    //     $data_jenis_kelamin = mysqli_query($this->koneksi, "SELECT * FROM jenis_kelamin");
    //     while ($row_jenis_kelamin = mysqli_fetch_array($data_jenis_kelamin)) {
    //         $hasil_jenis_kelamin[] = $row_jenis_kelamin;
    //     }
    //     return $hasil_jenis_kelamin;
    // }

    // function tambah_data_peminjam($kode_peminjam, $nama_peminjam, $jenis_kelamin, $tanggal_lahir, $alamat, $pekerjaan) {
    //     mysqli_query($this->koneksi, "INSERT INTO data_peminjam (id, kode_peminjam, nama_peminjam, jenis_kelamin, tanggal_lahir, alamat, pekerjaan)
    //     VALUES ('', '$kode_peminjam', '$nama_peminjam', '$jenis_kelamin', '$tanggal_lahir', '$alamat', '$pekerjaan')");
    // }

    // function kode_peminjam($kode_peminjam){
    //     $data_peminjam = mysqli_query($this->koneksi, "SELECT a.*, b.* FROM data_peminjam a
    //     INNER JOIN jenis_kelamin b ON b.kode_jk = a.jenis_kelamin
    //     WHERE a.kode_peminjam='$kode_peminjam'");
        
    //     while($row_peminjam = mysqli_fetch_assoc($data_peminjam)){
    //         $hasil_peminjam[] = $row_peminjam;
    // }
    // return $hasil_peminjam;
    // }

    // function edit_data_peminjam($kode_peminjam, $nama_peminjam, $jenis_kelamin, $tanggal_lahir, $alamat, $pekerjaan){
    //     mysqli_query($this->koneksi, "UPDATE data_peminjam SET nama_peminjam = '$nama_peminjam', jenis_kelamin = '$jenis_kelamin', tanggal_lahir = '$tanggal_lahir', alamat = '$alamat', pekerjaan = '$pekerjaan' WHERE kode_peminjam = '$kode_peminjam'");
    // }

    // function hapus_data_peminjam($kode_peminjam)
    // {
    // mysqli_query($this->koneksi, "DELETE FROM data_peminjam WHERE kode_peminjam = '$kode_peminjam'");
    // }

    // function tambah_data_jenis_buku($kode_jenis_buku, $nama_jenis_buku)
    // {
    // mysqli_query($this->koneksi, "INSERT INTO data_jenis_buku VALUES ('', '$kode_jenis_buku', '$nama_jenis_buku')");
    // }

    // function tampil_data_jenis_buku()
    // {
    // $data = mysqli_query($this->koneksi, "SELECT * FROM data_jenis_buku");
    // while ($row = mysqli_fetch_array($data)) {
    //     $hasil[] = $row;
    // }
    // return $hasil;
    // }

    // function tambah_data_penerbit($kode_penerbit, $nama_penerbit)
    // {
    // mysqli_query($this->koneksi, "INSERT INTO data_penerbit VALUES ('', '$kode_penerbit', '$nama_penerbit')");
    // }

    // function tampil_data_penerbit()
    // {
    // $data = mysqli_query($this->koneksi, "SELECT * FROM data_penerbit");
    // while ($row = mysqli_fetch_array($data)) {
    //     $hasil[] = $row;
    // }
    // return $hasil;
    // }
    // function tambah_data_pengarang($kode_pengarang, $nama_pengarang)
    // {
    // mysqli_query($this->koneksi, "insert into data_pengarang values ('','$kode_pengarang', '$nama_pengarang')");
    // }

    // function tampil_data_pengarang()
    // {
    // $data = mysqli_query($this->koneksi, "select * from data_pengarang");
    // while ($row = mysqli_fetch_array($data)) {
    //     $hasil[] = $row;
    // }
    // return $hasil;
    // }
    // public function ambil_data_pengarang()
    // {
    //     $data_pengarang = mysqli_query($this->koneksi, "SELECT * FROM data_pengarang");
    //     while($row_data_pengarang = mysqli_fetch_array($data_pengarang))
    //     {
    //         $hasil_data_pengarang[] = $row_data_pengarang;
    //     }
    //     return $hasil_data_pengarang;
    // }

    // public function ambil_data_jenis_buku()
    // {
    //     $data_jenis_buku = mysqli_query($this->koneksi, "SELECT * FROM data_jenis_buku");
    //     while($row_data_jenis_buku = mysqli_fetch_array($data_jenis_buku))
    //     {
    //         $hasil_data_jenis_buku[] = $row_data_jenis_buku;
    //     }
    //     return $hasil_data_jenis_buku;
    // }

    // public function ambil_data_penerbit()
    // {
    //     $data_penerbit = mysqli_query($this->koneksi, "SELECT * FROM data_penerbit");
    //     while($row_data_penerbit = mysqli_fetch_array($data_penerbit))
    //     {
    //         $hasil_data_penerbit[] = $row_data_penerbit;
    //     }
    //     return $hasil_data_penerbit;
    // }

    // public function tambah_data_buku($kode_buku, $judul_buku, $kode_pengarang, $kode_jenis_buku, $kode_penerbit, $isbn, $tahun, $deskripsi, $jumlah)
    // {
    //     mysqli_query($this->koneksi, "INSERT INTO data_buku VALUES ('', '$kode_buku', '$judul_buku', '$kode_pengarang', '$kode_jenis_buku', '$kode_penerbit', '$isbn', '$tahun', '$deskripsi', '$jumlah')");
    // }

    // public function tampil_data_buku()
    // {
    //     $data = mysqli_query($this->koneksi, "SELECT a.*, b.*, c.*, d.* FROM data_buku a
    //     INNER JOIN data_pengarang b ON b.kode_pengarang = a.kode_pengarang
    //     INNER JOIN data_jenis_buku c ON c.kode_jenis_buku = a.kode_jenis_buku
    //     INNER JOIN data_penerbit d ON d.kode_penerbit = a.kode_penerbit");
    //     while($row = mysqli_fetch_array($data))
    //     {
    //         $hasil[] = $row;
    //     }
    //     return $hasil;
    // }
}
    

?>
