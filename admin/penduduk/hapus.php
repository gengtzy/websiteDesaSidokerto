<?php
session_start();
require_once '../../config/database.php';

if (!isset($_SESSION['status_login'])) { header("Location: ../../login/login.php"); exit; }

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    // Cukup eksekusi delete, karena penduduk tidak punya file gambar yang harus dihapus
    $conn->query("DELETE FROM penduduk WHERE id = $id");
    header("Location: ../datapenduduk.php?pesan=Data wilayah berhasil dihapus!");
}
?>