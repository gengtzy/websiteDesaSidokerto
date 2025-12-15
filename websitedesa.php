<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>website desa</title>
    <link rel="stylesheet" href="cssdesa.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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


  <!-- hero section start -->
  <section class="hero">
    
    <main class="isi">
      <h2>Selamat datang di </h2>
      <h2>website informasi</h2>
      <h1>Desa Sidokerto </h1>
      <p>kec.buduran,kab.<br>Sidoarjo</p>
    </main>

  </section>
  <!-- her0 section end -->

  <div class="row" style="padding: 20px;">
    <div class="col-8">
    <h1>Berita Terkini</h1>
      <hr>
      <?php   
        require_once ("koneksi.php");

        $query = "SELECT * FROM berita ORDER BY id DESC LIMIT 2";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            // Fetch data from the result set
            $index = 1;
            while ($row = $result->fetch_assoc()) {
            ?>
      <div class="row">
      <div class="card mb-3 border-0" style="width: 100%;">
        <div class="row g-0">
          <div class="col-md-4">
            <?php echo "<img src='uploads/" . $row['gambar'] . "' class='img-fluid rounded-start gambar-berita'>"; ?>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row["judul"]; ?></h5>
              <p class="card-text"><?php echo substr ($row["isi"], 0,200) ?>....</p>
              <a href="halberita.php?id=<?php echo $row['id'];?>">
              <p class="card-text"><small class="text-body-secondary">Baca Selengkapnya</small></p>
              </a>
            </div>
          </div>
        </div>
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
    </div>
    <div class="col">
      <h1>Agenda Kegiatan</h1>
      <hr>
      <?php   
        require_once ("koneksi.php");

        $query = "SELECT * FROM agenda ORDER BY id DESC LIMIT 2";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            // Fetch data from the result set
            $index = 1;
            while ($row = $result->fetch_assoc()) {
            ?>
              <div class="agenda">
                <div class="date">
                  <p>
                    <?php echo $row["tanggal"]; ?>
                  </p>
                </div>
                <div class="atas">
                  <h2><?php echo $row["judul"]; ?></h2>
                  <p class="disini"><?php echo $row["lokasi"]; ?></p>
                </div>
              </div>
              <div class="separator"></div>
            <?php
            $index++;
            }
        } else {
            echo "No records found";
        }
      ?>
    </div>
</div>





  <!-- untuk section -->
    <main>
        <p class="lokasi">Lokasi</p>
              <hr/>
              <div class="content">
                <div class="">
                  <!-- Peta Google Maps akan ditampilkan di sini -->
                  <div class="gmap_canvas">
                    <iframe
                      src="https://maps.google.com/maps?q=sidokerto&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                      frameborder="0"
                      scrolling="no"
                      style="width: 700px; height: 400px; padding-left: 30px;"
                    ></iframe>
                  </div>
                </div>
                <div class="detail">
                  <h2>Detail Lokasi</h2>
                  <!-- <ul>
                    <li class="grip"><strong>Kode PUM </strong>:3217082001</li>
                    <li><strong>Tahun Pembentukan:</strong> 1966</li>
                    <li><strong>Dasar Hukum:</strong> 141.1/KEP.18-PEM/1966</li>
                    <li><strong>Tipologi:</strong> PERINDUSTRIAN/JASA</li>
                    <li><strong>Klasifikasi:</strong> SWAKARYA</li>
                    <li><strong>Kategori:</strong> MULA</li>
                    <li><strong>Luas Wilayah:</strong> 305.28 ha</li>
                  </ul> -->
                  <div class="grid-container">
                    <div class="grid-item">Kode PUM</div>
                    <div class="grid-item">: 3217082001</div>
                    <div class="grid-item">Tahun Pembentukan</div>
                    <div class="grid-item">: 1966</div>
                    <div class="grid-item">Dasar Hukum</div>
                    <div class="grid-item">: 141.1/KEP.18-PEM/1966</div>
                    <div class="grid-item">Tipologi</div>
                    <div class="grid-item">: PERINDUSTRIAN/JASA</div>
                    <div class="grid-item">Klasifikasi</div>
                    <div class="grid-item">: SWAKARYA</div>
                    <div class="grid-item">Kategori</div>
                    <div class="grid-item">: MULA</div>
                    <div class="grid-item">Luas Wilayah</div>
                    <div class="grid-item">: 305.28 ha</div>
                  </div>
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