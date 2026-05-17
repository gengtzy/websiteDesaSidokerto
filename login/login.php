<?php
// Panggil konfigurasi database untuk menggunakan BASE_URL
require_once '../config/database.php';
session_start(); // Memulai sesi (Penting untuk sistem login nantinya)
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <!-- Perbaikan typo pada viewport agar responsif di HP -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Desa Sidokerto</title>
    
    <!-- Memanggil Bootstrap 5 dan Font Google yang sama dengan halaman utama -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* Variabel Warna Global (Identik dengan Header) */
        :root {
            --g-900: #064e3b;
            --g-700: #047857;
            --g-500: #10b981;
            --g-100: #d1fae5;
            --g-50:  #ecfdf5;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--g-900); /* Background gelap agar form menonjol */
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        /* Gaya Flat Design Card */
        .login-card {
            background-color: #ffffff;
            border: 4px solid var(--g-500);
            border-radius: 0; /* Sudut tajam khas birokrasi/formal */
            width: 100%;
            max-width: 400px;
            padding: 2.5rem;
            box-shadow: 10px 10px 0px var(--g-700); /* Shadow keras bergaya retro-modern */
        }

        /* Gaya Input Box Flat */
        .form-control-flat {
            border-radius: 0;
            border: 2px solid var(--g-100);
            padding: 0.75rem 1rem;
            transition: all 0.2s ease;
        }
        
        .form-control-flat:focus {
            border-color: var(--g-700);
            box-shadow: none;
            outline: none;
        }

        /* Gaya Tombol Flat */
        .btn-mono {
            background-color: var(--g-700);
            color: #ffffff;
            border-radius: 0;
            border: 2px solid var(--g-900);
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            padding: 0.75rem;
            transition: all 0.2s ease-in-out;
        }
        
        .btn-mono:hover {
            background-color: var(--g-900);
            color: var(--g-100);
        }
    </style>
</head>
<body>

    <div class="container d-flex justify-content-center">
        <div class="login-card">
            
            <!-- Logo & Judul -->
            <div class="text-center mb-4">
                <img src="<?= BASE_URL ?>/assets/img/sidoarjo.png" alt="Logo Sidoarjo" width="80" class="mb-3">
                <h3 class="fw-bolder text-uppercase" style="color: var(--g-900); letter-spacing: 1px;">Admin Panel</h3>
                <p class="text-muted small">Silakan login untuk mengelola data desa.</p>
            </div>

            <!-- Pesan Error (Anti-XSS) -->
            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger rounded-0 border-0 mb-4" style="background-color: #fee2e2; color: #991b1b; border-left: 5px solid #dc2626 !important; font-size: 0.9rem;" role="alert">
                    <strong>Gagal!</strong> <?= htmlspecialchars($_GET['error']); ?>
                </div>
            <?php endif; ?>

            <!-- Form Login -->
            <form method="post" action="proses_login.php">
                <div class="mb-3">
                    <label class="form-label fw-bold small text-uppercase" style="color: var(--g-900);">Username</label>
                    <input type="text" name="username" class="form-control form-control-flat" placeholder="Masukkan username" required autofocus>
                </div>
                
                <div class="mb-4">
                    <label class="form-label fw-bold small text-uppercase" style="color: var(--g-900);">Password</label>
                    <input type="password" name="password" class="form-control form-control-flat" placeholder="Masukkan password" required>
                </div>
                
                <div class="d-grid">
                    <button type="submit" class="btn btn-mono">Masuk Sistem</button>
                </div>
            </form>

            <!-- Tombol Kembali ke Beranda -->
            <div class="text-center mt-4">
                <a href="<?= BASE_URL ?>/index.php" class="text-decoration-none small fw-semibold" style="color: var(--g-700); border-bottom: 1px dashed var(--g-700);">
                    &larr; Kembali ke Beranda
                </a>
            </div>

        </div>
    </div>

</body>
</html>