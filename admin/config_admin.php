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

    public function getBusData($id){
        $query = "SELECT nama_po, tujuan FROM bus WHERE id = '$id'";
        $result = mysqli_query($this->koneksi, $query);

        if(mysqli_num_rows($result) > 0){
            $data_bus = mysqli_fetch_assoc($result);
            return $data_bus;
        } else {
            return null;
        }
    }

    function tampil_data_bus() {
        $data = mysqli_query($this->koneksi, "SELECT *
                                              FROM nama_bus nb
                                              INNER JOIN kota k ON nb.id_bus = k.id_bus
                                              INNER JOIN gambar_bus gb ON nb.id_foto = gb.id_foto 
                                              INNER JOIN harga_bus h ON nb.id_bus = h.id_bus");
        while ($row = mysqli_fetch_array($data)) {
            $hasil[] = $row;
        }
        return $hasil;
    }
}


?>
