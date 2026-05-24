# 🏛️ Website Desa Sidokerto (Static & Vercel-Ready)

Versi **statis murni (HTML/CSS/JS)** dari proyek Website Desa Sidokerto. *Branch* ini secara khusus dioptimasi untuk *deployment* super cepat di *platform* *Serverless* seperti **Vercel** atau **GitHub Pages** tanpa memerlukan konfigurasi server maupun *database*.

## ⚡ Mengapa Versi Statis?
Proyek ini di-refactor menjadi statis untuk keperluan *Showcase Portofolio*:
* **100% Uptime & Kecepatan Maksimal:** Tanpa *query database*, halaman dimuat secara instan.
* **Zero-Config Deployment:** Siap di-*hosting* langsung dari *repository* tanpa konfigurasi *backend*.
* **UI/UX Showcase:** Fokus pada presentasi *Frontend Development*, responsivitas Bootstrap 5, dan konsistensi desain *Flat Monochromatic Green*.

## 💡 Fitur Demo
* **Navigasi Penuh:** Seluruh halaman publik (Beranda, Profil, Pemerintahan, Penduduk, Berita) terhubung menggunakan *Relative Path* yang *bulletproof*.
* **Simulasi Panel Admin:** Terdapat halaman Login (`pages/login.html`) yang didesain interaktif dengan SweetAlert2 untuk mendemonstrasikan UI *dashboard* tanpa mengeksekusi *backend logic*.

## 💻 Tech Stack
* HTML5 & CSS3
* Bootstrap 5 (Layouting & Grid System)
* SweetAlert2 (Interactive Pop-ups)
* FontAwesome 6 (Iconography)

## 🚀 Panduan Deployment (Vercel)

Versi ini sangat mudah diluncurkan. Jika kamu menggunakan Vercel CLI:
```bash
# Install Vercel CLI (jika belum)
npm i -g vercel

# Login ke akun Vercel
vercel login

# Deploy ke production
vercel --prod
