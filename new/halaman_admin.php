<?php
session_start();

$username = $_SESSION['username'];

include "config.php";
$db = new Database();

foreach ($db->login($username) as $x) {
    $akses_id = $x['akses_id'];

    if ($akses_id == '1') {
        ?>
        <!doctype html>
        <html lang="en">

        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <!-- Bootstrap CSS -->
            <title>Sewa Buku</title>
        </head>

        <body>
        <!-- Your HTML content goes here -->

        <?php include "menu_admin.html"; ?>

        </body>

        </html>
        <?php
    } else {
        echo "Anda belum login";
        header("Location: login.php");
    }
}
?>
