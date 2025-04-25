# 📚 E-Library SMK IDN Akhwat

Selamat datang di repositori **E-Library SMK IDN Akhwat** — sebuah aplikasi perpustakaan digital berbasis web yang memudahkan siswa dalam mencari, meminjam, dan mengembalikan buku secara online.

![Laravel](https://img.shields.io/badge/Laravel-11-red?style=flat-square&logo=laravel)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.x-purple?style=flat-square&logo=bootstrap)
![PHP](https://img.shields.io/badge/PHP-8.x-777bb4?style=flat-square&logo=php)

## ✨ Fitur Unggulan

- 🔐 Autentikasi & Registrasi untuk siswa dan admin
- 📚 Daftar buku terbaru & filter berdasarkan kategori
- 🔍 Fitur pencarian buku
- 📥 Peminjaman dan pengembalian buku
- ⚠️ Notifikasi keterlambatan pengembalian
- 💬 SweetAlert2 untuk pengalaman interaksi yang lebih baik
- 📊 Dashboard terpisah antara Admin dan Siswa
- 📦 Manajemen stok buku otomatis
- 📱 Desain responsif menggunakan Tailwind & Bootstrap

## 🛠️ Teknologi yang Digunakan

- Laravel 11
- Laravel UI Auth
- PHP 8.x
- MySQL
- Bootstrap 5
- SweetAlert2

## 🚀 Cara Menjalankan Proyek

```bash
# 1. Clone repositori ini
git clone https://github.com/username/nama-repo.git

# 2. Masuk ke direktori project
cd nama-repo

# 3. Install dependency Laravel
composer install

# 4. Copy file .env
cp .env.example .env

# 5. Konfigurasi koneksi database di file .env

# 6. Generate application key
php artisan key:generate

# 7. Jalankan migrasi dan seeder
php artisan migrate --seed

# 8. Jalankan server lokal
php artisan serve
