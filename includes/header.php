<?php
require_once __DIR__ . '/../config/database.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Desa Sidokerto</title>
    
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/cssdesa.css">
    
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- CSS Variabel Global & Flat Design (Diletakkan di header agar berlaku di semua halaman) -->
    <style>
        :root {
            --g-900: #064e3b; /* Hijau Utama */
            --g-700: #047857; /* Hijau Gelap */
            --g-500: #10b981; /* Hijau Terang / Aksen */
            --g-100: #d1fae5; /* Hijau Pucat */
            --g-50:  #ecfdf5; /* Background */
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--g-50);
            color: var(--g-900);
        }

        /* Gaya Tombol Flat Global */
        .btn-mono {
            background-color: var(--g-700);
            color: #ffffff;
            border-radius: 0;
            border: 1px solid var(--g-900);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.2s ease-in-out;
        }
        .btn-mono:hover {
            background-color: var(--g-900);
            color: var(--g-100);
        }

        /* Hover efek pada menu navbar */
        .nav-link {
            transition: color 0.2s;
        }
        .nav-link:hover {
            color: var(--g-500) !important;
        }
    </style>
</head>
<body>

    <!-- NAVBAR BOOTSTRAP MODERN -->
    <nav class="navbar navbar-expand-lg sticky-top shadow-sm" style="background-color: #ffffff; border-bottom: 3px solid var(--g-700);">
        <div class="container">
            <!-- Brand Logo & Text -->
            <a class="navbar-brand d-flex align-items-center" href="<?= BASE_URL ?>/index.php">
                <img src="<?= BASE_URL ?>/assets/img/sidoarjo.png" alt="Logo Sidoarjo" height="50" class="me-2">
                <div class="d-flex flex-column justify-content-center" style="line-height: 1.2;">
                    <span class="fw-bold text-uppercase mb-0" style="color: var(--g-900); font-size: 1rem; letter-spacing: 1px;">Desa Sidokerto</span>
                    <span style="color: var(--g-700); font-size: 0.75rem;">Kabupaten Sidoarjo</span>
                </div>
            </a>
            
            <!-- Hamburger Button untuk Mobile -->
            <button class="navbar-toggler rounded-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" style="border-color: var(--g-500);">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Menu Navigasi -->
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto text-uppercase fw-semibold" style="font-size: 0.85rem;">
                    <li class="nav-item"><a class="nav-link px-3" href="<?= BASE_URL ?>/index.php" style="color: var(--g-900);">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="<?= BASE_URL ?>/pages/profil.php" style="color: var(--g-900);">Profil Desa</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="<?= BASE_URL ?>/pages/pemerintahan.php" style="color: var(--g-900);">Pemerintahan</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="<?= BASE_URL ?>/pages/penduduk.php" style="color: var(--g-900);">Data Desa</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="<?= BASE_URL ?>/pages/berita.php" style="color: var(--g-900);">Berita</a></li>
                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                        <a class="btn btn-mono px-4 py-2 w-100" href="<?= BASE_URL ?>/login/login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>