<?php
require_once 'includes/header.php';
$result = $conn->query("SELECT * FROM pengumuman ORDER BY tanggal DESC, id DESC");
?>

<div class="d-flex justify-content-between align-items-center mb-4 pb-3" style="border-bottom: 2px solid var(--g-100);">
    <div>
        <h3 class="fw-bold mb-0 text-uppercase" style="color: var(--g-900);">Pengumuman Desa</h3>
        <p class="text-muted mb-0 small">Kelola informasi cepat dan edaran untuk warga</p>
    </div>
    <a href="pengumuman/form.php" class="btn btn-mono"><i class="fa-solid fa-plus me-2"></i> Buat Pengumuman</a>
</div>

<?php if(isset($_GET['pesan'])): ?>
    <script> document.addEventListener("DOMContentLoaded", function() { Swal.fire({ icon: 'success', title: 'Berhasil!', text: '<?= htmlspecialchars($_GET['pesan']) ?>', confirmButtonColor: '#047857' }); }); </script>
<?php endif; ?>

<div class="flat-card p-0 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover mb-0 align-middle">
            <thead style="background-color: var(--g-900); color: var(--g-50);">
                <tr>
                    <th class="py-3 px-4" width="5%">No</th>
                    <th class="py-3 px-4" width="15%">Tanggal</th>
                    <th class="py-3 px-4" width="25%">Judul</th>
                    <th class="py-3 px-4" width="40%">Isi Pengumuman</th>
                    <th class="py-3 px-4 text-center" width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result && $result->num_rows > 0): $no=1; while ($row = $result->fetch_assoc()): ?>
                    <tr style="border-bottom: 1px solid var(--g-100);">
                        <td class="py-3 px-4 fw-bold text-muted"><?= $no++; ?></td>
                        <td class="py-3 px-4 fw-bold" style="color: var(--g-700);">
                            <!-- Format tanggal ala Indonesia -->
                            <?= date('d M Y', strtotime($row['tanggal'])); ?>
                        </td>
                        <td class="py-3 px-4 fw-semibold"><?= htmlspecialchars($row['judul']); ?></td>
                        <td class="py-3 px-4 small text-muted">
                            <?= htmlspecialchars(mb_substr($row['isi'], 0, 80)); ?>...
                        </td>
                        <td class="py-3 px-4 text-center">
                            <a href="pengumuman/form.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-outline-primary rounded-0"><i class="fa-solid fa-pen"></i></a>
                            <a href="#" onclick="konfirmasiHapus(event, 'pengumuman/hapus.php?id=<?= $row['id']; ?>')" class="btn btn-sm btn-outline-danger rounded-0"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endwhile; else: ?>
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">
                            <i class="fa-solid fa-bullhorn fa-3x mb-3" style="color: var(--g-100);"></i>
                            <p class="mb-0">Belum ada data pengumuman.</p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once 'includes/footer.php'; ?>