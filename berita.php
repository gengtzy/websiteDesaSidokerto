<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="berita.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Romanesco&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
        </div>`
    </header>
    <!-- untuk header -->
    <div class="selamat">
        <h1>Selamat Datang di Desa Sidokerto</h1>
    </div>
    <!-- untuk isi -->
    
        <?php   
        require_once ("koneksi.php");

        $query = "SELECT * FROM berita ORDER BY id DESC LIMIT 5";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            // Fetch data from the result set
            $index = 1;
            while ($row = $result->fetch_assoc()) {
        ?>
    <div class="row g-0" style="margin-left: 20px; margin-top: 30px; margin-bottom: 20px">
        <div class="col-md-3">
            <?php echo "<img src='uploads/" . $row['gambar'] . "' class='img-fluid rounded-start gambar-berita'>"; ?>
        </div>
        <div class="col-md-8" style="margin-left: 10px ;">
        <div class="card-body">
            <h5 class="card-title"><?php echo $row["judul"]; ?></h5>
            <p class="card-text"><?php echo substr ($row["isi"], 0,400) ?>....</p>
            <a href="halberita.php?id=<?php echo $row['id'];?>">
                <p class="card-text"><small class="text-body-secondary">Baca Selengkapnya</small></p>
            </a>
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



    <!-- untuk isi -->

    
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