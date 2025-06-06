# 🎉 Hadirin – Aplikasi Manajemen Kehadiran

Hadirin adalah aplikasi berbasis web yang dibuat dengan Laravel untuk mengelola data kehadiran acara. Cocok digunakan untuk seminar, workshop, rapat, atau event lainnya yang memerlukan registrasi dan rekap kehadiran peserta.

---

## ✨ Fitur Utama

- 👥 Data pengguna
- 📅 CRUD data event (buat, edit, hapus acara)
- ✅ Presensi kehadiran oleh 
- 📊 Rekapitulasi data kehadiran
- 📥 Export data ke Excel atau PDF *(opsional)*

---

## 🛠️ Teknologi yang Digunakan

- **Framework:** Laravel 10
- **Database:** MySQL
- **Frontend:** Blade Template, TailwindCSS

---
## 📸 Tampilan Antarmuka

### Halaman Utama
![Halaman Utama](screenshots/1.png)
![Halaman Utama](screenshots/2.png)
![Halaman Utama](screenshots/3.png)

### Halaman Input Anggota
![Kelola  Anggota](screenshots/4.png)
![Kelola  Anggota](screenshots/5.png)
![Kelola  Anggota](screenshots/6.png)

### Halaman Input Kegiatan
![Kelola  Kegiatan](screenshots/8.png)
![Kelola  Kegiatan](screenshots/7.png)
![Kelola  Kegiatan](screenshots/9.png)

### Halaman Generate ID
![Generate  ID](screenshots/10.png)

### Halaman Scan Kehadiran
![Scan](screenshots/11.png)

### Halaman Laporan Harian
![Print](screenshots/12.png)
### Halaman laporan BUlanan
![Print](screenshots/13.png)
### Halaman Print ID
![print](screenshots/14.png)

## 🚀 Instalasi

Ikuti langkah-langkah berikut untuk menjalankan project ini di komputer lokal kamu:

```bash
# 1. Clone repository ini
git clone https://github.com/icanpatra/hadirin.git
cd hadirin

# 2. Install dependensi PHP
composer install

# 3. Install dependensi frontend (jika menggunakan Vite/Tailwind)
npm install && npm run dev

# 4. Salin file environment dan generate key
cp .env.example .env
php artisan key:generate

# 5. Buat database dan sesuaikan koneksi di .env
# Kemudian jalankan migrasi + seeder (opsional)
php artisan migrate --seed

# 6. Jalankan server lokal
php artisan serve
