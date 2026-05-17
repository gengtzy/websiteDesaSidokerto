<?php
session_start();
require_once '../../config/database.php';
if (!isset($_SESSION['status_login'])) { header("Location: ../../login/login.php"); exit; }

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $res = $conn->query("SELECT gambar FROM pemerintahan WHERE id = $id");
    if ($res && $res->num_rows > 0) {
        $row = $res->fetch_assoc();
        if (!empty($row['gambar']) && file_exists('../../uploads/' . $row['gambar'])) {
            unlink('../../uploads/' . $row['gambar']); 
        }
    }
    $conn->query("DELETE FROM pemerintahan WHERE id = $id");
    header("Location: ../pemerintah.php?pesan=Data pejabat berhasil diturunkan!");
}
?>