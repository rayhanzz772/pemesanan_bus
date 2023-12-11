<?php
include('../config.php');
$db = new Database();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $db->hapus_data_bus($id);
    header('location: semua_bus.php');
} else {
    header('Location: semua_bus.php');
}
?>
