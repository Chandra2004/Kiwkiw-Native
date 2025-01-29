# Kiwkiw - MVC Native PHP Framework

## 📌 Pengenalan

**Kiwkiw** adalah framework PHP berbasis MVC (Model-View-Controller) yang dibuat oleh **Chandra Tri A**. Framework ini dirancang untuk mempermudah pengelolaan proyek PHP dengan arsitektur yang lebih terstruktur dan mendukung fitur seperti migrasi database dan seeder ala Laravel.

## 🚀 Cara Instalasi

### 1️⃣ Clone Proyek

```sh
  git clone https://github.com/Chandra2004/Kiwkiw-Native.git
  cd kiwkiw
```

### 2️⃣ Inisialisasi Composer

```sh
  composer init
```

> **Catatan**: Jangan letakkan file di `src/`, tetapi ubah ke `app/`

### 3️⃣ Konfigurasi Token GitHub (Opsional, jika menggunakan repositori privat)

1. Buka **GitHub** dan masuk ke **Settings**
2. Pilih **Developer settings** > **Personal access tokens** > **Tokens (classic)**
3. Klik **Generate new token** (beri akses ke Composer, misalnya repo)
4. Copy token tersebut
5. Jalankan perintah berikut di terminal:
   ```sh
   composer config --global github-oauth.github.com [TOKEN_GITHUB]
   ```

### 4️⃣ Install Dependensi dengan Composer

```sh
  composer require vlucas/phpdotenv   # Untuk konfigurasi .env
  composer require fakerphp/faker    # Untuk seeder
```

### 5️⃣ Update Namespace Setelah Instalasi

Jalankan update namespace agar autoload berjalan:

```sh
  php update-namespace.php
```

lalu tekan : y

Atau akses melalui browser: `http://localhost/kiwkiw/update-namespace.php`

### 6️⃣ Konfigurasi Tambahan di `composer.json`

Tambahkan konfigurasi berikut di dalam file `composer.json`:

```json
{
    "name": "namaprojek/anda",
    "autoload": {
        "psr-4": {
            "namaprojek\\anda\\": "app/",
            "Database\\": "database/",
            "Database\\Migrations\\": "database/migrations/",
            "Database\\Seeders\\": "database/seeders/"
        }
    },
    "require": {
        "php": ">=8"
    },
    "scripts": {
      "post-install-cmd": [
          "php update-namespace.php"
      ],
      "post-update-cmd": [
          "php update-namespace.php"
      ]
    }
}
```

---

## 📂 Struktur Direktori

```
kiwkiw/
├── app/
│   ├── App/
│   │   ├── Config.php
│   │   ├── Database.php
│   │   ├── Router.php
│   │   ├── View.php
│   ├── Controller/
│   │   ├── HomeController.php
│   ├── Database/
│   │   ├── Migration.php
│   ├── Middleware/
│   │   ├── AuthMiddleware.php
│   │   ├── Middleware.php
│   ├── Models/
│   │   ├── HomeModel.php
│   ├── View/
│   │   ├── interface/
│   │   ├── error404.php
│   │   ├── home.php
├── database/
│   ├── migrations/
│   │   ├── CreateUsersTable.php
│   ├── seeders/
│   │   ├── UserSeeder.php
├── public/
│   ├── .htaccess
│   ├── index.php
├── vendor/
├── .env
├── .gitignore
├── artisan
├── artisan.bat
├── composer.json
├── composer.lock
├── README.md
├── tailwind.config.js
├── update-namespace.php
```

---

## 🔥 Cara Menggunakan Migration dan Seeder

### 🔹 **Migration** (Migrasi Database)

#### 📌 Membuat File Migrasi

Buat file migrasi baru di `database/migrations/` (contoh: `CreateUsersTable.php`).

#### 📌 Menjalankan Migrasi

```sh
  php artisan migrate                    # Jalankan semua migrasi
  php artisan migrate --class=NamaClass  # Jalankan migrasi spesifik
  php artisan migrate:fresh              # Hapus semua tabel, buat ulang, lalu jalankan seeder
  php artisan migrate:refresh            # Hapus dan buat ulang tabel tanpa menjalankan seeder
  php artisan migrate:refresh --class=NamaClass  # Jalankan ulang migrasi tertentu
```

### 🔹 **Seeder** (Mengisi Database dengan Data Dummy)

#### 📌 Membuat File Seeder

Buat file seeder baru di `database/seeders/` (contoh: `UserSeeder.php`).

#### 📌 Menjalankan Seeder

```sh
  php artisan seed                     # Jalankan semua seeder
  php artisan seed --class=NamaClass   # Jalankan seeder spesifik
```

---

## ✨ Kontribusi

Jika ingin berkontribusi, silakan buat pull request atau hubungi saya!

📞 **Kontak**:

- **WhatsApp**: 085730676143
- **Email**: [chandratriantomo123@gmail.com](mailto\:chandratriantomo123@gmail.com)

---

Terima kasih telah menggunakan **Template MVC saya**! 🚀

