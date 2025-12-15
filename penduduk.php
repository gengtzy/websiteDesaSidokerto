<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>penduduk</title>
    <link rel="stylesheet" href="penduduk.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Romanesco&display=swap" rel="stylesheet">
</head>
<body>
    <!-- untuk header -->
    <header>
        <div>
            <nav class="navbar">
                <a href=""><img src="img\sidoarjo.png" alt="" class="logo"></a>
                <span class="navbar-text">Desa sidokerto <br>Kabupaten Sidoarjo</span>
                <ul class="nav-list">
                    <li><a href="websitedesa.php">Beranda</a></li>
                    <li><a href="profildesa.php">Profil Desa</a></li>
                    <li><a href="Pemerintahan.php">Pemerintahan</a></li>
                    <li><a href="penduduk.php">Data Desa</a></li>
                    <li><a href="berita.php">berita</a></li>
                    <li><a href="login/login.php">Login</a></li>
                </ul>
            </nav>  
        </div>

    <!-- untuk isi -->
    <div class="selamat">
        <h1>Selamat Datang di Desa Sidokerto</h1>
    </div>

    <!-- untuk data -->
    <main>
        <div class="list">
            <div class="list-penduduk" onclick="">
                <h3>Static penduduk</h3>
            </div>
        </div>
        <div class="div-table">
            <div>
                <h2>Tabel Populasi Per Wilayah</h2>
                <p>Desa Sidokerto</p>
            </div>
            <table>
                <tr>
                    <th>no</th>
                    <th>Wilayah/daerah</th>
                    <th>KK</th>
                    <th>L+P</th>
                    <th>L</th>
                    <th>P</th>
                </tr>
                <?php
                    require_once ("koneksi.php");

                    $query = "SELECT * FROM penduduk";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0) {
                        // Fetch data from the result set
                        $index = 1;
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td class="error"><?php echo $index; ?></td>
                                <td class="error"><?php echo $row["wilayah"]; ?></td>
                                <td class="error"><?php echo $row["kartu_keluarga"]; ?></td>
                                <td class="error"><?php echo $row["laki"] + $row["perempuan"]; ?></td>
                                <td class="error"><?php echo $row["laki"]; ?></td>
                                <td class="error"><?php echo $row["perempuan"]; ?></td>
                            </tr>
                        <?php
                        $index++;
                        }
                    } else {
                        echo "No records found";
                    }
                    ?>
            </table>
        </div>
    </main>
    
    <!-- untuk footer -->
   <!-- untuk footer -->
  <footer>
        <div class="container-footer-all">
            <div class="container-body">
                <div class="colum1">
                    <h1>Profile</h1>
                    <p>Desa Sidokerto - Buduran
                    Kabupaten Sidoarjo - Jawa Timur
                    Website desa dibangun sebagai bagian dari SISTEM INFORMASI DESA yang berfungsi sebagai portal 
                    informasi, transparansi, dan sosialisasi pemerintah terkait tata kelola pembangunan kawasan 
                    perdesaan (pembangunan, pembinaan dan pemberdayaan) yang dirasakan langsung oleh 
                    masyarakat sebagai penerima manfaat.</p>
                </div>
                <div class="colum2">
                    <h1>Media Sosial</h1>
                    <div class="row">
                        <img src="img/logo_instagram.png">
                        <a href="https://www.youtube.com/">mahdavikiaivan</a>
                    </div>
                    <div class="row">
                        <img src="img/logo_instagram.png">
                         <a href="https://www.youtube.com/">mahdavikiaivan</a>   
                    </div>
                    <div class="row">
                        <img src="img/logo_instagram.png">
                        <a href="https://www.youtube.com/">mahdavikiaivan</a>   
                    </div>
                    <div class="row">
                        <img src="img/logo_instagram.png">
                        <a href="https://www.youtube.com/">mahdavikiaivan</a>   
                    </div>
                </div>
                <div class="colum3">
                    <h1>Kontak Kami</h1>
                    <div class="row2">
                        <img src="img/icons8-location-48.png">
                        <label>Jl. Kesatrian No. 42 Sidokerto. Kode Pos 61252</label>
                    </div>
                    <div class="row2">
                        <img src="img/icons8-call-48.png">
                        <label>0813-3387-0598</label>
                    </div>
                    <div class="row2">
                        <img src="img/icons8-email-48 (1).png">
                        <label>polije.ac.id</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-footer">
            <div class="footer">  
              <p> 2020-2023 © Kementerian Komunikasi dan Informatika RI. </p>
            </div>
        </div>
    </footer>
</body>
</html>