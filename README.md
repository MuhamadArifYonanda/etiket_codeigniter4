# Agro-Edutourism E-Ticket Application

## Landing Page

Aplikasi e-tiket agro-edutourism ini adalah sistem pemesanan tiket online untuk atraksi wisata berbasis pertanian dan edukasi. Dikembangkan menggunakan CodeIgniter 4, aplikasi ini memungkinkan pengunjung untuk memilih atraksi, memesan tiket, dan mengatur jadwal kunjungan.

Framework CodeIgniter adalah framework PHP full-stack yang ringan, cepat, fleksibel, dan aman. Informasi lebih lanjut dapat ditemukan di [situs resmi](https://codeigniter.com).

##index default
akses dengan localhost:8080/

## Installation & Updates

Clone repository ini, kemudian jalankan perintah berikut untuk menginstal dependency:

```bash
composer install
```

Untuk memperbarui framework CodeIgniter atau dependency lain, gunakan:

```bash
composer update
```

Jika melakukan update, periksa **release notes** untuk mengetahui apakah ada perubahan yang perlu diterapkan di folder `app`. File yang terpengaruh dapat disalin atau digabung dari `vendor/codeigniter4/framework/app`.

## Setup

Salin file `env` menjadi `.env` dan sesuaikan pengaturannya dengan kebutuhan aplikasi, khususnya `baseURL` dan pengaturan database.

## Perubahan Penting dengan `index.php`

File `index.php` kini berada di dalam folder _public_ untuk keamanan dan pemisahan komponen yang lebih baik.

Konfigurasikan web server Anda untuk mengarahkan ke folder _public_ proyek, bukan ke root proyek. Praktik yang disarankan adalah membuat **virtual host** yang mengarah ke sana.

**Harap** baca panduan pengguna untuk pemahaman lebih lanjut tentang cara kerja CI4!

## Repository Management

Kami menggunakan GitLab issues di repository utama ini untuk melacak **BUG** dan paket kerja **DEVELOPMENT** yang disetujui. Diskusi lebih lanjut tentang **SUPPORT** dan **FEATURE REQUESTS** bisa dilakukan melalui forum [CodeIgniter](http://forum.codeigniter.com).

## Fitur Utama

- **Pemesanan Tiket Online**: Pengguna dapat memilih atraksi yang diinginkan dan menentukan tanggal kunjungan.
- **Manajemen Atraksi**: Admin dapat menambah, mengedit, dan menghapus atraksi.
- **Pengelolaan Data Pengunjung**: Sistem menyimpan data pengunjung serta tiket yang telah dibeli.
- **Laporan Penjualan Tiket**: Menyediakan laporan penjualan tiket untuk analisis bisnis.
- **Upload Gambar**: Mendukung upload gambar untuk setiap atraksi.

## Struktur Database

### Tabel `tiket`

- **kode_tiket**: Kode unik untuk setiap tiket
- **pilihan_atraksi**: Nama atraksi yang dipilih
- **tgl_berkunjung**: Tanggal kunjungan
- **total**: Total harga tiket

### Tabel `data_atraksi`

- **id**: kode_atraksi
- **nama_atraksi**: Nama atraksi
- **deskripsi**: Deskripsi atraksi
- **harga**: harga atraksi

### Tabel `data_deskripsi`

- **id**: kode_deskripsi
- **nama_atraksi**: Nama atraksi
- **deskripsi**: deskripsi
- **gambar**: dokumentasi

### Tabel `data_pengunjung`

- **id**: kode_pengunjung
- **nama_atraksi**: nama_pengunjung
- **deskripsi**: email_pengunjung
- **gambar**: no_hp

## Server Requirements

PHP versi 8.1 atau lebih baru diperlukan, dengan ekstensi berikut yang sudah terpasang:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

**Peringatan**:

- PHP 7.4 sudah tidak didukung sejak 28 November 2022.
- PHP 8.0 sudah tidak didukung sejak 26 November 2023.
- PHP 8.1 akan berakhir pada 31 Desember 2025.
- Pastikan Anda menggunakan versi PHP yang didukung.

# Ada Beberapa fitur yang belum selesai seperti

- **Pengelolaan Data Pengunjung**: Sistem menyimpan data pengunjung serta
- fitur pembayaran

Selain itu, pastikan ekstensi berikut sudah diaktifkan pada PHP Anda:

- json (aktif secara default - jangan dinonaktifkan)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) jika Anda menggunakan MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) jika Anda menggunakan pustaka HTTP\CURLRequest
