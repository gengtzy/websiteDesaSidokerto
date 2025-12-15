

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Tambah Pengumuman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php include '../navbar.php';?>
            <div class="card mx-auto my-5 row col-9" style="border-color: black;">
                <div class="col-12 py-3">
                    <h2 class="mb-4">Tambah Berita</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <?php
                        // Include file koneksi.php untuk menghubungkan ke database
                        require_once("../koneksi.php");

                        // Inisialisasi variabel untuk menyimpan pesan kesalahan
                        $pesan_error = '';

                        // Check jika form telah disubmit
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            // Ambil data dari form
                            $judul = $_POST["judul"];
                            $isi = $_POST["isi"];
                            $link = $_POST["link"];

                            // Proses unggah gambar
                            $gambar = $_FILES['gambar']['name'];
                            $gambar_temp = $_FILES['gambar']['tmp_name'];
                            $gambar_type = $_FILES['gambar']['type'];
                            $gambar_size = $_FILES['gambar']['size'];

                            // Lokasi folder untuk menyimpan gambar yang diunggah
                            $folder_upload = "../../uploads/";

                            // Buat nama unik untuk gambar
                            $gambar_unik = uniqid() . '_' . $gambar;

                            // Path lengkap untuk menyimpan gambar
                            $path_gambar = $folder_upload . $gambar_unik;

                            // Izinkan jenis file gambar tertentu (misalnya, jpeg, png)
                            $jenis_file = pathinfo($path_gambar, PATHINFO_EXTENSION);

                            // Mengecek apakah file adalah gambar valid
                            if (getimagesize($gambar_temp) === false) {
                                $pesan_error = "File yang diunggah bukan gambar.";
                            } elseif ($jenis_file != "jpg" && $jenis_file != "png" && $jenis_file != "jpeg") {
                                $pesan_error = "Hanya file gambar JPG, JPEG, dan PNG yang diizinkan.";
                            } elseif ($gambar_size > 5242880) { // Batas ukuran gambar (5MB)
                                $pesan_error = "Ukuran file gambar terlalu besar. Maksimum 5MB.";
                            } else {
                                // Pindahkan file gambar dari temporary ke folder upload
                                if (move_uploaded_file($gambar_temp, $path_gambar)) {
                                    // Query untuk menyimpan data ke dalam tabel pengumuman
                                    $query = "INSERT INTO berita (judul, isi, gambar, link) VALUES ('$judul', '$isi', '$gambar_unik', '$link')";

                                    // Eksekusi query
                                    if ($conn->query($query) === TRUE) {
                                        echo '<div class="alert alert-success mt-4">Data berhasil ditambah.</div>';
                                    } else {
                                        $pesan_error = "Error: " . $query . "<br>" . $conn->error;
                                    }
                                    } else {
                                    $pesan_error = "Terjadi kesalahan saat mengunggah gambar.";
                                    }
                                    
                            }

                            // Tutup koneksi database
                            $conn->close();
                        }
                    ?>
                        <!-- Form input fields for judul, isi, gambar, link -->
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </div>
                        <div class="mb-3">
                            <label for="isi" class="form-label">Isi</label>
                            <textarea class="form-control" id="isi" name="isi" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
                        </div>
                        <div class="mb-3">
                            <label for="link" class="form-label">Link</label>
                            <input type="text" class="form-control" id="link" name="link" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    <?php
                        // Menampilkan pesan error jika ada
                        if ($pesan_error !== '') {
                            echo '<div class="alert alert-danger mt-3" role="alert">' . $pesan_error . '</div>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
