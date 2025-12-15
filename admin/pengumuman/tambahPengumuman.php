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
                <div class="col-12 py-3 row">
                    <div class="container">
                        <h2 >Formulir Agenda</h2>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mt-4">
                            <div class="form-group">
                                <label for="judul">Judul Acara:</label>
                                <input type="text" class="form-control" id="judul" name="judul" required>
                            </div>

                            <div class="form-group">
                                <label for="tanggal">Tanggal:</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            </div>

                            <div class="form-group">
                                <label for="lokasi">Lokasi Acara:</label>
                                <input type="text" class="form-control" id="lokasi" name="lokasi" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                        <?php
                        // Jika formulir telah disubmit
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            // Konfigurasi koneksi ke database
                            $servername = "localhost"; 
                            $username = "root"; 
                            $password = ""; 
                            $database = "desa"; 

                            $conn = new mysqli($servername, $username, $password, $database);

                            // Memeriksa koneksi
                            if ($conn->connect_error) {
                                die("Koneksi gagal: " . $conn->connect_error);
                            }

                            // Mengambil data dari formulir
                            $judul = $_POST['judul'];
                            $tanggal = $_POST['tanggal'];
                            $lokasi = $_POST['lokasi'];

                            // SQL INSERT untuk menyisipkan data ke dalam tabel "agenda"
                            $sql = "INSERT INTO agenda (judul, tanggal, lokasi) VALUES ('$judul', '$tanggal', '$lokasi')";

                            if ($conn->query($sql) === TRUE) {
                                echo '<div class="alert alert-success mt-4">Data berhasil disisipkan ke dalam tabel agenda</div>';
                            } else {
                                echo '<div class="alert alert-danger mt-4">Error: ' . $sql . '<br>' . $conn->error . '</div>';
                            }

                            // Menutup koneksi ke database
                            $conn->close();
                        }
                        ?>
                    </div>
        </div>
    </div>
    </body>
    </html>