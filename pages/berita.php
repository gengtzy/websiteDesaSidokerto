<?php
// Panggil header (sekaligus memuat koneksi database dan CSS global)
require_once '../includes/header.php'; 

// 1. Eksekusi Query dengan aman di awal
$query = "SELECT * FROM berita ORDER BY id DESC"; // Mengambil semua berita terbaru
$result = $conn->query($query);
$berita_list = [];

// 2. Simpan data ke dalam array jika tabel tidak kosong
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $berita_list[] = $row;
    }
}
?>

<!-- Header Halaman Berita -->
<section class="py-5 text-center" style="background-color: var(--g-900); color: var(--g-50); border-bottom: 5px solid var(--g-500);">
    <div class="container">
        <h1 class="display-5 fw-bolder text-uppercase" style="letter-spacing: 2px;">Berita Desa</h1>
        <p class="lead mb-0" style="color: var(--g-100);">Kabar terbaru, pengumuman, dan kegiatan dari Desa Sidokerto</p>
    </div>
</section>

<!-- Konten Utama (Grid Berita) -->
<main class="container py-5">
    <div class="row g-4">
        
        <?php if (!empty($berita_list)): ?>
            <?php foreach ($berita_list as $item): ?>
                <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
                    <!-- Kartu Berita Flat Design -->
                    <div class="w-100 d-flex flex-column bg-white" style="border: 2px solid var(--g-100); transition: border-color 0.2s ease;">
                        
                        <!-- Gambar Berita -->
                        <div style="border-bottom: 3px solid var(--g-700);">
                            <img src="<?= BASE_URL ?>/uploads/<?= htmlspecialchars($item['gambar']) ?>" 
                                 alt="Thumbnail Berita" 
                                 class="w-100" 
                                 style="height: 220px; object-fit: cover;">
                        </div>
                        
                        <!-- Isi Berita -->
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <h4 class="fw-bold mb-3 text-uppercase" style="color: var(--g-900); font-size: 1.2rem; line-height: 1.4;">
                                <?= htmlspecialchars($item["judul"]) ?>
                            </h4>
                            
                            <!-- Excerpt / Ringkasan (Dibatasi 120 karakter agar grid rata) -->
                            <p class="mb-4 flex-grow-1" style="color: var(--g-700); font-size: 0.95rem; text-align: justify;">
                                <?= htmlspecialchars(mb_substr($item["isi"], 0, 120)) ?>...
                            </p>
                            
                            <!-- Tombol Aksi -->
                            <div class="mt-auto pt-3 text-center" style="border-top: 1px dashed var(--g-100);">
                                <a href="<?= BASE_URL ?>/pages/halberita.php?id=<?= $item['id'] ?>" class="btn btn-mono px-4 py-2">
                                    Baca Selengkapnya
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <!-- Tampilan Fallback Jika Berita Kosong -->
            <div class="col-12">
                <div class="text-center p-5" style="background-color: var(--g-50); border: 2px dashed var(--g-500);">
                    <h4 class="fw-bold mb-2" style="color: var(--g-900);">Belum Ada Publikasi</h4>
                    <p class="text-muted mb-0">Saat ini belum ada berita atau pengumuman terbaru yang ditambahkan oleh admin.</p>
                </div>
            </div>
        <?php endif; ?>

    </div>
</main>

<?php require_once '../includes/footer.php'; ?>