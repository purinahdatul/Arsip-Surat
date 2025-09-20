
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Aplikasi Arsip Surat Berbasis Web

## Tujuan Proyek
Tujuannya adalah untuk memudahkan proses pencatatan, penyimpanan, dan pencarian surat masuk dan surat keluar secara efisien dan terstruktur.

## Fitur-fitur Utama
Berdasarkan fungsionalitas yang ada, berikut adalah fitur-fitur utama dari aplikasi ini:

* **Manajemen Arsip Surat**
    * **Unggah Surat Baru:** Mengarsipkan surat dengan mengisi form yang berisi Nomor Surat, Judul, Kategori, dan melampirkan file PDF.
    * **Lihat Daftar Surat:** Menampilkan seluruh surat yang telah diarsipkan dalam format tabel yang informatif.
    * **Pencarian Surat:** Memudahkan pengguna menemukan surat tertentu dengan cepat melalui kolom pencarian.
    * **Detail, Unduh, dan Hapus:** Menyediakan aksi untuk melihat detail, mengunduh file surat, dan menghapus data arsip.

* **Manajemen Kategori Surat**
    * **CRUD Kategori:** Fungsionalitas penuh untuk Tambah, Lihat, Edit, dan Hapus (CRUD) kategori surat.
    * **Pengelompokan Surat:** Kategori digunakan untuk mengelompokkan surat agar lebih terorganisir.

* **Halaman Informasi (About)**
    * Menampilkan detail informasi mengenai pengembang aplikasi, termasuk Nama, Prodi, NIM, dan tanggal pembuatan.

## Cara Menjalankan Aplikasi
Untuk menjalankan aplikasi ini di komputer lokal Anda, ikuti langkah-langkah berikut:

1.  **Clone Repository**
    ```bash
    git clone [https://github.com/purinahdatul/Arsip-Surat.git](https://github.com/purinahdatul/Arsip-Surat.git)
    ```
2.  **Masuk ke Direktori Proyek**
    ```bash
    cd Arsip-Surat
    ```
3.  **Install Dependensi Laravel**
    ```bash
    composer install
    ```
4.  **Konfigurasi Lingkungan (Environment)**
    * Salin file `.env.example` menjadi `.env`.
    * Jalankan perintah untuk membuat kunci aplikasi:
        ```bash
        php artisan key:generate
        ```
5.  **Setup Database**
    * Buat sebuah database baru (misalnya `db_arsip_surat`).
    * Atur konfigurasi database (DB_DATABASE, DB_USERNAME, DB_PASSWORD) di dalam file `.env`.
    * Jalankan migrasi untuk membuat tabel-tabel yang dibutuhkan:
        ```bash
        php artisan migrate
        ```
6.  **Jalankan Server Lokal**
    ```bash
    php artisan serve
    ```
    * Buka browser dan akses alamat `http://127.0.0.1:8000`.


## Screenshot Aplikasi
Berikut adalah beberapa tangkapan layar dari website Arsip Surat yang telah dibuat.

**Halaman Arsip Surat:**
![Tampilan Halaman Login](https://github.com/user-attachments/assets/93a05308-127d-4fff-a360-e97bba8f784e)

**Halaman Unggah Arsip Surat:**
![Tampilan Halaman Login](https://github.com/user-attachments/assets/54d36901-c76f-4019-aaa0-b6694d22970c)

**Halaman Kategori Surat:**
![Tampilan Halaman Dashboard](https://github.com/user-attachments/assets/7e92f872-7958-4451-a19c-99792a00842a)

**Halaman Tambah Kategori Surat:**
![Tampilan Halaman Dashboard](https://github.com/user-attachments/assets/52e2a882-7247-4386-9696-5a7248751958)

**Halaman About:**
![Tampilan Halaman Surat Masuk](https://github.com/user-attachments/assets/b188ae2e-a47b-494d-96f4-55c756201d3f)


# Arsip-Surat
Aplikasi Arsip Surat adalah solusi web untuk mengelola dokumen digital secara efisien. Sistem ini memungkinkan pengguna untuk mengunggah surat PDF, mengklasifikasikannya per kategori, dan melakukan pencarian cepat. Fungsionalitas lengkapnya mencakup kemampuan untuk melihat, mengunduh, mengedit, dan menghapus arsip dengan mudah dan aman.

