<?php
session_start();
require_once '../../config/database.php';

if (!isset($_SESSION['status_login'])) { header("Location: ../../login/login.php"); exit; }

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM pengumuman WHERE id = $id");
    header("Location: ../pengumuman.php?pesan=Pengumuman berhasil dicabut!");
}
?>