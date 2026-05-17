<?php
session_start();
// Panggil koneksi utama (naik 1 folder ke config)
require_once '../config/database.php';

// Pastikan request datang dari form POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Amankan input dari SQL Injection
    $username = $conn->real_escape_string(trim($_POST['username']));
    $password = trim($_POST['password']);
    
    // Query cek user (Password dicocokkan dengan MD5 sesuai database)
    $query = "SELECT * FROM admin WHERE username = '$username' AND password = MD5('$password')";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        
        // Simpan sesi login
        $_SESSION['status_login'] = true;
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['username'] = $admin['username'];
        
        // Redirect ke dashboard admin (berdasarkan screenshot lamamu, nama filenya dasboard.php)
        header("Location: " . BASE_URL . "/admin/dashboard.php");
        exit();
    } else {
        // Jika gagal, kembalikan ke login dengan pesan error
        header("Location: " . BASE_URL . "/login/login.php?error=Username atau Password salah!");
        exit();
    }
} else {
    // Jika ada yang iseng akses file ini langsung lewat URL, tendang balik ke form login
    header("Location: " . BASE_URL . "/login/login.php");
    exit();
}
?>