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
}


?>
