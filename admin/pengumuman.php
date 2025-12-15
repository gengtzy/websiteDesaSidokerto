<?php
require_once("../koneksi.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Lakukan query DELETE untuk menghapus data berdasarkan ID
    $query = "DELETE FROM agenda WHERE id = $id";
    if ($conn->query($query) === TRUE) {
        // Berhasil menghapus data
        echo "success";
    } else {
        echo "error";
    }
    exit();  
}
?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin | Dasboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script>
            function hapusPengumuman(id) {
                if (confirm("Anda yakin ingin menghapus pengumuman ini?")) {
                    // Jika pengguna mengonfirmasi penghapusan, kirim permintaan AJAX ke server untuk menghapus data.
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "hapusPengumuman.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            // Tanggapan dari server
                            var response = xhr.responseText;
                            if (response === "success") {
                                // Jika penghapusan berhasil, perbarui halaman tanpa me-refresh
                                location.reload();
                            } else {
                                alert("Gagal menghapus pengumuman.");
                            }
                        }
                    };
                    // Kirim ID pengumuman yang akan dihapus ke server
                    xhr.send("id=" + id);
                }
            }
        </script>
    </head>
    <body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php include 'navbar.php';?>
            <div class="card mx-auto my-5 row col-9" style="border-color: black;">
                <div class="col-12 py-3 row">
                    <span class="fw-bold fs-3">Data Pengumuman</span>
                    <a class="col-3" href="pengumuman/tambahPengumuman.php">
                        <button type="button" class="btn btn-primary mt-3" style="width: 100%;">Tambah Pengumuman</button>
                    </a>
                </div>
                <div class="col-12 py-3 table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Lokasi</th>
                                <th scope="col">Button</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once ("../koneksi.php");

                            $query = "SELECT * FROM agenda";
                            $result = $conn->query($query);
                            if ($result->num_rows > 0) {
                                // Fetch data from the result set
                                $index = 1;
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td class=""><?php echo $index; ?></td>
                                        <td class=""><?php echo $row["judul"]; ?></td>
                                        <td class=""><?php echo $row["tanggal"]; ?></td>
                                        <td class=""><?php echo $row["lokasi"]; ?></td>
                                        <td class="d-flex text-center">
                                        <a class="col-3 mx-auto" href="pengumuman/editPengumuman.php?id=<?php echo $row['id']; ?>">
                                            <button type="button" class="btn btn-secondary btn-md" style="width: 100%;">Edit</button>
                                        </a>
                                        <a class="col-4 mx-auto" href="pengumuman/hapusPengumuman.php?id=<?php echo $row['id']; ?>"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus pengumuman ini?');">
                                            <button type="button" class="btn btn-danger btn-md" style="width: 100%;">Hapus</button>
                                        </a>
                                        </td>
                                    </tr>
                                <?php
                                $index++;
                                }
                            } else {
                                echo "No records found";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>