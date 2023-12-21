<?php
include "config.php";
$db = new Database();
$username = $_POST['username'];
$password = $_POST['password'];

foreach ($db->login($username, $password) as $x) {
    session_start();
    $_SESSION["username"] = $username;
    $_SESSION["password"] = $x['password'];
    $akses_id = $x['akses_id'];
    $pass = $x['password'];

    // Memeriksa user login sebagai admin atau peminjam
    if (($akses_id == '1') && ($password == $pass)) {
        header('Location: admin/index.php');
    } elseif (($akses_id == '2') && ($password == $pass)) {
        header('Location: new/halaman_pembeli.php');
    } else {
        header('Location: login.php');
    }
}




?>
