# PT_apadeh - Web Katalog & Manajemen Produk

Aplikasi web katalog produk dan panel manajemen produk untuk **PT_apadeh** yang dibangun menggunakan framework **Laravel** dan database **MySQL** (phpMyAdmin / XAMPP).

---

## 🚀 Teknologi & Framework yang Digunakan

- **Backend Framework:** [Laravel](https://laravel.com/) (PHP ^8.3)
- **Database:** MySQL / MariaDB (Dikelola menggunakan phpMyAdmin / XAMPP)
- **Frontend & Styling:** Blade Templating, [Tailwind CSS v4](https://tailwindcss.com/), [Vite](https://vitejs.dev/)
- **Package Managers:** [Composer](https://getcomposer.org/) (PHP) & [NPM](https://nodejs.org/) (JavaScript)

---

## ✨ Fitur Utama

### 1. Halaman Publik (Katalog Pengunjung)
- **Katalog Produk:** Menampilkan daftar produk dengan tampilan kartu responsif.
- **Pencarian & Filter:** Mencari produk berdasarkan nama atau memfilter berdasarkan kategori.
- **Detail Produk:** Melihat informasi lengkap spesifikasi, harga, stok, dan deskripsi produk.

### 2. Halaman Admin (Manajemen Produk)
- **CRUD Produk:** Menambah, melihat, mengubah, dan menghapus data produk.
- **Upload Gambar:** Unggah gambar produk yang tersimpan secara terorganisir di storage.
- **Relasi Kategori:** Mengelompokkan setiap produk ke kategori yang sesuai.

---

## 📋 Prasyarat Sistem

Sebelum menjalankan proyek ini, pastikan sistem Anda sudah terinstal:
- **PHP** versi 8.3 atau lebih baru
- **Composer**
- **Node.js** (v18+) & **NPM**
- **XAMPP** (Apache & MySQL) atau server MySQL lainnya

---

## 🛠️ Langkah-langkah Menjalankan Proyek

Ikuti langkah-langkah di bawah ini untuk menjalankan aplikasi di komputer lokal:

### 1. Buka Direktori Proyek
Buka terminal dan arahkan ke direktori proyek:
```bash
cd /Applications/XAMPP/xamppfiles/htdocs/PT_apadeh
```

### 2. Nyalakan XAMPP
Buka aplikasi **XAMPP** dan pastikan service berikut dalam status **Running**:
- **Apache**
- **MySQL**

### 3. Konfigurasi File Environment (`.env`)
Jika file `.env` belum ada, salin dari `.env.example`:
```bash
cp .env.example .env
```

Pastikan konfigurasi database di dalam `.env` sudah sesuai:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pt_apadeh
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Buat Database di phpMyAdmin
1. Buka browser dan kunjungi: [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
2. Buat database baru dengan nama: **`pt_apadeh`** (jika belum dibuat).

### 5. Install Dependensi PHP (Composer)
```bash
composer install
```

### 6. Generate Application Key
```bash
php artisan key:generate
```

### 7. Buat Symbolic Link Storage
Perintah ini menghubungkan folder upload gambar produk ke direktori publik:
```bash
php artisan storage:link
```

### 8. Jalankan Migrasi dan Seeder Database
Jalankan migrasi tabel beserta data awal (kategori dan contoh produk):
```bash
php artisan migrate --seed
```

### 9. Install Dependensi Frontend & Build Asset (NPM)
```bash
npm install
npm run build
```
> **Catatan:** Jika dalam mode pengembangan (development) dan ingin melihat perubahan CSS/JS secara realtime, jalankan:
> ```bash
> npm run dev
> ```

### 10. Jalankan Server Lokal
Jalankan server pengembangan Laravel:
```bash
php artisan serve
```
*(Atau Anda bisa menjalankan `composer run dev` untuk menyalakan Laravel server dan Vite secara bersamaan).*

---

## 🌐 Akses Aplikasi

Setelah server berjalan, Anda dapat mengakses:

| Halaman | URL | Keterangan |
| :--- | :--- | :--- |
| **Katalog Publik** | [http://localhost:8000](http://localhost:8000) | Halaman utama pengunjung & katalog |
| **Panel Admin** | [http://localhost:8000/admin](http://localhost:8000/admin) | Manajemen produk (CRUD) |
| **phpMyAdmin** | [http://localhost/phpmyadmin](http://localhost/phpmyadmin) | Antarmuka basis data MySQL |

---

## 📁 Struktur Direktori Penting

```text
PT_apadeh/
├── app/
│   ├── Http/Controllers/
│   │   ├── ProductController.php  # Controller manajemen produk (Admin)
│   │   └── PublicController.php   # Controller halaman beranda & detail
│   └── Models/
│       ├── Category.php           # Model kategori produk
│       └── Product.php            # Model produk
├── database/
│   ├── migrations/                # Skema tabel database
│   └── seeders/                   # Data awal (seeder kategori & produk)
├── resources/
│   └── views/
│       ├── layouts/               # Layout template (Admin & Public)
│       ├── admin/                 # Blade views untuk panel admin
│       └── public/                # Blade views untuk katalog publik
├── routes/
│   └── web.php                    # Definisi routing aplikasi
├── public/                        # Aset publik & symbolic link storage
└── .env                           # Konfigurasi environment & database
```
