<?php
// Panggil header (sekaligus memuat koneksi database dan CSS global)
require_once '../includes/header.php'; 

$berita = null;
$pesan_error = null;

// 1. Validasi dan Amankan ID (Mencegah SQL Injection & Error)
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']); // Paksa menjadi format angka integer (Aman)
    
    $query = "SELECT * FROM berita WHERE id = $id LIMIT 1";
    $result = $conn->query($query);
    
    if ($result && $result->num_rows > 0) {
        $berita = $result->fetch_assoc();
    } else {
        $pesan_error = "Berita yang Anda cari tidak ditemukan atau telah dihapus.";
    }
} else {
    $pesan_error = "ID Berita tidak valid atau tidak diberikan.";
}
?>

<!-- Header Halaman -->
<section class="py-4 text-center" style="background-color: var(--g-900); color: var(--g-50); border-bottom: 5px solid var(--g-500);">
    <div class="container">
        <h2 class="display-6 fw-bolder text-uppercase mb-0" style="letter-spacing: 1px;">Detail Berita</h2>
    </div>
</section>

<!-- Konten Utama Detail Berita -->
<main class="container py-5">
    <div class="row justify-content-center">
        <!-- Menggunakan col-lg-8 agar konten ada di tengah dan tidak terlalu melebar (nyaman untuk membaca) -->
        <div class="col-lg-8">
            
            <?php if ($berita): ?>
                
                <!-- Tombol Kembali -->
                <div class="mb-4">
                    <a href="<?= BASE_URL ?>/pages/berita.php" class="text-decoration-none fw-bold" style="color: var(--g-700);">
                        &larr; Kembali ke Daftar Berita
                    </a>
                </div>

                <!-- Judul Berita -->
                <h1 class="fw-bolder mb-4 text-uppercase" style="color: var(--g-900); line-height: 1.3;">
                    <?= htmlspecialchars($berita["judul"]); ?>
                </h1>

                <!-- Thumbnail Gambar (Dengan Logika Anti-Pecah) -->
                <div class="mb-4" style="border: 2px solid var(--g-100); border-bottom: 5px solid var(--g-700);">
                    <?php 
                        $pathFisik = '../uploads/' . $berita['gambar'];
                        if (!empty($berita['gambar']) && file_exists($pathFisik)) {
                            $urlGambar = BASE_URL . '/uploads/' . htmlspecialchars($berita['gambar']);
                        } else {
                            $urlGambar = 'https://placehold.co/800x400/047857/ffffff?text=Berita+Desa';
                        }
                    ?>
                    <img src="<?= $urlGambar ?>" 
                         alt="Gambar Utama Berita" 
                         class="w-100" 
                         style="max-height: 450px; object-fit: cover; display: block;">
                </div>

                <!-- Isi Berita -->
                <article class="p-4 bg-white" style="border: 1px solid var(--g-100); font-size: 1.1rem; line-height: 1.8; color: var(--g-900); text-align: justify;">
                    <!-- nl2br digunakan agar enter/baris baru dari database tetap terbaca sebagai paragraf HTML -->
                    <?= nl2br(htmlspecialchars($berita["isi"])); ?>
                </article>

                <!-- Sumber Berita (Jika Ada) -->
                <?php if (!empty($berita['link'])): ?>
                    <div class="mt-4 p-4" style="background-color: var(--g-50); border-left: 5px solid var(--g-500); border-top: 1px solid var(--g-100); border-right: 1px solid var(--g-100); border-bottom: 1px solid var(--g-100);">
                        <span class="fw-bold me-2" style="color: var(--g-900);">Sumber Referensi Asli:</span>
                        <a href="<?= htmlspecialchars($berita['link']); ?>" target="_blank" rel="noopener noreferrer" style="color: var(--g-700); font-weight: 600; text-decoration: none; border-bottom: 1px dashed var(--g-700);">
                            Baca di sini &nearr;
                        </a>
                    </div>
                <?php endif; ?>

            <?php else: ?>
                
                <!-- Tampilan Fallback Jika Error / Berita Kosong -->
                <div class="text-center p-5 bg-white" style="border: 2px dashed var(--g-500);">
                    <h3 class="fw-bold mb-3" style="color: var(--g-900);">Oops!</h3>
                    <p class="text-muted mb-4"><?= $pesan_error; ?></p>
                    <a href="<?= BASE_URL ?>/pages/berita.php" class="btn btn-mono px-4 py-2">
                        Kembali ke Berita Desa
                    </a>
                </div>

            <?php endif; ?>

        </div>
    </div>
</main>

<?php require_once '../includes/footer.php'; ?>