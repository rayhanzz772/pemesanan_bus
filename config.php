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
        // Hindari langsung memasukkan variabel ke dalam string query untuk mencegah SQL injection.
        // Pastikan Anda membersihkan atau memvalidasi data sebelum menggunakannya dalam query.
        
        // Lakukan sanitasi data, misalnya dengan fungsi mysqli_real_escape_string atau menggunakan PDO dengan prepared statement.
        $user = $this->koneksi->real_escape_string($user);
        $email = $this->koneksi->real_escape_string($email);
        $password = $this->koneksi->real_escape_string($password);
        
        $image_url = '';
        $akses_id = 2; // Sesuaikan nilai akses_id sesuai kebutuhan
    
        // Buat string query dengan data yang sudah divalidasi atau disanitasi
        $query = "INSERT INTO user (username, password, akses_id, email, image_url) VALUES ('$user', '$password', '$akses_id', '$email', '$image_url')";
        
        // Eksekusi query
        if ($this->koneksi->query($query)) {
            return true; // Jika berhasil
        } else {
            return false; // Jika terjadi kesalahan
        }
    }
    


function tampil_data_bus() {
    $data = mysqli_query($this->koneksi, "SELECT *
                                          FROM nama_bus nb
                                          INNER JOIN id_bus ib ON nb.id_foto = ib.id_foto
                                          INNER JOIN kota k ON nb.id_bus = k.id_bus
                                          INNER JOIN id_kota ik ON nb.id_kota = ik.id_kota
                                          INNER JOIN gambar_bus gb ON nb.id_foto = gb.id_foto 
                                          INNER JOIN harga_bus h ON nb.id_bus = h.id_bus");

    // Periksa apakah query berhasil atau tidak
    if (!$data) {
        // Jika terdapat error, tampilkan pesan error
        die("Error: " . mysqli_error($this->koneksi));
    }

    $hasil = [];
    while ($row = mysqli_fetch_array($data)) {
        $hasil[] = $row;
    }
    return $hasil;
}


function nama_data_kota() {
    $data = mysqli_query($this->koneksi, "SELECT * FROM kota k
                                            INNER JOIN id_kota ik ON k.id_kota = ik.id_kota   
    ");
    $hasil = array();

    if ($data) {
        while ($row = mysqli_fetch_assoc($data)) {
            $hasil[] = $row;
        }
    } else {
        echo "Query failed: " . mysqli_error($this->koneksi);
    }

    return $hasil;
}



function nama_data_bus() {
    $data = mysqli_query($this->koneksi, "SELECT * FROM id_bus");
    $hasil = array();

    if ($data) {
        while ($row = mysqli_fetch_assoc($data)) {
            $hasil[] = $row;
        }
    } else {
        echo "Query failed: " . mysqli_error($this->koneksi);
    }

    return $hasil;
}
  

function edit_data_user($id, $username, $password, $email){
    mysqli_query($this->koneksi, "UPDATE user SET username = '$username', password = '$password', email = '$email' WHERE id = '$id'");
}

function hapus_data_bus($id)
{
mysqli_query($this->koneksi, "DELETE FROM nama_bus WHERE id = '$id'");
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

function tampil_data_jenis_kelamin() {
    $data = mysqli_query($this->koneksi, "SELECT * FROM jenis_kelamin");
    $hasil = array();

    if ($data) {
        while ($row = mysqli_fetch_assoc($data)) {
            $hasil[] = $row;
        }
    } else {
        echo "Query failed: " . mysqli_error($this->koneksi);
    }

    return $hasil;
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
