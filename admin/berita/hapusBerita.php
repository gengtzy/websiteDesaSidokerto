<?php
require_once "../koneksi.php";

// Pastikan $_GET['id'] ada dan merupakan angka
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Gunakan mysqli_prepare untuk membuat prepared statement
    $id_bibit = $_GET['id'];
    $deleteStatement = mysqli_prepare($conn, "DELETE FROM berita WHERE id = ?");
    
    // Bind parameter dan jalankan statement
    mysqli_stmt_bind_param($deleteStatement, 'i', $id_bibit);
    mysqli_stmt_execute($deleteStatement);

    // Periksa apakah ada baris yang terpengaruh
    if (mysqli_stmt_affected_rows($deleteStatement) > 0) {
        echo "<script>alert('Data berhasil dihapus.');window.location='../berita.php';</script>";
    } else {
        echo "<script>alert('Tidak ada data yang terhapus.');window.location='berita.php';</script>";
    }

    // Tutup statement dan koneksi
    mysqli_stmt_close($deleteStatement);
} else {
    echo "<script>alert('ID tidak valid.');window.location='../berita.php';</script>";
}
?>
