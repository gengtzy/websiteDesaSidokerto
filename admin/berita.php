<?php
require_once 'includes/header.php';
$result = $conn->query("SELECT * FROM berita ORDER BY id DESC");
?>

<div class="d-flex justify-content-between align-items-center mb-4 pb-3" style="border-bottom: 2px solid var(--g-100);">
    <div>
        <h3 class="fw-bold mb-0 text-uppercase" style="color: var(--g-900);">Daftar Berita</h3>
    </div>
    <!-- Tombol menuju Form Pintar (Mode Tambah) -->
    <a href="berita/form.php" class="btn btn-mono"><i class="fa-solid fa-plus me-2"></i> Tulis Berita</a>
</div>

<!-- Notifikasi SweetAlert jika berhasil -->
<?php if(isset($_GET['pesan'])): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({ icon: 'success', title: 'Berhasil!', text: '<?= htmlspecialchars($_GET['pesan']) ?>', confirmButtonColor: '#047857' });
        });
    </script>
<?php endif; ?>

<div class="flat-card p-0 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover mb-0 align-middle">
            <thead style="background-color: var(--g-900); color: var(--g-50);">
                <tr>
                    <th class="py-3 px-4">No</th><th class="py-3 px-4">Gambar</th><th class="py-3 px-4">Judul</th><th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result && $result->num_rows > 0): $no=1; while ($row = $result->fetch_assoc()): ?>
                    <tr style="border-bottom: 1px solid var(--g-100);">
                        <td class="py-3 px-4 fw-bold text-muted"><?= $no++; ?></td>
                        <td class="py-3 px-4">
                            <img src="<?= BASE_URL ?>/uploads/<?= $row['gambar'] ?>" alt="Thumb" style="width: 80px; height: 50px; object-fit: cover; border: 2px solid var(--g-500);">
                        </td>
                        <td class="py-3 px-4 fw-semibold"><?= htmlspecialchars($row['judul']); ?></td>
                        <td class="py-3 px-4 text-center">
                            <!-- Tombol Edit (Mode Edit) -->
                            <a href="berita/form.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-outline-primary rounded-0"><i class="fa-solid fa-pen-to-square"></i></a>
                            <!-- Trigger Pop-up SweetAlert -->
                            <a href="#" onclick="konfirmasiHapus(event, 'berita/hapus.php?id=<?= $row['id']; ?>')" class="btn btn-sm btn-outline-danger rounded-0"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                <?php endwhile; else: ?>
                    <tr><td colspan="4" class="text-center py-4">Belum ada berita.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once 'includes/footer.php'; ?>