<?php
// Cukup panggil header, sistem keamanan dan layout otomatis berjalan
require_once 'includes/header.php';

// Ambil statistik sederhana dari database
$count_berita = $conn->query("SELECT COUNT(*) as total FROM berita")->fetch_assoc()['total'] ?? 0;
$count_pemerintah = $conn->query("SELECT COUNT(*) as total FROM pemerintahan")->fetch_assoc()['total'] ?? 0;
// Menghitung total jiwa dari tabel penduduk
$query_penduduk = $conn->query("SELECT SUM(laki + perempuan) as total FROM penduduk");
$count_penduduk = $query_penduduk->fetch_assoc()['total'] ?? 0;
?>

<div class="row mb-4">
    <div class="col-12">
        <div class="p-4" style="background-color: var(--g-100); border-left: 5px solid var(--g-700);">
            <h4 class="fw-bold mb-1" style="color: var(--g-900);">Selamat Datang di Pusat Kendali Desa</h4>
            <p class="mb-0 text-muted">Gunakan menu di sebelah kiri untuk mengelola konten website Desa Sidokerto.</p>
        </div>
    </div>
</div>

<!-- Kartu Statistik -->
<div class="row g-4">
    <!-- Kartu Total Berita -->
    <div class="col-md-4">
        <div class="flat-card p-4 h-100 d-flex align-items-center">
            <div class="me-3">
                <div class="d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background-color: var(--g-50); border: 2px solid var(--g-500);">
                    <i class="fa-regular fa-newspaper fa-2x" style="color: var(--g-700);"></i>
                </div>
            </div>
            <div>
                <p class="text-muted text-uppercase fw-bold mb-0" style="font-size: 0.8rem;">Total Publikasi Berita</p>
                <h2 class="fw-bolder mb-0" style="color: var(--g-900);"><?= number_format($count_berita, 0, ',', '.') ?></h2>
            </div>
        </div>
    </div>

    <!-- Kartu Aparatur Desa -->
    <div class="col-md-4">
        <div class="flat-card p-4 h-100 d-flex align-items-center" style="border-top-color: var(--g-500);">
            <div class="me-3">
                <div class="d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background-color: var(--g-50); border: 2px solid var(--g-500);">
                    <i class="fa-solid fa-sitemap fa-2x" style="color: var(--g-700);"></i>
                </div>
            </div>
            <div>
                <p class="text-muted text-uppercase fw-bold mb-0" style="font-size: 0.8rem;">Aparatur Desa</p>
                <h2 class="fw-bolder mb-0" style="color: var(--g-900);"><?= number_format($count_pemerintah, 0, ',', '.') ?></h2>
            </div>
        </div>
    </div>

    <!-- Kartu Total Penduduk -->
    <div class="col-md-4">
        <div class="flat-card p-4 h-100 d-flex align-items-center" style="border-top-color: var(--g-900);">
            <div class="me-3">
                <div class="d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background-color: var(--g-50); border: 2px solid var(--g-500);">
                    <i class="fa-solid fa-users fa-2x" style="color: var(--g-700);"></i>
                </div>
            </div>
            <div>
                <p class="text-muted text-uppercase fw-bold mb-0" style="font-size: 0.8rem;">Populasi Penduduk</p>
                <h2 class="fw-bolder mb-0" style="color: var(--g-900);"><?= number_format($count_penduduk, 0, ',', '.') ?> Jiwa</h2>
            </div>
        </div>
    </div>
</div>

<?php 
// Tutup halaman
require_once 'includes/footer.php'; 
?>