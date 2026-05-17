<?php
require_once '../includes/header.php';

// Deteksi Mode: Tambah atau Edit
$id = $_GET['id'] ?? null;
$mode = $id ? 'Edit' : 'Tambah';
$data = ['judul' => '', 'isi' => '', 'gambar' => ''];

// Jika Edit, tarik data lama
if ($id) {
    $res = $conn->query("SELECT * FROM berita WHERE id = " . intval($id));
    if ($res && $res->num_rows > 0) $data = $res->fetch_assoc();
}

// Proses form saat disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $conn->real_escape_string($_POST['judul']);
    $isi = $conn->real_escape_string($_POST['isi']);
    $gambar_baru = $data['gambar']; // Default pakai gambar lama
    
    // Jika upload gambar baru
    if (!empty($_FILES['gambar']['name'])) {
        $gambar_baru = time() . '_' . str_replace(" ", "_", $_FILES['gambar']['name']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], '../../uploads/' . $gambar_baru);
        
        // Hapus file lama jika ada (agar folder tidak penuh sampah)
        if ($id && !empty($data['gambar']) && file_exists('../../uploads/' . $data['gambar'])) {
            unlink('../../uploads/' . $data['gambar']);
        }
    }

    if ($id) {
        $conn->query("UPDATE berita SET judul='$judul', isi='$isi', gambar='$gambar_baru' WHERE id=$id");
    } else {
        $conn->query("INSERT INTO berita (judul, isi, gambar) VALUES ('$judul', '$isi', '$gambar_baru')");
    }
    echo "<script>window.location='../berita.php?pesan=Data berita berhasil disimpan!';</script>";
    exit;
}
?>

<div class="mb-4">
    <a href="../berita.php" class="text-decoration-none fw-bold" style="color: var(--g-700);">&larr; Kembali</a>
    <h3 class="fw-bold mt-2 text-uppercase"><?= $mode ?> Berita</h3>
</div>

<div class="flat-card p-4">
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label fw-bold">Judul Berita</label>
            <input type="text" name="judul" class="form-control rounded-0 border-dark" value="<?= htmlspecialchars($data['judul']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Isi Berita</label>
            <textarea name="isi" class="form-control rounded-0 border-dark" rows="8" required><?= htmlspecialchars($data['isi']) ?></textarea>
        </div>
        <div class="mb-4">
            <label class="form-label fw-bold">Upload Gambar Utama <?= $id ? '(Kosongkan jika tidak ingin mengubah)' : '' ?></label>
            <input type="file" name="gambar" class="form-control rounded-0 border-dark" accept="image/*" <?= $id ? '' : 'required' ?>>
        </div>
        <button type="submit" class="btn btn-mono px-5 py-2">Simpan Berita</button>
    </form>
</div>
<?php require_once '../includes/footer.php'; ?>