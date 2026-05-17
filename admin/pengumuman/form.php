<?php
require_once '../includes/header.php';

$id = $_GET['id'] ?? null;
$mode = $id ? 'Edit' : 'Tambah';
$data = ['judul' => '', 'isi' => '', 'tanggal' => date('Y-m-d')]; // Default tanggal hari ini

if ($id) {
    $res = $conn->query("SELECT * FROM pengumuman WHERE id = " . intval($id));
    if ($res && $res->num_rows > 0) $data = $res->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $conn->real_escape_string($_POST['judul']);
    $isi = $conn->real_escape_string($_POST['isi']);
    $tanggal = $conn->real_escape_string($_POST['tanggal']);
    
    if ($id) {
        $conn->query("UPDATE pengumuman SET judul='$judul', isi='$isi', tanggal='$tanggal' WHERE id=$id");
    } else {
        $conn->query("INSERT INTO pengumuman (judul, isi, tanggal) VALUES ('$judul', '$isi', '$tanggal')");
    }
    echo "<script>window.location='../pengumuman.php?pesan=Pengumuman berhasil disiarkan!';</script>";
    exit;
}
?>

<div class="mb-4">
    <a href="../pengumuman.php" class="text-decoration-none fw-bold" style="color: var(--g-700);">&larr; Kembali</a>
    <h3 class="fw-bold mt-2 text-uppercase"><?= $mode ?> Pengumuman</h3>
</div>

<div class="flat-card p-4">
    <form method="post">
        <div class="row">
            <div class="col-md-8 mb-3">
                <label class="form-label fw-bold">Judul Pengumuman</label>
                <input type="text" name="judul" class="form-control rounded-0 border-dark" value="<?= htmlspecialchars($data['judul']) ?>" required>
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label fw-bold">Tanggal Diterbitkan</label>
                <input type="date" name="tanggal" class="form-control rounded-0 border-dark" value="<?= $data['tanggal'] ?>" required>
            </div>
        </div>
        <div class="mb-4">
            <label class="form-label fw-bold">Isi Pengumuman</label>
            <textarea name="isi" class="form-control rounded-0 border-dark" rows="5" required><?= htmlspecialchars($data['isi']) ?></textarea>
        </div>
        <button type="submit" class="btn btn-mono px-5 py-2">
            <i class="fa-solid fa-paper-plane me-2"></i> Simpan & Siarkan
        </button>
    </form>
</div>
<?php require_once '../includes/footer.php'; ?>