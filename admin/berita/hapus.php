<?php
session_start();
require_once '../../config/database.php';

// Pastikan hanya admin login yang bisa menghapus
if (!isset($_SESSION['status_login'])) { header("Location: ../../login/login.php"); exit; }

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Cari nama file gambar di database lalu musnahkan dari folder uploads
    $res = $conn->query("SELECT gambar FROM berita WHERE id = $id");
    if ($res && $res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $file_path = '../../uploads/' . $row['gambar'];
        if (!empty($row['gambar']) && file_exists($file_path)) {
            unlink($file_path); 
        }
    }
    // Hapus datanya dari database
    $conn->query("DELETE FROM berita WHERE id = $id");
    header("Location: ../berita.php?pesan=Berita berhasil dimusnahkan!");
}
?>