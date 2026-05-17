<?php
require_once 'includes/header.php';
$result = $conn->query("SELECT * FROM pemerintahan ORDER BY id ASC");
?>
<div class="d-flex justify-content-between align-items-center mb-4 pb-3" style="border-bottom: 2px solid var(--g-100);">
    <h3 class="fw-bold mb-0 text-uppercase" style="color: var(--g-900);">Aparatur Desa</h3>
    <a href="pemerintahan/form.php" class="btn btn-mono"><i class="fa-solid fa-plus me-2"></i> Tambah Pejabat</a>
</div>

<?php if(isset($_GET['pesan'])): ?>
    <script> document.addEventListener("DOMContentLoaded", function() { Swal.fire({ icon: 'success', title: 'Berhasil!', text: '<?= htmlspecialchars($_GET['pesan']) ?>', confirmButtonColor: '#047857' }); }); </script>
<?php endif; ?>

<div class="flat-card p-0 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover mb-0 align-middle">
            <thead style="background-color: var(--g-900); color: var(--g-50);">
                <tr><th class="py-3 px-4">Foto</th><th class="py-3 px-4">Nama</th><th class="py-3 px-4">Jabatan</th><th class="py-3 px-4">NIP</th><th class="py-3 px-4 text-center">Aksi</th></tr>
            </thead>
            <tbody>
                <?php if ($result && $result->num_rows > 0): while ($row = $result->fetch_assoc()): ?>
                    <tr style="border-bottom: 1px solid var(--g-100);">
                        <td class="py-3 px-4"><img src="<?= BASE_URL ?>/uploads/<?= $row['gambar'] ?>" style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%; border: 2px solid var(--g-500);"></td>
                        <td class="py-3 px-4 fw-bold"><?= htmlspecialchars($row['nama']); ?></td>
                        <td class="py-3 px-4 text-uppercase"><span class="badge bg-success rounded-0"><?= htmlspecialchars($row['jabatan']); ?></span></td>
                        <td class="py-3 px-4"><?= htmlspecialchars($row['nip']); ?></td>
                        <td class="py-3 px-4 text-center">
                            <a href="pemerintahan/form.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-outline-primary rounded-0"><i class="fa-solid fa-pen"></i></a>
                            <a href="#" onclick="konfirmasiHapus(event, 'pemerintahan/hapus.php?id=<?= $row['id']; ?>')" class="btn btn-sm btn-outline-danger rounded-0"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endwhile; else: ?>
                    <tr><td colspan="5" class="text-center py-4">Data pejabat masih kosong.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once 'includes/footer.php'; ?>