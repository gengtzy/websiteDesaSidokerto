<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your meta tags and styles -->
    <link rel="stylesheet" href="dasboardUtama.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php include 'navbar.php'; ?>
            <?php 
                require_once("../koneksi.php");
                $query = "SELECT SUM(kartu_keluarga) AS total_kartu_keluarga,SUM(laki) as total_laki, SUM(perempuan) as total_perempuan  FROM penduduk;";
                $query2 = "SELECT COUNT(*) AS total_berita FROM berita";
                $query3 = "SELECT COUNT(*) AS total_agenda FROM agenda";
                    // Eksekusi query
                    $result = mysqli_query($conn, $query);
                    $result2 = mysqli_query($conn, $query2);
                    $result3 = mysqli_query($conn, $query3);

                    // Periksa apakah query berhasil dieksekusi
                    if ($result) {
                        // Ambil hasil query
                        $row = mysqli_fetch_assoc($result);
                        $row2 = mysqli_fetch_assoc($result2);
                        $row3 = mysqli_fetch_assoc($result3);
                        $total_kartu_keluarga = $row['total_kartu_keluarga'];
                        $total_laki = $row['total_laki'];
                        $total_perempuan = $row['total_perempuan'];
                        $total_berita = $row2['total_berita'];
                        $total_agenda = $row3['total_agenda'];

                        // Tampilkan hasil di dalam HTML
                    } else {
                    }
            ?>
            <div class=" mx-auto my-5 row col-9" >
                <div>
                    <div class="col-md-12 text-center mt-3">
                        <h1 class="display-12">Selamat Datang!</h1>
                        <p class="lead">Di Dashboard Admin</p>
                    </div>
                    <div class="info-box mt-5 ml-4">
                        <div class="row mt-5">
                            <div class="col-md-3">
                                <div class="hasil">
                                    <p style="border: 1px solid black; padding: 20px; margin-top:20px; border-radius: 10px;">
                                        <span style="font-size:24px; padding-top: 10px;"><?php echo $total_kartu_keluarga; ?></span> <br>
                                    <span >Total Kartu Keluarga</span> 
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="hasil">
                                    <p style="border: 1px solid black; padding: 20px; margin-top:20px; border-radius: 10px;">
                                        <span style="font-size:24px; padding-top: 10px;"><?php echo $total_laki; ?></span> <br>
                                    <span >Total Perempuan</span> 
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="hasil">
                                    <p style="border: 1px solid black; padding: 20px; margin-top:20px; border-radius: 10px;">
                                        <span style="font-size:24px; padding-top: 10px;"><?php echo $total_perempuan; ?></span> <br>
                                    <span >Total Laki-Laki</span> 
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="hasil">
                                    <p style="border: 1px solid black; padding: 20px; margin-top:20px; border-radius: 10px;">
                                        <span style="font-size:24px; padding-top: 10px;"><?php echo $total_laki + $total_perempuan; ?></span> <br>
                                    <span >Total Penduduk </span> 
                                    </div>
                                    </p>
                            </div>
                            <div class="col-md-6">
                                <div class="hasil">
                                    <p style="border: 1px solid black; padding: 20px; margin-top:20px; border-radius: 10px;">
                                        <span style="font-size:24px; padding-top: 10px;"><?php echo $total_berita; ?></span> <br>
                                    <span >Total Berita </span> 
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6    ">
                                <div class="hasil">
                                    <p style="border: 1px solid black; padding: 20px; margin-top:20px; border-radius: 10px;">
                                        <span style="font-size:24px; padding-top: 10px;"><?php echo $total_agenda; ?></span> <br>
                                    <span >Total Pengumuman</span> 
                                    </p>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <p style="border: 1px solid black; padding: 5px; margin-top:100px">Total Pengumuman: <span><br><?php echo "20"; ?></span></p>
                                <p style="border: 1px solid black; padding: 5px; margin-top:20px">Total Laki-laki: <span><br><?php echo "20"; ?></span></p>
                                <p style="border: 1px solid black; padding: 5px; margin-top:100px">Total Perempuan: <span><br><?php echo "20"; ?></span></p>
                                <p style="border: 1px solid black; padding: 5px; margin-top:100px">Total kartu_keluarga: <span><br><?php echo "20"; ?></span></p>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Your scripts -->
</body>
</html>
