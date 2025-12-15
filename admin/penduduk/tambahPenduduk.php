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
                        <h2 >Tambah Penduduk</h2>
                        <?php
                        require_once("../koneksi.php");
                        if (isset($_GET['id'])) {
                            $idKartuKeluarga = $_GET['id'];
                            $idKartuKeluarga = mysqli_real_escape_string($conn, $idKartuKeluarga);
                            $query = "SELECT * FROM penduduk WHERE id = '$idKartuKeluarga'";

                            $result = mysqli_query($conn, $query);
                            if ($result) {
                                $data = mysqli_fetch_assoc($result);
                                // Lakukan manipulasi atau tampilkan data jika diperlukan
                            } else {
                                // Penanganan kesalahan jika query gagal dieksekusi
                                echo "Error: " . mysqli_error($conn);
                            }
                            mysqli_free_result($result);
                        }
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $kartuKeluarga = $_POST['kartu_keluarga'];
                            $jumlahLaki = $_POST['jumlah_laki'];
                            $idKartuKeluarga =$_POST['id'];
                            $jumlahPerempuan = $_POST['jumlah_perempuan'];

                            $sql = "UPDATE penduduk SET kartu_keluarga = kartu_keluarga + $kartuKeluarga, laki = laki + $jumlahLaki, perempuan = perempuan + $jumlahPerempuan WHERE id = $idKartuKeluarga";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                echo '<div class="alert alert-success mt-4">Data berhasil diupdate.</div>';
                                echo "<script>setTimeout(window.location='../datapenduduk.php', 100000);</script>";
                            } else {
                                echo "Error: " . mysqli_error($conn);
                            }
                        }
                        ?>
                        <!-- Formulir untuk memasukkan data -->
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <input type="hidden" name="id" value="<?php echo $idKartuKeluarga; ?>">
                            <input type="text" name="kartu_keluarga" placeholder="kartu Keluarga" required>
                            <input type="number" name="jumlah_laki" placeholder="Jumlah Laki-laki" required>
                            <input type="number" name="jumlah_perempuan" placeholder="Jumlah Perempuan" required>
                            <button type="submit">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
