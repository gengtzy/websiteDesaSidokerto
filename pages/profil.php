<?php
// Naik satu folder (../) untuk memanggil header yang ada di folder includes
require_once '../includes/header.php'; 

// Fetch Data Kepala Desa dari tabel pemerintahan
$query = "SELECT * FROM pemerintahan WHERE jabatan='kepala desa' LIMIT 1";
$result = $conn->query($query);
$kepalaDesa = ($result && $result->num_rows > 0) ? $result->fetch_assoc() : null;
?>

<!-- Header Halaman -->
<section class="py-5 text-center" style="background-color: var(--g-900); color: var(--g-50); border-bottom: 5px solid var(--g-500);">
    <div class="container">
        <h1 class="display-5 fw-bolder text-uppercase" style="letter-spacing: 2px;">Profil Desa</h1>
        <p class="lead mb-0" style="color: var(--g-100);">Mengenal lebih dekat visi, misi, dan struktur Desa Sidokerto</p>
    </div>
</section>

<!-- Konten Utama -->
<main class="container py-5">
    <div class="row g-5">
        
        <!-- Kolom Kiri: Tentang PTKD & Alamat -->
        <div class="col-lg-8">
            
            <!-- Section PTKD -->
            <div class="mb-5">
                <h3 class="fw-bold mb-4" style="color: var(--g-900); border-bottom: 3px solid var(--g-500); display: inline-block; padding-bottom: 5px;">
                    Platform Tata Kelola Desa (PTKD)
                </h3>
                <div class="p-4" style="background-color: #ffffff; border: 2px solid var(--g-100); border-left: 6px solid var(--g-700);">
                    <h5 class="fw-bold mb-3" style="color: var(--g-700);">Mewujudkan Modernisasi Tata Kelola Desa</h5>
                    <p style="color: var(--g-900); text-align: justify;">
                        Maksud Pengembangan PTKD adalah penyediaan media dalam memperoleh, mengelola, dan menyajikan data serta informasi desa dan kawasan perdesaan secara transparan dan akuntabel.
                    </p>
                    
                    <h6 class="fw-bold mt-4 mb-3" style="color: var(--g-900);">Tujuan Pengembangan PTKD:</h6>
                    <ol class="ps-3" style="color: var(--g-900); text-align: justify; line-height: 1.8;">
                        <li class="mb-2">Meningkatkan kualitas perencanaan dan perumusan kebijakan pembangunan desa dan kawasan.</li>
                        <li class="mb-2">Mengefektifkan pelaksanaan kebijakan, program, dan kegiatan pembangunan desa dan kawasan perdesaan yang dilakukan oleh Pemerintah Desa.</li>
                        <li class="mb-2">Meningkatkan kualitas pelayanan dan memberikan manfaat yang sebesar-besarnya bagi masyarakat dan pihak yang berkepentingan.</li>
                        <li>Mengukur dan memberikan penilaian secara obyektif terhadap kemajuan dan pencapaian strategi pembangunan di desa dan kawasan perdesaan.</li>
                    </ol>
                </div>
            </div>

            <!-- Section Kantor -->
            <div>
                <h3 class="fw-bold mb-4" style="color: var(--g-900); border-bottom: 3px solid var(--g-500); display: inline-block; padding-bottom: 5px;">
                    Informasi Kontak & Kantor
                </h3>
                <div class="p-0" style="background-color: #ffffff; border: 2px solid var(--g-100);">
                    <table class="table table-borderless table-hover mb-0" style="color: var(--g-900);">
                        <tbody>
                            <tr style="border-bottom: 1px solid var(--g-100);">
                                <td class="py-3 px-4 fw-bold bg-light" style="width: 30%;">Alamat</td>
                                <td class="py-3 px-4">Jl. Raya Sidokerto No.17, Sono, Sidokerto, Kec. Buduran, Kabupaten Sidoarjo, Jawa Timur</td>
                            </tr>
                            <tr style="border-bottom: 1px solid var(--g-100);">
                                <td class="py-3 px-4 fw-bold bg-light">Kode Pos</td>
                                <td class="py-3 px-4">61252</td>
                            </tr>
                            <tr style="border-bottom: 1px solid var(--g-100);">
                                <td class="py-3 px-4 fw-bold bg-light">No Telepon</td>
                                <td class="py-3 px-4">031-8964484</td>
                            </tr>
                            <tr style="border-bottom: 1px solid var(--g-100);">
                                <td class="py-3 px-4 fw-bold bg-light">Email</td>
                                <td class="py-3 px-4">sidokerto@gmail.com</td>
                            </tr>
                            <tr>
                                <td class="py-3 px-4 fw-bold bg-light">Website</td>
                                <td class="py-3 px-4">sidokerto.ac.id</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>

        <!-- Kolom Kanan: Profil Kepala Desa -->
        <div class="col-lg-4">
            <h3 class="fw-bold mb-4" style="color: var(--g-900); border-bottom: 3px solid var(--g-500); display: inline-block; padding-bottom: 5px;">
                Kepala Desa
            </h3>
            
            <?php if ($kepalaDesa): ?>
                <div class="text-center p-4" style="background-color: #ffffff; border: 2px solid var(--g-100); border-top: 6px solid var(--g-700);">
                    <!-- Pastikan gambar kepala desa kotak/proporsional. Pakai object-fit agar tidak gepeng -->
                    <img src="<?= BASE_URL ?>/uploads/<?php echo htmlspecialchars($kepalaDesa['gambar']); ?>" 
                         alt="Foto Kepala Desa" 
                         class="img-fluid rounded-circle mb-3 border" 
                         style="width: 180px; height: 180px; object-fit: cover; border-color: var(--g-100) !important; border-width: 4px !important;">
                    
                    <h4 class="fw-bold text-uppercase mb-1" style="color: var(--g-900);">
                        <?php echo htmlspecialchars(ucwords($kepalaDesa["nama"])); ?>
                    </h4>
                    <p class="mb-3" style="color: var(--g-700); font-weight: 600;">
                        <?php echo htmlspecialchars(ucwords($kepalaDesa["jabatan"])); ?>
                    </p>
                    
                    <div class="text-start mt-4 pt-3" style="border-top: 1px dashed var(--g-500);">
                        <p class="mb-1 small text-muted">Nomor Induk Pegawai (NIP)</p>
                        <p class="fw-bold mb-0" style="color: var(--g-900);">
                            <?php echo htmlspecialchars($kepalaDesa["nip"]); ?>
                        </p>
                    </div>
                </div>
            <?php else: ?>
                <div class="p-4 text-center" style="background-color: var(--g-50); border: 1px solid var(--g-500);">
                    <p class="mb-0 text-muted">Data Kepala Desa belum tersedia.</p>
                </div>
            <?php endif; ?>
            
        </div>

    </div>
</main>

<?php require_once '../includes/footer.php'; ?>