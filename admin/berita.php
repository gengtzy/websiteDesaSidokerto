<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <?php include 'navbar.php';?>
        <div class="card mx-auto my-5 row col-9" style="border-color: black;">
            <div class="col-12 py-3 row">
                <span class="fw-bold fs-3">Data Berita</span>
                <a class="col-3" href="berita/tambahBerita.php">
                    <button type="button" class="btn btn-primary mt-3" style="width: 100%;">Tambah Berita</button>
                </a>
            </div>
            <div class="col-12 py-3 table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul</th>
                            <th scope="col">isi</th>
                            <th scope="col">gambar</th>
                            <th scope="col">link</th>
                            <th scope="col">button</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once ("../koneksi.php");

                        $query = "SELECT * FROM berita";
                        $result = $conn->query($query);
                        if ($result->num_rows > 0) {
                            // Fetch data from the result set
                            $index = 1;
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td class=""><?php echo $index; ?></td>
                                    <td class=""><?php echo $row["judul"]; ?></td>
                                    <td class=""><?php echo substr ($row["isi"],0,200 )?></td>
                                    <td class=""><?php echo $row["gambar"]; ?></td>
                                    <td class=""><?php echo $row["link"]; ?></td>
                                    <td class="d-flex text-center">
                                    <a class="col-6 mx-auto" href="berita/editBerita.php?id=<?php echo $row['id']; ?>">
                                        <button type="button" class="btn btn-secondary btn-md" style="width: 100%;">Edit</button>
                                    </a>
                                    <a  class="col-5 mx-auto" href="berita/hapusBerita.php?id=<?php echo $row["id"] ?>"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">
                                        <button type="button" class="btn btn-primary btn-md" style="width: 100%;">Hapus</button>
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
