**Halaman Publik**
- Daftar artikel 
-  Pencarian artikel
-  Filter berdasarkan kategori
-  Halaman detail artikel


 Admin Panel
-  Sistem login admin
-  Dashboard dengan statistik
-  Buat artikel baru
-  Edit artikel
-  Hapus artikel
-  Preview artikel

  Teknologi

- **Framework**: Laravel 12.x
- **Database**: MySQL
- **Frontend**: Blade Template Engine, Tailwind CSS

**Requirements**

- PHP >= 8.2
- Composer
- MySQL/MariaDB


##  Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/ilhamnobody/blog_ilham.git
cd blog_ilham
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Setup Environment

Copy file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

### 4. Konfigurasi Database

Edit file `.env` dan sesuaikan konfigurasi database:

```sql
CREATE DATABASE blog_ilham;
```

### 6. Migrasi Database & Seeding

Jalankan migration dan seeder untuk membuat tabel dan data awal:

```bash
php artisan migrate --seed
```

### 7. Jalankan Aplikasi

```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`

**Default Login Admin**

Setelah menjalankan seeder, Anda bisa login dengan kredensial berikut:

- **Email**: admin@blogilham.com
- **Password**: password123


##  License

Project ini dibuat untuk keperluan akademis - Ujian Akhir Semester Pemrograman Internet.
