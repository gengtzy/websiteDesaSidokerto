<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Edit Pemerintahan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <?php include '../navbar.php';?>
        <div class="card mx-auto my-5 row col-9" style="border-color: black;">
            <div class="col-12 py-3">
                <h3>Edit Pemerintahan</h3>
                <?php
                    $servername = "localhost"; 
                    $username = "root"; 
                    $password = ""; 
                    $database = "desa"; 

                    $koneksi = new mysqli($servername, $username, $password, $database);

                    if ($koneksi->connect_error) {
                        die("Koneksi gagal: " . $koneksi->connect_error);
                    }

                    // Handle form submission
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $id = $_POST['id'];
                        $nama = $_POST['nama'];
                        $jabatan = $_POST['jabatan'];
                        $nip = $_POST['nip'];

                        // Check if a file was uploaded
                        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
                            $gambar_tmp = $_FILES['gambar']['tmp_name'];    
                            $gambar_name = $_FILES['gambar']['name'];
                            move_uploaded_file($gambar_tmp, "../../uploads/" . $gambar_name);

                            // Update the database with the new information including the image path
                            $query = "UPDATE pemerintahan SET nama='$nama', jabatan='$jabatan', nip='$nip', gambar='$gambar_name' WHERE id=$id";
                        } else {
                            // Update the database without changing the image
                            $query = "UPDATE pemerintahan SET nama='$nama', jabatan='$jabatan', nip='$nip' WHERE id=$id";
                        }

                        if (mysqli_query($koneksi, $query)) {
                            echo '<div class="alert alert-success mt-4">Data berhasil diupdate.</div>';
                        } else {
                            echo "Error updating berita: " . mysqli_error($koneksi);
                        }
                    }

                   // Ambil data berita dari database berdasarkan ID yang ingin di-edit
                    $id = isset($_GET['id']) ? $_GET['id'] : null;
                    if (empty($id)) {
                        // Tangani kasus di mana id tidak diberikan dalam URL
                        // Redirect atau tampilkan pesan kesalahan
                        die("");
                    }
                    // Lakukan query database untuk mendapatkan data berita berdasarkan ID
                    $query = "SELECT * FROM pemerintahan WHERE id = $id";
                    $result = mysqli_query($koneksi, $query);
                    $berita = mysqli_fetch_assoc($result);

                ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $berita['id']; ?>">
                    <label for="nama">nama:</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo $berita['nama']; ?>" required>

                    <label for="Jabatan">Jabatan:</label>
                    <textarea name="jabatan" class="form-control" required><?php echo $berita['jabatan']; ?></textarea>

                    <label for="gambar">Gambar:</label>
                    <input type="file" name="gambar" class="form-control" accept="image/*">

                    <label for="nip">nip:</label>
                    <input type="text" name="nip" class="form-control" value="<?php echo $berita['nip']; ?>" required>

                    <button type="submit" class="btn btn-primary mt-3">Update Pemerintahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
