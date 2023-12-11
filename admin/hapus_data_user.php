<?php
include('../config.php');
$db = new Database();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $db->hapus_data_user($id);
    header('location: list_user.php');
} else {
    header('Location: list_user.php');
}
?>
