# PT. Maju Jaya Konstruksi - Website Project

Website perusahaan konstruksi dengan Laravel dan Filament Admin Panel.

## Teknologi yang Digunakan

- **Laravel** (versi terbaru)
- **Filament 4** (Admin Panel)
- **Tailwind CSS** (Styling)
- **MySQL/SQLite** (Database)

## Fitur Website

### Frontend (Tidak Perlu Login)
1. **Home Page**
   - Hero section
   - 3 produk unggulan
   - 3 artikel terbaru
   - Deskripsi singkat perusahaan
   - Footer dengan kontak

2. **Tentang Kami**
   - Profil perusahaan
   - Visi & Misi

3. **Produk**
   - Listing semua produk dengan pagination
   - Search produk
   - Filter berdasarkan kategori
   - Halaman detail produk
   - Gallery gambar produk (multiple images)

4. **Artikel**
   - Listing artikel dengan pagination
   - Kategori dan tags
   - Search artikel
   - Halaman detail artikel
   - Featured image, tanggal, dan penulis

5. **Kontak**
   - Form kontak (nama, email, subjek, pesan)
   - Simpan ke database
   - Kirim email ke admin

### Backend (Filament Admin Panel)

#### CRUD Product
- Title
- Slug (auto generate)
- Short description
- Description (rich text editor)
- Price (nullable)
- Category (relasi)
- Images (multiple upload)
- Is featured (boolean)
- Published at

#### CRUD Article
- Title
- Slug (auto generate)
- Excerpt
- Content (rich text editor)
- Featured image
- Category
- Tags (multiple)
- Published at
- Author

#### CRUD Lainnya
- Category
- Tag
- Contact (view only)

## Instalasi

### 1. Clone atau Download Project

```bash
cd "D:\code\tugas web\laravel"
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Setup Environment

Copy file `.env.example` menjadi `.env`:

```bash
copy .env.example .env
```

Edit file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=majujaya_db
DB_USERNAME=root
DB_PASSWORD=

# Atau gunakan SQLite (untuk development)
# DB_CONNECTION=sqlite
# DB_DATABASE=database/database.sqlite
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Setup Database

```bash
# Buat database jika menggunakan MySQL
# Atau pastikan file database.sqlite ada jika menggunakan SQLite

# Jalankan migration
php artisan migrate

# Jalankan seeder
php artisan db:seed
```

### 6. Setup Storage Link

```bash
php artisan storage:link
```

Ini akan membuat symbolic link dari `storage/app/public` ke `public/storage` sehingga gambar dapat diakses dari browser.

### 7. Build Assets

```bash
npm run build
```

Atau untuk development dengan hot reload:

```bash
npm run dev
```

### 8. Jalankan Server

```bash
php artisan serve
```

Website akan tersedia di: `http://localhost:8000`

## Akses Admin Panel (Filament)

1. Buka browser dan kunjungi: `http://localhost:8000/admin`

2. Login dengan kredensial default:
   - **Email**: `admin@majujaya.com`
   - **Password**: `password`

**PENTING**: Setelah login pertama kali, segera ubah password untuk keamanan!

## Testing

### Testing CRUD di Admin Panel

1. **Product CRUD**:
   - Login ke admin panel
   - Klik menu "Produk"
   - Klik "Create" untuk membuat produk baru
   - Isi semua field yang diperlukan
   - Upload beberapa gambar produk
   - Set "Is Featured" jika ingin produk unggulan
   - Set "Published At" untuk menentukan kapan produk dipublikasikan
   - Klik "Create" untuk menyimpan

2. **Article CRUD**:
   - Klik menu "Artikel"
   - Klik "Create" untuk membuat artikel baru
   - Isi semua field
   - Upload featured image
   - Pilih kategori dan tags
   - Set published at
   - Klik "Create" untuk menyimpan

3. **Category & Tag**:
   - Buat kategori dan tags terlebih dahulu sebelum membuat produk/artikel
   - Atau bisa dibuat langsung dari form produk/artikel

### Testing Halaman Frontend

1. **Home Page**:
   - Buka `http://localhost:8000`
   - Pastikan hero section muncul
   - Pastikan 3 produk unggulan ditampilkan
   - Pastikan 3 artikel terbaru ditampilkan

2. **Products Page**:
   - Buka `http://localhost:8000/produk`
   - Test search produk
   - Test filter berdasarkan kategori
   - Klik salah satu produk untuk melihat detail
   - Pastikan gallery gambar muncul di halaman detail

3. **Articles Page**:
   - Buka `http://localhost:8000/artikel`
   - Test search artikel
   - Test filter berdasarkan kategori dan tags
   - Klik salah satu artikel untuk membaca detail

4. **Contact Form**:
   - Buka `http://localhost:8000/kontak`
   - Isi form kontak
   - Submit form
   - Pastikan pesan tersimpan di database
   - Pastikan email terkirim ke admin (cek konfigurasi mail di `.env`)

## Konfigurasi Email

Untuk mengaktifkan pengiriman email, edit file `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

**Catatan**: Untuk Gmail, gunakan App Password, bukan password biasa.

## Struktur Folder

```
laravel/
├── app/
│   ├── Filament/
│   │   └── Resources/          # Filament Resources
│   ├── Http/
│   │   └── Controllers/        # Controllers
│   ├── Mail/                   # Mail Classes
│   └── Models/                 # Eloquent Models
├── database/
│   ├── factories/              # Model Factories
│   ├── migrations/             # Database Migrations
│   └── seeders/                # Database Seeders
├── resources/
│   └── views/                  # Blade Templates
│       ├── layouts/
│       ├── products/
│       ├── articles/
│       └── emails/
├── routes/
│   └── web.php                 # Web Routes
└── storage/
    └── app/
        └── public/             # Uploaded Files
```

## Data Seeder

Seeder akan membuat:
- 1 admin user (email: admin@majujaya.com, password: password)
- 3 kategori
- 5 produk (dengan 2-4 gambar per produk)
- 10 artikel (dengan tags)

## Troubleshooting

### Error: Storage link tidak berfungsi
```bash
# Hapus link yang ada terlebih dahulu
rm public/storage

# Buat ulang
php artisan storage:link
```

### Error: Permission denied pada storage
```bash
# Linux/Mac
chmod -R 775 storage bootstrap/cache

# Windows biasanya tidak ada masalah permission
```

### Error: Class not found
```bash
composer dump-autoload
php artisan config:clear
php artisan cache:clear
```

### Error: Migration failed
```bash
# Reset database (HATI-HATI: akan menghapus semua data)
php artisan migrate:fresh --seed
```

## Support

Jika ada pertanyaan atau masalah, silakan hubungi developer.

## License

Proprietary - PT. Maju Jaya Konstruksi
