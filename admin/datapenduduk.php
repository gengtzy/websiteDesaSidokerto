<?php
require_once 'includes/header.php';
$result = $conn->query("SELECT * FROM penduduk ORDER BY id ASC");
?>

<div class="d-flex justify-content-between align-items-center mb-4 pb-3" style="border-bottom: 2px solid var(--g-100);">
    <div>
        <h3 class="fw-bold mb-0 text-uppercase" style="color: var(--g-900);">Data Penduduk</h3>
        <p class="text-muted mb-0 small">Kelola statistik demografi per wilayah/dusun</p>
    </div>
    <a href="penduduk/form.php" class="btn btn-mono"><i class="fa-solid fa-plus me-2"></i> Tambah Wilayah</a>
</div>

<?php if(isset($_GET['pesan'])): ?>
    <script> document.addEventListener("DOMContentLoaded", function() { Swal.fire({ icon: 'success', title: 'Berhasil!', text: '<?= htmlspecialchars($_GET['pesan']) ?>', confirmButtonColor: '#047857' }); }); </script>
<?php endif; ?>

<div class="flat-card p-0 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover mb-0 align-middle text-center">
            <thead style="background-color: var(--g-900); color: var(--g-50);">
                <tr>
                    <th class="py-3 px-4">No</th>
                    <th class="py-3 px-4 text-start">Wilayah / Dusun</th>
                    <th class="py-3 px-4">Jml. KK</th>
                    <th class="py-3 px-4">Laki-Laki</th>
                    <th class="py-3 px-4">Perempuan</th>
                    <th class="py-3 px-4" style="background-color: var(--g-700);">Total</th>
                    <th class="py-3 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result && $result->num_rows > 0): $no=1; while ($row = $result->fetch_assoc()): ?>
                    <tr style="border-bottom: 1px solid var(--g-100);">
                        <td class="py-3 px-4 fw-bold text-muted"><?= $no++; ?></td>
                        <td class="py-3 px-4 fw-bold text-start text-uppercase"><?= htmlspecialchars($row['wilayah']); ?></td>
                        <td class="py-3 px-4"><?= number_format($row['kartu_keluarga'], 0, ',', '.'); ?></td>
                        <td class="py-3 px-4"><?= number_format($row['laki'], 0, ',', '.'); ?></td>
                        <td class="py-3 px-4"><?= number_format($row['perempuan'], 0, ',', '.'); ?></td>
                        <td class="py-3 px-4 fw-bolder" style="background-color: var(--g-50); color: var(--g-900);">
                            <?= number_format($row['laki'] + $row['perempuan'], 0, ',', '.'); ?>
                        </td>
                        <td class="py-3 px-4">
                            <a href="penduduk/form.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-outline-primary rounded-0"><i class="fa-solid fa-pen"></i></a>
                            <a href="#" onclick="konfirmasiHapus(event, 'penduduk/hapus.php?id=<?= $row['id']; ?>')" class="btn btn-sm btn-outline-danger rounded-0"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endwhile; else: ?>
                    <tr><td colspan="7" class="text-center py-4 text-muted">Belum ada data wilayah/penduduk.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once 'includes/footer.php'; ?>