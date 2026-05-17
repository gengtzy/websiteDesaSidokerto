<?php
// Panggil header (sekaligus koneksi database dan styling global)
require_once '../includes/header.php'; 

// Tarik Data Penduduk & Lakukan Perhitungan Total
$query = "SELECT * FROM penduduk";
$result = $conn->query($query);

$data_penduduk = [];
$total_kk = 0;
$total_laki = 0;
$total_perempuan = 0;
$total_semua = 0;

// Jika tabel ada dan isi tidak kosong, masukkan ke array dan hitung totalnya
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data_penduduk[] = $row;
        $total_kk += $row['kartu_keluarga'];
        $total_laki += $row['laki'];
        $total_perempuan += $row['perempuan'];
        $total_semua += ($row['laki'] + $row['perempuan']);
    }
}
?>

<!-- Header Halaman -->
<section class="py-5 text-center" style="background-color: var(--g-900); color: var(--g-50); border-bottom: 5px solid var(--g-500);">
    <div class="container">
        <h1 class="display-5 fw-bolder text-uppercase" style="letter-spacing: 2px;">Data Penduduk</h1>
        <p class="lead mb-0" style="color: var(--g-100);">Statistik Demografi dan Populasi Desa Sidokerto</p>
    </div>
</section>

<main class="container py-5">
    
    <!-- Kartu Ringkasan (Dashboard Style) -->
    <div class="row g-4 mb-5">
        <div class="col-md-3 col-sm-6">
            <div class="p-4 text-center" style="background-color: #ffffff; border: 2px solid var(--g-100); border-bottom: 5px solid var(--g-700);">
                <h6 class="text-uppercase text-muted fw-bold mb-2">Total Populasi</h6>
                <h2 class="fw-bolder mb-0" style="color: var(--g-900);"><?php echo number_format($total_semua, 0, ',', '.'); ?></h2>
                <small style="color: var(--g-700);">Jiwa</small>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="p-4 text-center" style="background-color: #ffffff; border: 2px solid var(--g-100); border-bottom: 5px solid var(--g-500);">
                <h6 class="text-uppercase text-muted fw-bold mb-2">Kepala Keluarga</h6>
                <h2 class="fw-bolder mb-0" style="color: var(--g-900);"><?php echo number_format($total_kk, 0, ',', '.'); ?></h2>
                <small style="color: var(--g-700);">KK</small>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="p-4 text-center" style="background-color: #ffffff; border: 2px solid var(--g-100); border-bottom: 5px solid var(--g-700);">
                <h6 class="text-uppercase text-muted fw-bold mb-2">Laki-Laki</h6>
                <h2 class="fw-bolder mb-0" style="color: var(--g-900);"><?php echo number_format($total_laki, 0, ',', '.'); ?></h2>
                <small style="color: var(--g-700);">Jiwa</small>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="p-4 text-center" style="background-color: #ffffff; border: 2px solid var(--g-100); border-bottom: 5px solid var(--g-500);">
                <h6 class="text-uppercase text-muted fw-bold mb-2">Perempuan</h6>
                <h2 class="fw-bolder mb-0" style="color: var(--g-900);"><?php echo number_format($total_perempuan, 0, ',', '.'); ?></h2>
                <small style="color: var(--g-700);">Jiwa</small>
            </div>
        </div>
    </div>

    <!-- Tabel Data Penduduk -->
    <div class="p-0 bg-white" style="border: 2px solid var(--g-100);">
        <div class="p-3" style="background-color: var(--g-50); border-bottom: 2px solid var(--g-100);">
            <h4 class="fw-bold mb-0 text-uppercase" style="color: var(--g-900); font-size: 1.1rem;">Distribusi Populasi Per Wilayah</h4>
        </div>
        
        <div class="table-responsive">
            <table class="table table-hover table-borderless mb-0 text-center align-middle" style="color: var(--g-900);">
                <thead style="background-color: var(--g-900); color: var(--g-50); border-bottom: 3px solid var(--g-500);">
                    <tr>
                        <th class="py-3 px-4">No</th>
                        <th class="py-3 px-4 text-start">Wilayah / Daerah</th>
                        <th class="py-3 px-4">Jumlah KK</th>
                        <th class="py-3 px-4">Laki-Laki</th>
                        <th class="py-3 px-4">Perempuan</th>
                        <th class="py-3 px-4" style="background-color: var(--g-700);">Total (L+P)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($data_penduduk) > 0): ?>
                        <?php $index = 1; foreach ($data_penduduk as $row): ?>
                            <tr style="border-bottom: 1px solid var(--g-100);">
                                <td class="py-3 px-4 fw-semibold text-muted"><?php echo $index++; ?></td>
                                <td class="py-3 px-4 text-start fw-bold text-uppercase"><?php echo htmlspecialchars($row["wilayah"]); ?></td>
                                <td class="py-3 px-4"><?php echo number_format($row["kartu_keluarga"], 0, ',', '.'); ?></td>
                                <td class="py-3 px-4"><?php echo number_format($row["laki"], 0, ',', '.'); ?></td>
                                <td class="py-3 px-4"><?php echo number_format($row["perempuan"], 0, ',', '.'); ?></td>
                                <td class="py-3 px-4 fw-bold" style="background-color: var(--g-50); color: var(--g-900);">
                                    <?php echo number_format($row["laki"] + $row["perempuan"], 0, ',', '.'); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <!-- Baris Total Paling Bawah -->
                        <tr style="background-color: var(--g-100); border-top: 2px solid var(--g-500);">
                            <td colspan="2" class="py-3 px-4 text-end fw-bolder text-uppercase">Total Keseluruhan</td>
                            <td class="py-3 px-4 fw-bold"><?php echo number_format($total_kk, 0, ',', '.'); ?></td>
                            <td class="py-3 px-4 fw-bold"><?php echo number_format($total_laki, 0, ',', '.'); ?></td>
                            <td class="py-3 px-4 fw-bold"><?php echo number_format($total_perempuan, 0, ',', '.'); ?></td>
                            <td class="py-3 px-4 fw-bolder" style="background-color: var(--g-500); color: var(--g-900);">
                                <?php echo number_format($total_semua, 0, ',', '.'); ?>
                            </td>
                        </tr>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="py-5 text-muted">Data penduduk belum tersedia atau tabel kosong.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php require_once '../includes/footer.php'; ?>