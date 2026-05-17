<!-- FOOTER MODERN & FLAT DESIGN -->
    <footer class="pt-5 pb-3 mt-auto" style="background-color: var(--g-900); color: var(--g-100); border-top: 5px solid var(--g-700);">
        <div class="container">
            <div class="row g-5 mb-4">
                
                <!-- Kolom 1: Profil -->
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-uppercase fw-bold mb-4" style="color: #ffffff; border-bottom: 2px solid var(--g-500); display: inline-block; padding-bottom: 5px;">Profil Desa</h5>
                    <p class="small text-justify" style="line-height: 1.8;">
                        Desa Sidokerto - Buduran, Kabupaten Sidoarjo - Jawa Timur.<br><br>
                        Website desa dibangun sebagai bagian dari Sistem Informasi Desa yang berfungsi sebagai portal informasi, transparansi, dan sosialisasi pemerintah terkait tata kelola pembangunan kawasan perdesaan.
                    </p>
                </div>

                <!-- Kolom 2: Media Sosial -->
                <div class="col-lg-4 col-md-12">
                    <h5 class="text-uppercase fw-bold mb-4" style="color: #ffffff; border-bottom: 2px solid var(--g-500); display: inline-block; padding-bottom: 5px;">Media Sosial</h5>
                    <ul class="list-unstyled d-flex flex-column gap-3 small">
                        <!-- Perbaikan path gambar dengan BASE_URL -->
                        <li class="d-flex align-items-center">
                            <img src="<?= BASE_URL ?>/assets/img/logo_instagram.png" alt="loc" width="24" class="me-3 mt-1">
                            <span style="line-height: 1.5;">sidokerto@gmail.com</span>
                        </li>
                        <!-- <li class="d-flex align-items-center">
                            <img src="<?= BASE_URL ?>/assets/img/icons8-call-48.png" alt="call" width="24" class="me-3">
                            <span>0813-3387-0598</span>
                        </li>
                        <li class="d-flex align-items-center">
                            <img src="<?= BASE_URL ?>/assets/img/icons8-email-48 (1).png" alt="email" width="24" class="me-3">
                            <span>polije.ac.id</span>
                        </li> -->
                    </ul>
                </div>

                <!-- Kolom 3: Kontak -->
                <div class="col-lg-4 col-md-12">
                    <h5 class="text-uppercase fw-bold mb-4" style="color: #ffffff; border-bottom: 2px solid var(--g-500); display: inline-block; padding-bottom: 5px;">Kontak Kami</h5>
                    <ul class="list-unstyled d-flex flex-column gap-3 small">
                        <!-- Perbaikan path gambar dengan BASE_URL -->
                        <li class="d-flex align-items-start">
                            <img src="<?= BASE_URL ?>/assets/img/icons8-location-48.png" alt="loc" width="24" class="me-3 mt-1">
                            <span style="line-height: 1.5;">Jl. Kesatrian No. 42 Sidokerto.<br>Kode Pos 61252</span>
                        </li>
                        <li class="d-flex align-items-center">
                            <img src="<?= BASE_URL ?>/assets/img/icons8-call-48.png" alt="call" width="24" class="me-3">
                            <span>0813-3387-0598</span>
                        </li>
                        <li class="d-flex align-items-center">
                            <img src="<?= BASE_URL ?>/assets/img/icons8-email-48 (1).png" alt="email" width="24" class="me-3">
                            <span>polije.ac.id</span>
                        </li>
                    </ul>
                </div>
                
            </div>
            
            <!-- Copyright Section -->
            <div class="row pt-4 mt-2" style="border-top: 1px solid var(--g-700);">
                <div class="col-12 text-center small" style="color: var(--g-500);">
                    <p class="mb-0">2020-<?= date('Y') ?> &copy; Kementerian Komunikasi dan Informatika RI.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>