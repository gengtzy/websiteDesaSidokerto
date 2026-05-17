<?php
session_start();

// 1. KEAMANAN: Cek apakah user sudah login. Jika belum, tendang ke halaman login!
require_once __DIR__ . '/../../config/database.php'; // Panggil koneksi utama

if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true) {
    header("Location: " . BASE_URL . "/login/login.php?error=Akses ditolak! Silakan login terlebih dahulu.");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Desa Sidokerto</title>
    
    <!-- Bootstrap 5 & Google Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome untuk Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* Variabel Warna Global Monokromatik Hijau */
        :root {
            --g-900: #064e3b;
            --g-700: #047857;
            --g-500: #10b981;
            --g-100: #d1fae5;
            --g-50:  #ecfdf5;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--g-50);
            color: var(--g-900);
            overflow-x: hidden;
        }

        /* Layout Admin */
        #wrapper { display: flex; width: 100vw; height: 100vh; }
        
        /* Sidebar Styles (Flat Design) */
        #sidebar {
            width: 260px;
            background-color: var(--g-900);
            color: #ffffff;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            border-right: 4px solid var(--g-700);
        }

        .sidebar-brand {
            padding: 1.5rem 1rem;
            text-align: center;
            border-bottom: 2px solid var(--g-700);
            background-color: #022c22;
        }

        .sidebar-nav {
            list-style: none;
            padding: 0;
            margin: 0;
            flex-grow: 1;
        }

        .sidebar-link {
            display: block;
            padding: 1rem 1.5rem;
            color: var(--g-100);
            text-decoration: none;
            font-weight: 600;
            border-bottom: 1px solid var(--g-700);
            transition: all 0.2s ease;
        }

        .sidebar-link:hover, .sidebar-link.active {
            background-color: var(--g-700);
            color: #ffffff;
            border-left: 5px solid var(--g-500);
            padding-left: calc(1.5rem - 5px); /* Menyesuaikan border agar teks tidak goyang */
        }

        .sidebar-link i { margin-right: 10px; width: 20px; text-align: center; }

        /* Main Content Styles */
        #content-wrapper {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        .topbar {
            background-color: #ffffff;
            padding: 1rem 2rem;
            border-bottom: 2px solid var(--g-100);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .flat-card {
            background-color: #ffffff;
            border: 2px solid var(--g-100);
            border-radius: 0;
            border-top: 5px solid var(--g-700);
            box-shadow: none;
            transition: transform 0.2s;
        }
        .flat-card:hover { transform: translateY(-3px); border-color: var(--g-500); }
    </style>
</head>
<body>

<div id="wrapper">
    <!-- SIDEBAR -->
    <nav id="sidebar">
        <div class="sidebar-brand">
            <h4 class="text-uppercase fw-bold mb-0" style="letter-spacing: 2px; color: var(--g-500);">Admin Panel</h4>
            <small style="color: var(--g-100);">Desa Sidokerto</small>
        </div>
        <ul class="sidebar-nav mt-3">
            <?php $current_page = basename($_SERVER['PHP_SELF']); ?>
            
            <li>
                <!-- Gunakan BASE_URL agar link anti-nyasar dari folder manapun -->
                <a href="<?= BASE_URL ?>/admin/dashboard.php" class="sidebar-link <?= ($current_page == 'dashboard.php') ? 'active' : ''; ?>">
                    <i class="fa-solid fa-gauge-high"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>/admin/berita.php" class="sidebar-link <?= ($current_page == 'berita.php' || strpos($_SERVER['REQUEST_URI'], '/admin/berita/') !== false) ? 'active' : ''; ?>">
                    <i class="fa-regular fa-newspaper"></i> Kelola Berita
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>/admin/pemerintah.php" class="sidebar-link <?= ($current_page == 'pemerintah.php' || strpos($_SERVER['REQUEST_URI'], '/admin/pemerintahan/') !== false) ? 'active' : ''; ?>">
                    <i class="fa-solid fa-sitemap"></i> Pemerintahan
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>/admin/datapenduduk.php" class="sidebar-link <?= ($current_page == 'datapenduduk.php' || strpos($_SERVER['REQUEST_URI'], '/admin/penduduk/') !== false) ? 'active' : ''; ?>">
                    <i class="fa-solid fa-users"></i> Data Penduduk
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>/admin/pengumuman.php" class="sidebar-link <?= ($current_page == 'pengumuman.php' || strpos($_SERVER['REQUEST_URI'], '/admin/pengumuman/') !== false) ? 'active' : ''; ?>">
                    <i class="fa-solid fa-bullhorn"></i> Pengumuman
                </a>
            </li>
            <li class="mt-auto">
                <a href="<?= BASE_URL ?>/admin/logout.php" class="sidebar-link text-danger" style="border-top: 2px solid var(--g-700); border-bottom: none;" onclick="return confirm('Yakin ingin keluar?');">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                </a>
            </li>
        </ul>
    </nav>

    <!-- KONTEN UTAMA -->
    <div id="content-wrapper">
        <!-- TOPBAR -->
        <header class="topbar">
            <h5 class="mb-0 fw-bold text-uppercase" style="color: var(--g-900);">
                <?php 
                    // Judul dinamis berdasarkan halaman
                    if($current_page == 'dashboard.php') echo 'Dashboard Utama';
                    elseif($current_page == 'berita.php') echo 'Manajemen Berita';
                    elseif($current_page == 'pemerintah.php') echo 'Aparatur Desa';
                    elseif($current_page == 'datapenduduk.php') echo 'Statistik Penduduk';
                    else echo 'Halaman Admin';
                ?>
            </h5>
            <div class="d-flex align-items-center">
                <span class="me-3 fw-semibold" style="color: var(--g-700);">Halo, <?= htmlspecialchars($_SESSION['username']); ?>!</span>
                <i class="fa-solid fa-circle-user fa-2x" style="color: var(--g-500);"></i>
            </div>
        </header>
        
        <!-- MULAI AREA KONTEN (Ditutup di footer.php) -->
        <main class="p-4">