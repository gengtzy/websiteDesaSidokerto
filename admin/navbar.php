<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="/tasemester%203/admin/dasboard.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Romanesco&display=swap" rel="stylesheet">
    </head>
    <body>
        <!-- SIDEBAR -->
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-primary">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pt-5 pb-4 mb-md-0 mx-md-auto text-white text-decoration-none logo-admin">
                    <span class="d-none d-sm-inline">Sidokerto</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li>
                        <!-- Menu Dasboard -->
                        <a href="/tasemester%203/admin/dasboard.php" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-white">
                            <i class="fs-4 bi-speedometer2"></i>
                            <?php
                            $url = $_SERVER['REQUEST_URI'];
                            $parts = explode('/', $url);
                            if (end($parts) === 'dasboard.php') {
                            ?>
                                <span class="ms-1 d-none d-sm-inline fw-bold">
                                    Dashboard
                                </span>
                            <?php
                            } else {
                            ?>
                                <span class="ms-1 d-none d-sm-inline">
                                    Dashboard
                                </span>
                            <?php
                            }
                            ?>
                        </a>
                        <!-- Menu Dasboard -->
                    </li>
                    <li>
                        <!-- Menu Berita -->
                        <a href="/tasemester%203/admin/berita.php" class="nav-link px-0 align-middle text-white">
                            <i class="fs-4 bi-speedometer2"></i>
                            <?php
                            $url = $_SERVER['REQUEST_URI'];
                            $parts = explode('/', $url);
                            if (end($parts) === 'berita.php') {
                            ?>
                                <span class="ms-1 d-none d-sm-inline fw-bold">
                                    Berita
                                </span>
                            <?php
                            } else {
                            ?>
                                <span class="ms-1 d-none d-sm-inline">
                                    Berita
                                </span>
                            <?php
                            }
                            ?>
                        </a>
                        <!-- Menu Berita -->
                    </li>
                    </li>
                    <li>
                        <!-- Menu pengumuman -->
                        <a href="/tasemester%203/admin/pengumuman.php" class="nav-link px-0 align-middle text-white">
                            <i class="fs-4 bi-speedometer2"></i>
                            <?php
                            $url = $_SERVER['REQUEST_URI'];
                            $parts = explode('/', $url);
                            if (end($parts) === 'pengumuman.php') {
                            ?>
                                <span class="ms-1 d-none d-sm-inline fw-bold">
                                    Pengumuman
                                </span>
                            <?php
                            } else {
                            ?>
                                <span class="ms-1 d-none d-sm-inline">
                                    Pengumuman
                                </span>
                            <?php
                            }
                            ?>
                        </a>
                        <!-- Menu pengumuman -->
                    </li>
                    <li>
                    <li>
                        <!-- Menu pemerintah -->
                        <a href="/tasemester%203/admin/pemerintah.php" class="nav-link px-0 align-middle text-white">
                            <i class="fs-4 bi-speedometer2"></i>
                            <?php
                            $url = $_SERVER['REQUEST_URI'];
                            $parts = explode('/', $url);
                            if (end($parts) === 'pemerintah.php') {
                            ?>
                                <span class="ms-1 d-none d-sm-inline fw-bold">
                                    pemerintahan
                                </span>
                            <?php
                            } else {
                            ?>
                                <span class="ms-1 d-none d-sm-inline">
                                    pemerintahan
                                </span>
                            <?php
                            }
                            ?>
                        </a>
                        <!-- Menu pemerintah -->
                    </li>
                    <li>
                        <!-- Menu pdata penduduk -->
                        <a href="/tasemester%203/admin/datapenduduk.php" class="nav-link px-0 align-middle text-white">
                            <i class="fs-4 bi-speedometer2"></i>
                            <?php
                            $url = $_SERVER['REQUEST_URI'];
                            $parts = explode('/', $url);
                            if (end($parts) === 'datapenduduk.php') {
                            ?>
                                <span class="ms-1 d-none d-sm-inline fw-bold">
                                    Data Penduduk
                                </span>
                            <?php
                            } else {
                            ?>
                                <span class="ms-1 d-none d-sm-inline">
                                    Data Penduduk
                                </span>
                            <?php
                            }
                            ?>
                        </a>
                        <!-- Menu data penduduk -->
                    </li>
                </ul>
                <hr>
            </div>
        </div>
        <!-- SIDEBAR -->
    </body>
</html>