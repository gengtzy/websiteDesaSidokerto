<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profil desa</title>
    <link rel="stylesheet" href="Pemerintahancss.css">
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
    <!-- untuk isi -->
    <main>
        <div class="side">
            <ul>
                <li><a href="#Organisasi">Struktur Organisasi</a></li>
                <hr>
                <li><a href="#Kepaladesa">Kepala Desa</a></li>
                <hr>
                <li><a href="#badan">Bada Permusyawaratan</a></li>
                <hr>
                <li><a href="#sekretaris">Seketaris Desa</a></li>
                <hr>
            </ul>
        </div>
        <div class="isi">
            <h2 id="Organisasi">Struktur Organisasi</h2>
            <hr class="garis">
            <img src="https://asset.kompas.com/crops/7fAEg0knuiNvwiSEWFgv9UxOKCc=/0x48:1024x730/750x500/data/photo/2022/06/04/629b54ac4d4ba.png" alt="">  
            <h2 id="Kepaladesa">Kepala Desa</h2>
            <hr class="garis"> 
            <div class="tulisan"> 
            <?php
            require_once ("koneksi.php");

            $query = "SELECT * FROM pemerintahan WHERE jabatan='kepala desa'";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                // Fetch data from the result set
                $index = 1;
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="grid-container">
                        <div class="grid-item">Nama</div>
                        <div class="grid-item">: <?php echo ucwords($row["nama"]); ?></div>
                    </div>
                    <hr>
                    <div class="grid-container">
                        <div class="grid-item">Jabatan</div>
                        <div class="grid-item">: <?php echo ucwords($row["jabatan"]); ?></div>
                    </div>
                    <hr>
                    <div class="grid-container">
                        <div class="grid-item">NIP</div>
                        <div class="grid-item">: <?php echo ucwords($row["nip"]); ?></div>
                    </div>
                    <div class="teks">
                        <p>Badan Permusyawaratan Desa (BPD) dalam Permendagri No.110/2016 Tugas Badan Permusyawaratan Desa (BPD) mempunyai fungsi, membahas dan</p>
                        <p>menyepakati Rancangan Peraturan Desa bersama Kepala Desa, menampung dan menyalurkan aspirasi masyarakat Desa, dan melakukan pengawasan kinerja</p>
                        <p> Selain melaksanakan fungsi diatas, Badan Permusyawaratan Desa juga mempunyai tugas sebagai berikut. Tugas Badan Permusyawaratan Desa:</p>
                        <p>1.Menggali aspirasi masyarakat</p>
                        <p>2.Menampung aspirasi masyarakat</p>
                        <p>3.Mengelola aspirasi masyarakat</p>
                        <p>4.Menyalurkan aspirasi masyarakat</p>
                        <p>5.Menyelenggarakan musyawarah Tugas Badan Permusyawaratan Desa (BPD)</p>
                        <p>6.Menyelenggarakan musyawarah Desa</p>
                        <p>7.Membentuk panitia pemilihan Kepala Desa</p>
                        <p>8.Menyelenggarakan musyawarah Desa khusus untuk pemilihan Kepala Desa antarwaktu</p>
                        <p>9.Membahas dan menyepakati rancangan Peraturan Desa bersama Kepala Desa</p>
                        <p>10.Melaksanakan pengawasan terhadap kinerja Kepala Desa</p>
                        <p>11.Melakukan evaluasi laporan keterangan penyelenggaraan Pemerintahan Desa</p>
                        <p>12.Menciptakan hubungan kerja yang harmonis dengan Pemerintah Desa dan lembaga Desa lainnya; dan melaksanakan tugas lain yang diatur dalam ketentuan peraturan perundang-undangan.</p>
                        <!-- <div class="linier"></div> -->
                    </div>
                    <?php
                    $index++;
                }
            } else {
                echo "No records found";
            }
            ?>
            </div>
            <?php
                require_once ("koneksi.php");

                $query = "SELECT * FROM pemerintahan WHERE jabatan='sekretaris'";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    // Fetch data from the result set
                    $index = 1;
                    while ($row = $result->fetch_assoc()) {
            ?>
                    <h2 id="badan">Badan Permusyawaratan</h2>
                    <hr class="garis"> 
                    <div class="tulisan"> 
                    <div class="grid-container">
                        <div class="grid-item">Nama</div>
                        <div class="grid-item">: <?php echo ucwords($row["nama"]); ?></div>
                    </div>
                    <hr>
                    <div class="grid-container">
                        <div class="grid-item">Jabatan</div>
                        <div class="grid-item">: <?php echo ucwords($row["jabatan"]); ?></div>
                    </div>
                    <hr>
                    <div class="grid-container">
                        <div class="grid-item">NIP</div>
                        <div class="grid-item">: <?php echo ucwords($row["nip"]); ?></div>
                    </div>
                    <div class="teks">
                        <p>Sekretaris desa mempunyai tugas sebagai berikut:</p>
                        <p>1.Sekretaris desa/kelurahan berkedudukan sebagai unsur staff yang membantu kepala desa/lurah dalam melaksanakan tugas dan wewenangnya serta memimpin sekretariat desa/lurah.</p>
                        <p> 2.Sekretaris desa/kelurahan mempunyai tugas menjalankan fungsi administrasi kelurahan, pembangunan dan kemasyarakatan.</p>
                        <p>Selain tugas tersebut di atas, seorang Sekretaris Desa harus mampu menjalankan fungsi administrator dengan penuh tanggungjawab. Berikut ini fungsi dari Sekdes, yaitu:</p>
                        <p>1.Sebagai pelaksana urusan surat menyurat, kearsipan dan laporan.</p>
                        <p>2.Sebagai pelaksana urusan keuangan.</p>
                        <p>3.Sebagai pelaksana urusan administrasi pemerintahan, pembangunan, dan kemasyarakatan.</p>
                        <p>Dalam melaksanakan tugas dan fungsinya sekretaris desa/kelurahan akan dibantu oleh Kepala Urusan. Merekalah yang menangani pelayanan ketatausahaan yang baik guna membantu Sekdes, diantaranya sebagai berikut:</p>
                        <p>1.Kepala Urusan Pemerintahan</p>
                        <p>2.Kepala Urusan Pembangunan.</p>
                        <p>3.Kepala Urusan Keuangan</p>
                        <p>4.Kepala Urusan Umum</p>
                    </div>
                <?php
                }
            } else {
                echo "No records found";
            }
            ?>
            </div>
            <?php
                require_once ("koneksi.php");

                $query = "SELECT * FROM pemerintahan WHERE jabatan='badan permusyawaratan'";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    // Fetch data from the result set
                    $index = 1;
                    while ($row = $result->fetch_assoc()) {
            ?>
            <h2 id="sekretaris">Sekretaris Desa</h2>
            <hr class="garis"> 
            <div class="tulisan"> 
                <div class="grid-container">
                    <div class="grid-item">Nama</div>
                    <div class="grid-item">: <?php echo ucwords($row["nama"]); ?></div>
                </div>
                <hr>
                <div class="grid-container">
                    <div class="grid-item">Jabatan</div>
                    <div class="grid-item">: <?php echo ucwords($row["jabatan"]); ?></div>
                </div>
                <hr>
                <div class="grid-container">
                    <div class="grid-item">NIP</div>
                    <div class="grid-item">:<?php echo ucwords($row["nip"]); ?></div>
                </div>
                <div class="teks">
                    <p>Sekretaris desa mempunyai tugas sebagai berikut: </p>
                    <p>1.Sekretaris desa/kelurahan berkedudukan sebagai unsur staff yang membantu kepala desa/lurah dalam melaksanakan tugas dan wewenangnya serta memimpin sekretariat desa/lurah.</p>
                    <p> 2.Sekretaris desa/kelurahan mempunyai tugas menjalankan fungsi administrasi kelurahan, pembangunan dan kemasyarakatan.</p>
                    <p>Selain tugas tersebut di atas, seorang Sekretaris Desa harus mampu menjalankan fungsi administrator dengan penuh tanggungjawab. Berikut ini fungsi dari Sekdes, yaitu:</p>
                    <p>1.Sebagai pelaksana urusan surat menyurat, kearsipan dan laporan.</p>
                    <p>2.Sebagai pelaksana urusan keuangan.</p>
                    <p>3.Sebagai pelaksana urusan administrasi pemerintahan, pembangunan, dan kemasyarakatan.</p>
                    <p>Dalam melaksanakan tugas dan fungsinya sekretaris desa/kelurahan akan dibantu oleh Kepala Urusan. Merekalah yang menangani pelayanan ketatausahaan yang baik guna membantu Sekdes, diantaranya sebagai berikut:</p>
                    <p>1.Kepala Urusan Pemerintahan</p>
                    <p>2.Kepala Urusan Pembangunan.</p>
                    <p>3.Kepala Urusan Keuangan</p>
                    <p>4.Kepala Urusan Umum</p>
                </div>
                <?php
                    $index++;
                }
            } else {
                echo "No records found";
            }
            ?>
            </div>
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