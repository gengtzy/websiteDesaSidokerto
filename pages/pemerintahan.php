<?php
// Panggil header (sekaligus koneksi database dan styling global)
require_once '../includes/header.php'; 

// 1. Tarik Data Kepala Desa
$queryKades = "SELECT * FROM pemerintahan WHERE jabatan='kepala desa' LIMIT 1";
$resultKades = $conn->query($queryKades);
$kades = ($resultKades && $resultKades->num_rows > 0) ? $resultKades->fetch_assoc() : null;

// 2. Tarik Data Sekretaris
$querySekdes = "SELECT * FROM pemerintahan WHERE jabatan='sekretaris' LIMIT 1";
$resultSekdes = $conn->query($querySekdes);
$sekdes = ($resultSekdes && $resultSekdes->num_rows > 0) ? $resultSekdes->fetch_assoc() : null;

// 3. Tarik Data BPD
$queryBPD = "SELECT * FROM pemerintahan WHERE jabatan='badan permusyawaratan' LIMIT 1";
$resultBPD = $conn->query($queryBPD);
$bpd = ($resultBPD && $resultBPD->num_rows > 0) ? $resultBPD->fetch_assoc() : null;
?>

<!-- Header Halaman -->
<section class="py-5 text-center" style="background-color: var(--g-900); color: var(--g-50); border-bottom: 5px solid var(--g-500);">
    <div class="container">
        <h1 class="display-5 fw-bolder text-uppercase" style="letter-spacing: 2px;">Pemerintahan Desa</h1>
        <p class="lead mb-0" style="color: var(--g-100);">Struktur Organisasi dan Aparatur Desa Sidokerto</p>
    </div>
</section>

