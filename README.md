# 🏛️ Sistem Informasi Desa Sidokerto (Dynamic Version)

Sistem Informasi Desa terpadu yang dirancang untuk memfasilitasi transparansi publik dan digitalisasi tata kelola desa. Proyek ini dibangun menggunakan **PHP Native & MySQL** dengan arsitektur terpusat, dilengkapi dengan Admin Panel (CMS) untuk manajemen konten yang mudah dan aman.

## ✨ Fitur Utama

### 🌐 Frontend (Portal Publik)
* **Desain Modern & Responsif:** Menggunakan gaya *Monochromatic Green (Flat Design)* yang elegan dan formal.
* **Informasi Publik:** Menyajikan Profil Desa, Struktur Pemerintahan, Demografi Penduduk, dan Arsip Berita/Pengumuman.
* **Keamanan Terjaga:** Proteksi XSS pada tampilan data dan sanitasi *input*.

### 🔐 Backend (Admin Panel / CMS)
* **Sistem Autentikasi:** Login aman dengan enkripsi *password* (MD5) dan manajemen *Session*.
* **Manajemen Terpusat (CRUD):** * Kelola Berita & Publikasi (dengan fitur *upload* gambar).
    * Kelola Data Aparatur Desa.
    * Kelola Statistik Data Penduduk per Wilayah.
    * Kelola Papan Pengumuman Instan.
* **Smart Form Engine:** Penggabungan form *Tambah* dan *Edit* dalam satu file pintar untuk efisiensi kode.
* **Interactive UX:** Integrasi **SweetAlert2** untuk konfirmasi penghapusan data secara aman dan interaktif.

## 💻 Tech Stack
* **Language:** PHP 8.x, JavaScript, HTML5, CSS3
* **Database:** MySQL
* **Framework/Library:** Bootstrap 5, FontAwesome 6, SweetAlert2
* **Architecture:** Modular Native PHP (Pisah Logic & View)

## 🚀 Panduan Instalasi (Local Development)

1.  **Clone Repository:**
    ```bash
    git clone [https://github.com/agengpuji/sidokerto.git](https://github.com/agengpuji/sidokerto.git)
    cd sidokerto
    ```
2.  **Konfigurasi Database:**
    * Buat database baru di phpMyAdmin/HeidiSQL dengan nama `desa_sidokerto`.
    * *Import* file `.sql` (jika tersedia) atau jalankan *query* tabel yang ada pada *source code*.
3.  **Konfigurasi Sistem:**
    * Buka file `config/database.php`.
    * Sesuaikan kredensial *database* (`DB_USER`, `DB_PASS`, `DB_NAME`).
    * Sesuaikan `BASE_URL` dengan direktori lokal kamu (contoh: `http://localhost/sidokerto`).
4.  **Akses Admin Panel:**
    * URL: `http://localhost/sidokerto/login/login.php`
    * Default Username: `admin`
    * Default Password: `admin123`

---
*Developed by [Ageng Puji Pangestu](https://github.com/agengpuji)*
