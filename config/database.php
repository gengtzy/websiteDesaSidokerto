<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "desa"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Konfigurasi URL Utama (Agar CSS & Link tidak bocor/rusak)
define('BASE_URL', 'http://localhost/sidokerto');
?>