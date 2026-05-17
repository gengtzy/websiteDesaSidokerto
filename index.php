<?php 
require_once 'includes/header.php'; 

// Fetch Berita
$queryBerita = "SELECT * FROM berita ORDER BY id DESC LIMIT 2";
$resultBerita = $conn->query($queryBerita);

// Fetch Agenda
$queryAgenda = "SELECT * FROM agenda ORDER BY id DESC LIMIT 2";
$resultAgenda = $conn->query($queryAgenda);
?>

<!-- KONSEP HIJAU MONOKROMATIK & FLAT DESIGN -->
<style>
    :root {
        /* Palet Hijau Monokromatik */
        --g-900: #064e3b; /* Hijau Sangat Gelap (Teks Utama) */
        --g-700: #047857; /* Hijau Gelap (Tombol & Aksen Utama) */
        --g-500: #10b981; /* Hijau Terang (Garis batas/Border) */
        --g-100: #d1fae5; /* Hijau Sangat Terang (Background Elemen) */
        --g-50:  #ecfdf5; /* Putih Kehijauan (Background Halaman) */
    }

    body {
        background-color: var(--g-50);
        color: var(--g-900);
        font-family: 'Poppins', sans-serif;
    }

    /* Override gaya default AI (buang shadow, buang sudut melengkung) */
    .hero-mono {
        /* Overlay hijau elegan di atas gambar hero */
        background: linear-gradient(rgba(4, 120, 87, 0.85), rgba(6, 78, 59, 0.95)), url('<?= BASE_URL ?>/assets/img/hero.jpg') no-repeat center center / cover;
        min-height: 65vh;
    }

    .flat-card {
        background-color: #ffffff;
        border: 2px solid var(--g-100);
        border-radius: 0; /* Ujung tajam, anti-mainstream */
        transition: all 0.2s ease-in-out;
    }

    .flat-card:hover {
        border-color: var(--g-500);
        background-color: var(--g-50);
    }

    .btn-mono {
        background-color: var(--g-700);
        color: #ffffff;
        border-radius: 0;
        border: 1px solid var(--g-900);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .btn-mono:hover {
        background-color: var(--g-900);
        color: var(--g-100);
    }

    .section-title {
        border-bottom: 3px solid var(--g-500);
        display: inline-block;
        padding-bottom: 5px;
        color: var(--g-900);
        font-weight: bold;
    }
</style>

<!-- HERO SECTION -->
<section class="hero-mono d-flex align-items-center justify-content-center text-center text-white">
    <div class="container px-3">
        <h2 class="display-6 fw-light mb-2" style="color: var(--g-100);">Website Informasi</h2>
        <h1 class="display-3 fw-bolder mb-3 text-uppercase" style="letter-spacing: 4px; color: #ffffff;">Desa Sidokerto</h1>
        <p class="lead mb-5" style="color: var(--g-100);">Kecamatan Buduran, Kabupaten Sidoarjo</p>
        <a href="#jelajahi" class="btn btn-mono px-5 py-3">Jelajahi Data Desa</a>
    </div>
</section>

<!-- MAIN CONTENT -->
<div id="jelajahi" class="container py-5">
    <div class="row g-5">
        
        <!-- Kolom Berita -->
        <div class="col-lg-8">
            <h3 class="section-title mb-4">Berita Terkini</h3>

            <?php if ($resultBerita && $resultBerita->num_rows > 0): ?>
                <div class="row g-4">
                    <?php while ($row = $resultBerita->fetch_assoc()): ?>
                        <div class="col-12">
                            <div class="flat-card h-100">
                                <div class="row g-0">
                                    <div class="col-md-5">
                                        <img src="<?= BASE_URL ?>/uploads/<?php echo htmlspecialchars($row['gambar']); ?>" 
                                             class="img-fluid w-100 object-fit-cover" 
                                             alt="Gambar Berita" 
                                             style="height: 100%; min-height: 220px;">
                                    </div>
                                    <div class="col-md-7 d-flex flex-column justify-content-center p-4">
                                        <h4 class="fw-bold mb-3" style="color: var(--g-900);"><?php echo htmlspecialchars($row["judul"]); ?></h4>
                                        <p class="mb-4" style="color: var(--g-700);"><?php echo htmlspecialchars(substr($row["isi"], 0, 140)); ?>...</p>
                                        <div>
                                            <a href="<?= BASE_URL ?>/pages/halberita.php?id=<?php echo $row['id']; ?>" class="btn btn-mono px-4 py-2" style="font-size: 0.85rem;">
                                                Baca Selengkapnya
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <div class="p-4" style="background-color: var(--g-100); border: 1px solid var(--g-500);">
                    <p class="mb-0 text-center" style="color: var(--g-900);">Belum ada berita terbaru saat ini.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Kolom Agenda -->
        <div class="col-lg-4">
            <h3 class="section-title mb-4">Agenda Kegiatan</h3>

            <?php if ($resultAgenda && $resultAgenda->num_rows > 0): ?>
                <div class="d-flex flex-column gap-3">
                    <?php while ($row = $resultAgenda->fetch_assoc()): ?>
                        <div class="p-4" style="background-color: #ffffff; border-left: 6px solid var(--g-700); border-top: 1px solid var(--g-100); border-right: 1px solid var(--g-100); border-bottom: 1px solid var(--g-100);">
                            <div class="mb-2">
                                <span class="px-2 py-1 fw-bold" style="background-color: var(--g-100); color: var(--g-900); font-size: 0.8rem;">
                                    <?php echo htmlspecialchars($row["tanggal"]); ?>
                                </span>
                            </div>
                            <h5 class="fw-bold mb-1" style="color: var(--g-900);"><?php echo htmlspecialchars($row["judul"]); ?></h5>
                            <p class="mb-0 small" style="color: var(--g-700);">
                                📍 <?php echo htmlspecialchars($row["lokasi"]); ?>
                            </p>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <div class="p-4" style="background-color: var(--g-100); border: 1px solid var(--g-500);">
                    <p class="mb-0 text-center" style="color: var(--g-900);">Tidak ada agenda dalam waktu dekat.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- SECTION LOKASI -->
<section class="py-5" style="background-color: var(--g-900); color: var(--g-50);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-4 mb-lg-0 pr-lg-5">
                <h3 class="mb-3 text-uppercase" style="border-bottom: 2px solid var(--g-500); display: inline-block; padding-bottom: 5px;">Profil Data Desa</h3>
                <p style="color: var(--g-100); margin-bottom: 2rem;">Informasi geografis dan administratif Desa Sidokerto secara detail.</p>
                
                <table class="table table-borderless table-sm text-white">
                    <tbody>
                        <tr style="border-bottom: 1px solid var(--g-700);">
                            <td class="py-2" style="color: var(--g-100);">Kode PUM</td>
                            <td class="py-2 fw-bold text-end">3217082001</td>
                        </tr>
                        <tr style="border-bottom: 1px solid var(--g-700);">
                            <td class="py-2" style="color: var(--g-100);">Tahun Pembentukan</td>
                            <td class="py-2 fw-bold text-end">1966</td>
                        </tr>
                        <tr style="border-bottom: 1px solid var(--g-700);">
                            <td class="py-2" style="color: var(--g-100);">Dasar Hukum</td>
                            <td class="py-2 fw-bold text-end">141.1/KEP.18-PEM/1966</td>
                        </tr>
                        <tr style="border-bottom: 1px solid var(--g-700);">
                            <td class="py-2" style="color: var(--g-100);">Tipologi</td>
                            <td class="py-2 fw-bold text-end">Perindustrian / Jasa</td>
                        </tr>
                        <tr>
                            <td class="py-2" style="color: var(--g-100);">Luas Wilayah</td>
                            <td class="py-2 fw-bold text-end">305.28 ha</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-7 pl-lg-5">
                <div style="border: 4px solid var(--g-700); padding: 5px; background-color: var(--g-50);">
                    <iframe src="https://maps.google.com/maps?q=sidokerto&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" 
                            width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>