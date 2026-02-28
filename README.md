# Aplikasi Rental Mobil

Aplikasi Rental Mobil berbasis Web sederhana yang dibangun menggunakan bahasa pemrograman PHP Murni (Native MVC pattern) dan menggunakan database MySQL. Aplikasi ini dirancang untuk memudahkan manajemen penyewaan kendaraan, pendataan armada mobil, proses pemesanan, hingga pelaporan.

## 🚀 Fitur Utama

- **Dashboard**: Ringkasan data (Total Mobil, Total Pemesan, Pendapatan, dll).
- **Manajemen Armada (Mobil & Merk)**: Tambah, ubah, hapus, dan detail mobil beserta merknya.
- **Manajemen Transaksi**: 
  - Data Pemesan
  - Data Pesanan
  - Data Perjalanan
  - Jenis Pembayaran
- **Laporan**: Cetak dan kelola laporan rental.
- **Manajemen Akun**: Pengaturan akun admin/pengguna.
- **Desain Modern & Responsif**: Menggunakan template SB Admin 2 yang telah dimodifikasi (Modern styling).

## 🛠️ Teknologi yang Digunakan
- **Bahasa**: PHP (Native MVC)
- **Database**: MySQL (*file sql tersedia `rental_mobil.sql`*)
- **Frontend**: HTML5, CSS3, JavaScript
- **Styling Framework**: Bootstrap (SB Admin 2 custom)
- **Icons**: FontAwesome

## 💻 Cara Instalasi & Menjalankan di Localhost

1. **Clone Repository ini**
   ```bash
   git clone <url-repository-anda>
   ```
2. **Pindahkan folder project** ke direktori server lokal Anda. 
   - Jika menggunakan **XAMPP**, pindahkan folder ke `C:\xampp\htdocs\rental_mobil`.
3. **Konfigurasi Database**
   - Buka phpMyAdmin (http://localhost/phpmyadmin).
   - Buat database baru dengan nama `rental_mobil`.
   - Import file `rental_mobil.sql` yang ada di dalam folder proyek ke database tersebut.
4. **Konfigurasi Proyek (Opsional)**
   - Jika Anda mengubah nama folder proyek, pastikan untuk menyesuaikan konfigurasi `BASE_URL` dan Database pada file `config.php`:
     ```php
     define('BASE_URL', 'http://localhost/rental_mobil/');
     define('APP_NAME', 'Aplikasi Rental Mobil');
     define('DB_HOST', 'localhost');
     define('DB_USER', 'root');
     define('DB_PASS', '');
     define('DB_NAME', 'rental_mobil');
     ```
5. **Jalankan Aplikasi**
   - Buka web browser Anda dan akses: `http://localhost/rental_mobil/`

## 📂 Struktur Direktori Utama

- `/controllers` - Berisi file penanganan logika kontrol aplikasi (MVC).
- `/models` - Berisi fungsi-fungsi untuk berinteraksi dengan Database (MVC).
- `/views` - Antarmuka pengguna (UI) aplikasi (MVC).
- `/core` - File inti (Core MVC architecture).
- `/functions` - Fungsi helper bantuan (seperti `web_function.php`).
- `/assets` & `/sb-admin-2` - Berkas CSS, JS, dan plugin pihak ketiga.
- `/uploads` - Direktori penyimpanan gambar mobil/pengguna.

## 👨‍💻 Kontributor
- [Syauqi]

---
*Dibuat untuk mempermudah manajemen rental kendaraan.*