<!-- Konten Utama dengan Layout Sidebar -->
<main class="container py-5">
    <div class="row g-5">
        
        <!-- Sidebar Navigasi -->
        <div class="col-lg-3 d-none d-lg-block">
            <div class="position-sticky" style="top: 100px;">
                <h5 class="fw-bold mb-3 text-uppercase" style="color: var(--g-900); border-bottom: 2px solid var(--g-500); padding-bottom: 5px;">Menu Navigasi</h5>
                <div class="list-group rounded-0" style="border: 2px solid var(--g-100);">
                    <a href="#organisasi" class="list-group-item list-group-item-action fw-semibold py-3" style="color: var(--g-900); border-bottom: 1px solid var(--g-100);">Struktur Organisasi</a>
                    <a href="#kepaladesa" class="list-group-item list-group-item-action fw-semibold py-3" style="color: var(--g-900); border-bottom: 1px solid var(--g-100);">Kepala Desa</a>
                    <a href="#bpd" class="list-group-item list-group-item-action fw-semibold py-3" style="color: var(--g-900); border-bottom: 1px solid var(--g-100);">Badan Permusyawaratan</a>
                    <a href="#sekretaris" class="list-group-item list-group-item-action fw-semibold py-3" style="color: var(--g-900);">Sekretaris Desa</a>
                </div>
            </div>
        </div>

        <!-- Area Konten Utama -->
        <div class="col-lg-9">
            
            <!-- Struktur Organisasi -->
            <section id="organisasi" class="mb-5 pb-4" style="border-bottom: 1px dashed var(--g-500);">
                <h3 class="fw-bold mb-4" style="color: var(--g-900);">Struktur Organisasi</h3>
                <div class="p-3 bg-white" style="border: 2px solid var(--g-100);">
                    <img src="https://asset.kompas.com/crops/7fAEg0knuiNvwiSEWFgv9UxOKCc=/0x48:1024x730/750x500/data/photo/2022/06/04/629b54ac4d4ba.png" 
                         alt="Bagan Struktur Organisasi" 
                         class="img-fluid w-100" style="object-fit: contain;">
                </div>
            </section>

            <!-- Kepala Desa -->
            <section id="kepaladesa" class="mb-5 pb-4" style="border-bottom: 1px dashed var(--g-500);">
                <h3 class="fw-bold mb-4" style="color: var(--g-900);">Kepala Desa</h3>
                <?php if ($kades): ?>
                    <div class="row g-0 bg-white" style="border: 2px solid var(--g-100); border-left: 6px solid var(--g-700);">
                        <div class="col-md-8 p-4">
                            <table class="table table-borderless mb-0 text-uppercase fw-semibold" style="color: var(--g-900);">
                                <tr>
                                    <td width="30%" class="text-muted">Nama</td>
                                    <td>: <?php echo htmlspecialchars($kades["nama"]); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Jabatan</td>
                                    <td>: <?php echo htmlspecialchars($kades["jabatan"]); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-muted">NIP</td>
                                    <td>: <?php echo htmlspecialchars($kades["nip"]); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="alert alert-light border-0 rounded-0" style="background-color: var(--g-50); border-left: 4px solid var(--g-500) !important;">Data Kepala Desa belum diatur.</div>
                <?php endif; ?>
            </section>

            <!-- Badan Permusyawaratan Desa (BPD) -->
            <section id="bpd" class="mb-5 pb-4" style="border-bottom: 1px dashed var(--g-500);">
                <h3 class="fw-bold mb-4" style="color: var(--g-900);">Badan Permusyawaratan Desa (BPD)</h3>
                <?php if ($bpd): ?>
                    <div class="bg-white mb-4" style="border: 2px solid var(--g-100); border-left: 6px solid var(--g-700);">
                        <div class="p-4">
                            <table class="table table-borderless mb-0 text-uppercase fw-semibold" style="color: var(--g-900);">
                                <tr>
                                    <td width="30%" class="text-muted">Nama Pimpinan</td>
                                    <td>: <?php echo htmlspecialchars($bpd["nama"]); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-muted">NIP</td>
                                    <td>: <?php echo htmlspecialchars($bpd["nip"]); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                <?php else: ?>
                     <div class="alert alert-light border-0 rounded-0 mb-4" style="background-color: var(--g-50); border-left: 4px solid var(--g-500) !important;">Data Pimpinan BPD belum diatur.</div>
                <?php endif; ?>

                <div class="p-4" style="background-color: var(--g-50); border: 1px solid var(--g-100); color: var(--g-900); text-align: justify;">
                    <p>Berdasarkan Permendagri No.110/2016, tugas Badan Permusyawaratan Desa (BPD) mempunyai fungsi membahas dan menyepakati Rancangan Peraturan Desa bersama Kepala Desa, menampung dan menyalurkan aspirasi masyarakat Desa, dan melakukan pengawasan kinerja.</p>
                    <p class="fw-bold mt-3">Rincian Tugas BPD:</p>
                    <ol class="ps-3 mb-0" style="line-height: 1.8;">
                        <li>Menggali, menampung, mengelola, dan menyalurkan aspirasi masyarakat.</li>
                        <li>Menyelenggarakan musyawarah Tugas BPD dan musyawarah Desa.</li>
                        <li>Membentuk panitia pemilihan Kepala Desa.</li>
                        <li>Membahas dan menyepakati rancangan Peraturan Desa bersama Kepala Desa.</li>
                        <li>Melaksanakan pengawasan terhadap kinerja Kepala Desa.</li>
                        <li>Melakukan evaluasi laporan keterangan penyelenggaraan Pemerintahan Desa.</li>
                        <li>Menciptakan hubungan kerja yang harmonis dengan Pemerintah Desa dan lembaga lainnya.</li>
                    </ol>
                </div>
            </section>

            <!-- Sekretaris Desa -->
            <section id="sekretaris" class="mb-2">
                <h3 class="fw-bold mb-4" style="color: var(--g-900);">Sekretaris Desa</h3>
                <?php if ($sekdes): ?>
                    <div class="bg-white mb-4" style="border: 2px solid var(--g-100); border-left: 6px solid var(--g-700);">
                        <div class="p-4">
                            <table class="table table-borderless mb-0 text-uppercase fw-semibold" style="color: var(--g-900);">
                                <tr>
                                    <td width="30%" class="text-muted">Nama Sekretaris</td>
                                    <td>: <?php echo htmlspecialchars($sekdes["nama"]); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-muted">NIP</td>
                                    <td>: <?php echo htmlspecialchars($sekdes["nip"]); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="alert alert-light border-0 rounded-0 mb-4" style="background-color: var(--g-50); border-left: 4px solid var(--g-500) !important;">Data Sekretaris Desa belum diatur.</div>
                <?php endif; ?>

                <div class="p-4" style="background-color: var(--g-50); border: 1px solid var(--g-100); color: var(--g-900); text-align: justify;">
                    <p>Sekretaris desa/kelurahan berkedudukan sebagai unsur staff yang membantu kepala desa/lurah dalam melaksanakan tugas dan wewenangnya serta memimpin sekretariat desa/lurah. Sekretaris desa mempunyai tugas menjalankan fungsi administrasi kelurahan, pembangunan dan kemasyarakatan.</p>
                    <p class="fw-bold mt-3">Fungsi Utama Sekretaris Desa:</p>
                    <ul class="ps-3 mb-4" style="line-height: 1.8;">
                        <li>Sebagai pelaksana urusan surat menyurat, kearsipan dan laporan.</li>
                        <li>Sebagai pelaksana urusan keuangan.</li>
                        <li>Sebagai pelaksana urusan administrasi pemerintahan, pembangunan, dan kemasyarakatan.</li>
                    </ul>
                    <p class="mb-2">Dalam melaksanakan tugasnya, sekretaris desa akan dibantu oleh Kepala Urusan, yaitu:</p>
                    <ol class="ps-3 mb-0">
                        <li>Kepala Urusan Pemerintahan</li>
                        <li>Kepala Urusan Pembangunan</li>
                        <li>Kepala Urusan Keuangan</li>
                        <li>Kepala Urusan Umum</li>
                    </ol>
                </div>
            </section>

        </div>
    </div>
</main>

<?php require_once '../includes/footer.php'; ?>