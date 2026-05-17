<?php
require_once '../includes/header.php';

$id = $_GET['id'] ?? null;
$mode = $id ? 'Edit' : 'Tambah';
$data = ['nama' => '', 'nip' => '', 'jabatan' => 'kepala desa', 'gambar' => ''];

if ($id) {
    $res = $conn->query("SELECT * FROM pemerintahan WHERE id = " . intval($id));
    if ($res && $res->num_rows > 0) $data = $res->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $conn->real_escape_string($_POST['nama']);
    $nip = $conn->real_escape_string($_POST['nip']);
    $jabatan = $conn->real_escape_string($_POST['jabatan']);
    $gambar_baru = $data['gambar'];
    
    if (!empty($_FILES['gambar']['name'])) {
        $gambar_baru = time() . '_' . str_replace(" ", "_", $_FILES['gambar']['name']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], '../../uploads/' . $gambar_baru);
        if ($id && !empty($data['gambar']) && file_exists('../../uploads/' . $data['gambar'])) {
            unlink('../../uploads/' . $data['gambar']);
        }
    }

    if ($id) {
        $conn->query("UPDATE pemerintahan SET nama='$nama', nip='$nip', jabatan='$jabatan', gambar='$gambar_baru' WHERE id=$id");
    } else {
        $conn->query("INSERT INTO pemerintahan (nama, nip, jabatan, gambar) VALUES ('$nama', '$nip', '$jabatan', '$gambar_baru')");
    }
    echo "<script>window.location='../pemerintah.php?pesan=Data aparatur berhasil disimpan!';</script>";
    exit;
}
?>
<div class="mb-4"><a href="../pemerintah.php" class="text-decoration-none fw-bold" style="color: var(--g-700);">&larr; Kembali</a><h3 class="fw-bold mt-2 text-uppercase"><?= $mode ?> Pejabat</h3></div>

<div class="flat-card p-4">
    <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Nama Lengkap & Gelar</label>
                <input type="text" name="nama" class="form-control rounded-0 border-dark" value="<?= htmlspecialchars($data['nama']) ?>" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">NIP</label>
                <input type="text" name="nip" class="form-control rounded-0 border-dark" value="<?= htmlspecialchars($data['nip']) ?>" required>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Jabatan / Posisi</label>
            <select name="jabatan" class="form-select rounded-0 border-dark" required>
                <option value="kepala desa" <?= $data['jabatan'] == 'kepala desa' ? 'selected' : '' ?>>Kepala Desa</option>
                <option value="sekretaris" <?= $data['jabatan'] == 'sekretaris' ? 'selected' : '' ?>>Sekretaris Desa</option>
                <option value="badan permusyawaratan" <?= $data['jabatan'] == 'badan permusyawaratan' ? 'selected' : '' ?>>Badan Permusyawaratan (BPD)</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label fw-bold">Upload Foto <?= $id ? '(Kosongkan jika tidak ingin mengubah)' : '' ?></label>
            <input type="file" name="gambar" class="form-control rounded-0 border-dark" accept="image/*" <?= $id ? '' : 'required' ?>>
        </div>
        <button type="submit" class="btn btn-mono px-5 py-2">Simpan Data Pejabat</button>
    </form>
</div>
<?php require_once '../includes/footer.php'; ?>