<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profil desa</title>
    <link rel="stylesheet" href="cssprofildesa.css">
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
    </header>




    <!-- untuk section -->
    <div class="conten">
        <h2>Tentang Platform Tata kelola Desa</h2>
        <hr>
        <p class="judul">Mewujudkan Modernisasi Tatakelola Desa Melalui Pengembangan Platform Tata Kelola Desa</p>
        <br>
        <p>Maksud Pengembangan PTKD adalah penyediaan media dalam memperoleh, mengelola dan menyajikan data serta informasi desa dan kawasan perdesaan.</p>
        <br>
        <p> Tujuan Pengembangan PTKD adalah : </p>
        <BR>

        <p>1.Meningkatkan kualitas perencanaan dan perumusan kebijakan pembangunan desa dan kawasan </p>
        <br>
        <p>2.Mengefektifkan pelaksanaan kebijakan, program dan kegiatan pembangunan desa dan kawasan perdesaan yang dilakukanoleh Pemerintah Desa.</p>
        <br>
        <p>3.Meningkatkan kualitas pelayanan dan memberikan manfaat yang sebesar-besarnya bagi masyarakat dan pihak yang berkepentingan.</p>
        <br>
        <p>4.Mengukur dan memberikan penilaian secara obyektif terhadap kemajuan dan pencapaian strategi pembangunan didesa dan kawasan perdesaan yang dilakukan oleh Pemerintah Desa.</p>
        <br>
    </div>

    <div class="conten">
        <h2>Kantor</h2>
        <hr>
        <p class="judul">Desa Sidokerto - Sidoarjo - Jawa timur</p>

        <div class="grid-container">
            <div class="grid-item">Alamat </div>
            <div class="grid-item">: Jl. Raya Sidokerto No.17, Sono, Sidokerto, Kec. Buduran, Kabupaten Sidoarjo, Jawa Timur 61252</div>
            <div class="grid-item">Kode pos</div>
            <div class="grid-item">: 61252</div>
            <div class="grid-item">No telepon</div>
            <div class="grid-item">: 0318964484</div>
            <div class="grid-item">Fax</div>
            <div class="grid-item">: N/A</div>
            <div class="grid-item">Email</div>
            <div class="grid-item">: Sidokerto@gmail.com</div>
            <div class="grid-item">Website</div>
            <div class="grid-item">: Sidokerto.ac.id</div>
        </div>
        
    </div>


    <main>
        <?php
            require_once ("koneksi.php");

            $query = "SELECT * FROM pemerintahan WHERE jabatan='kepala desa'";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                // Fetch data from the result set
                $index = 1;
                while ($row = $result->fetch_assoc()) {
        ?>
        <h2>Kepala desa</h2>
        <div class="kepala">
            <?php echo "<img src='uploads/" . $row['gambar'] . "' class='img-fluid rounded-start head'>"; ?>
            <div class="garis"></div>
                <div>
                    <div class="grid-container">
                        <div class="grid-item">Nama </div>
                        <div class="grid-item">: <?php echo ucwords($row["nama"]); ?></div>
                        <div class="grid-item">NIP</div>
                        <div class="grid-item">: <?php echo ucwords($row["nip"]); ?></div>
                        <div class="grid-item">Jabatan</div>
                        <div class="grid-item">: <?php echo ucwords($row["jabatan"]); ?></div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "No records found";
        }
            ?>
        </div>
    </main>




 
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