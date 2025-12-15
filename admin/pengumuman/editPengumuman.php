<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Update Pengumuman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <?php include '../navbar.php';?>
        <div class="card mx-auto my-5 row col-9" style="border-color: black;">
            <div class="col-12 py-3 row">
                <div class="container">
                    <h2>Formulir Update Agenda</h2>

                    <?php
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

                    // Memeriksa apakah ID pengumuman yang akan diupdate telah diberikan
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];

                        // Query untuk mengambil data pengumuman berdasarkan ID
                        $sql = "SELECT * FROM agenda WHERE id=$id";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $judul = $row['judul'];
                            $tanggal = $row['tanggal'];
                            $lokasi = $row['lokasi'];

                            // Formulir Update
                            echo '<form method="post" action="' . $_SERVER['PHP_SELF'] . '" class="mt-4">';
                            echo '<input type="hidden" name="id" value="' . $id . '">'; // ID pengumuman yang akan diupdate
                            echo '<div class="form-group">';
                            echo '<label for="judul">Judul Acara:</label>';
                            echo '<input type="text" class="form-control" id="judul" name="judul" value="' . $judul . '" required>';
                            echo '</div>';

                            echo '<div class="form-group">';
                            echo '<label for="tanggal">Tanggal:</label>';
                            echo '<input type="date" class="form-control" id="tanggal" name="tanggal" value="' . $tanggal . '" required>';
                            echo '</div>';

                            echo '<div class="form-group">';
                            echo '<label for="lokasi">Lokasi Acara:</label>';
                            echo '<input type="text" class="form-control" id="lokasi" name="lokasi" value="' . $lokasi . '" required>';
                            echo '</div>';

                            echo '<button type="submit" class="btn btn-primary">Update</button>';
                            echo '</form>';
                        } else {
                            echo '<div class="alert alert-danger mt-4">Pengumuman dengan ID ' . $id . ' tidak ditemukan.</div>';
                        }
                    } else {
                        // echo '<div class="alert alert-danger mt-4">ID pengumuman tidak diberikan.</div>';z
                    }

                    // Jika formulir update telah disubmit
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $id = $_POST['id'];
                        $judul = $_POST['judul'];
                        $tanggal = $_POST['tanggal'];
                        $lokasi = $_POST['lokasi'];

                        // SQL UPDATE untuk mengupdate data pengumuman
                        $sql = "UPDATE agenda SET judul='$judul', tanggal='$tanggal', lokasi='$lokasi' WHERE id=$id";

                        if ($conn->query($sql) === TRUE) {
                            echo '<div class="alert alert-success mt-4">Data berhasil diupdate.</div>';
                        } else {
                            echo '<div class="alert alert-danger mt-4">Error: ' . $sql . '<br>' . $conn->error . '</div>';
                        }
                    }

                    // Menutup koneksi ke database
                    $conn->close();
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
