# Service Booking Management System

Sebuah aplikasi web berbasis **Laravel 13** dan **Tailwind CSS v4** yang dirancang untuk mengelola layanan, pelanggan, pemesanan (booking), dan pembayaran. Proyek ini bertujuan untuk mempermudah administrasi dan pelacakan aktivitas pada bisnis berbasis layanan.

## 🚀 Fitur Utama

- **Autentikasi**: Sistem login dan manajemen sesi yang aman.
- **Dashboard**: Halaman ringkasan untuk melihat metrik dan aktivitas sistem.
- **Manajemen User**: Mengelola pengguna sistem dan administrator.
- **Manajemen Customer**: Mendata informasi dan riwayat pelanggan.
- **Manajemen Service**: Mendefinisikan dan mengelola berbagai layanan yang ditawarkan.
- **Sistem Booking**: Membuat, mengubah, dan melacak status pemesanan layanan.
- **Manajemen Payment**: Mencatat dan memantau pembayaran yang terkait dengan pemesanan.

## 🛠️ Teknologi yang Digunakan

- **Backend**: [Laravel 13](https://laravel.com/) (PHP 8.3+)
- **Frontend**: Blade Templates, [Tailwind CSS v4](https://tailwindcss.com/)
- **Build Tool**: [Vite](https://vitejs.dev/)
- **Database**: SQLite / MySQL / PostgreSQL (Dapat dikonfigurasi melalui `.env`)

## ⚙️ Persyaratan Sistem

Sebelum menjalankan proyek ini, pastikan Anda telah menginstal:
- PHP >= 8.3
- Composer
- Node.js & npm

## 📦 Panduan Instalasi & Pengaturan

Ikuti langkah-langkah berikut untuk menjalankan proyek secara lokal:

1. **Masuk ke direktori proyek**:
   ```bash
   cd c:\ujian.humma.rossa
   ```

2. **Instal dependensi PHP**:
   ```bash
   composer install
   ```

3. **Instal dependensi NPM (Frontend)**:
   ```bash
   npm install
   ```

4. **Pengaturan Environment (Lingkungan)**:
   Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database Anda:
   ```bash
   cp .env.example .env
   ```

5. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```

6. **Migrasi Database**:
   Jalankan migrasi untuk membuat tabel-tabel yang diperlukan di database:
   ```bash
   php artisan migrate
   ```
   *(Opsional: Tambahkan `--seed` jika Anda memiliki data awal/seeder)*

7. **Kompilasi Aset Frontend**:
   ```bash
   npm run build
   # Untuk mode development gunakan: npm run dev
   ```

8. **Jalankan Development Server**:
   ```bash
   php artisan serve
   ```
   Aplikasi dapat diakses melalui browser pada `http://localhost:8000`.

## 📂 Struktur Direktori Utama

- `app/Http/Controllers/`: Berisi logika utama aplikasi (Controller) seperti `AuthController`, `BookingController`, `CustomerController`, `PaymentController`, dll.
- `resources/views/`: Berisi antarmuka pengguna (UI) menggunakan Blade, yang disusun rapi dalam folder fitur masing-masing.
- `routes/web.php`: Tempat seluruh definisi rute web aplikasi, menggunakan *resource routing* untuk operasi CRUD standar.

## 📝 Lisensi

Framework Laravel yang digunakan pada proyek ini bersifat open-source dengan lisensi [MIT license](https://opensource.org/licenses/MIT).
