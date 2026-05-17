<?php
require_once '../includes/header.php';

$id = $_GET['id'] ?? null;
$mode = $id ? 'Edit' : 'Tambah';
$data = ['wilayah' => '', 'kartu_keluarga' => '0', 'laki' => '0', 'perempuan' => '0'];

if ($id) {
    $res = $conn->query("SELECT * FROM penduduk WHERE id = " . intval($id));
    if ($res && $res->num_rows > 0) $data = $res->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $wilayah = $conn->real_escape_string($_POST['wilayah']);
    $kk = intval($_POST['kartu_keluarga']);
    $laki = intval($_POST['laki']);
    $perempuan = intval($_POST['perempuan']);
    
    if ($id) {
        $conn->query("UPDATE penduduk SET wilayah='$wilayah', kartu_keluarga=$kk, laki=$laki, perempuan=$perempuan WHERE id=$id");
    } else {
        $conn->query("INSERT INTO penduduk (wilayah, kartu_keluarga, laki, perempuan) VALUES ('$wilayah', $kk, $laki, $perempuan)");
    }
    echo "<script>window.location='../datapenduduk.php?pesan=Data demografi berhasil disimpan!';</script>";
    exit;
}
?>

<div class="mb-4">
    <a href="../datapenduduk.php" class="text-decoration-none fw-bold" style="color: var(--g-700);">&larr; Kembali</a>
    <h3 class="fw-bold mt-2 text-uppercase"><?= $mode ?> Data Penduduk</h3>
</div>

<div class="flat-card p-4">
    <form method="post">
        <div class="mb-4">
            <label class="form-label fw-bold">Nama Wilayah / Dusun / RW</label>
            <input type="text" name="wilayah" class="form-control rounded-0 border-dark form-control-lg" value="<?= htmlspecialchars($data['wilayah']) ?>" required placeholder="Contoh: Dusun Krajan">
        </div>
        
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <label class="form-label fw-bold" style="color: var(--g-700);">Jumlah Kartu Keluarga (KK)</label>
                <div class="input-group">
                    <span class="input-group-text rounded-0 border-dark bg-light"><i class="fa-solid fa-address-card"></i></span>
                    <input type="number" name="kartu_keluarga" min="0" class="form-control rounded-0 border-dark" value="<?= $data['kartu_keluarga'] ?>" required>
                </div>
            </div>
            <div class="col-md-4">
                <label class="form-label fw-bold" style="color: var(--g-700);">Jumlah Laki-Laki</label>
                <div class="input-group">
                    <span class="input-group-text rounded-0 border-dark bg-light"><i class="fa-solid fa-mars"></i></span>
                    <input type="number" name="laki" min="0" class="form-control rounded-0 border-dark" value="<?= $data['laki'] ?>" required>
                </div>
            </div>
            <div class="col-md-4">
                <label class="form-label fw-bold" style="color: var(--g-700);">Jumlah Perempuan</label>
                <div class="input-group">
                    <span class="input-group-text rounded-0 border-dark bg-light"><i class="fa-solid fa-venus"></i></span>
                    <input type="number" name="perempuan" min="0" class="form-control rounded-0 border-dark" value="<?= $data['perempuan'] ?>" required>
                </div>
            </div>
        </div>
        <hr class="mb-4">
        <button type="submit" class="btn btn-mono px-5 py-2">Simpan Data Penduduk</button>
    </form>
</div>
<?php require_once '../includes/footer.php'; ?>