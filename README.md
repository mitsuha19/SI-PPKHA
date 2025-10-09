<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/mitsuha19/SI-PPKHA">
    <img src="storage/images/logo.png" alt="Logo" width="80" height="80">
  </a>

<h3 align="center">Sistem Informasi Alumnus dan Karir IT Del</h3>

  <p align="center">
    project_description
    <br />
    <a href="https://github.com/github_username/repo_name"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://github.com/github_username/repo_name">View Demo</a>
    &middot;
    <a href="https://github.com/github_username/repo_name/issues/new?labels=bug&template=bug-report---.md">Report Bug</a>
    &middot;
    <a href="https://github.com/github_username/repo_name/issues/new?labels=enhancement&template=feature-request---.md">Request Feature</a>
  </p>
</div>

<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/mitsuha19/SI-PPKHA">
    <img src="storage/images/logo.png" alt="Logo" width="80" height="80">
  </a>

<h3 align="center">Sistem Informasi Alumnus dan Karir IT Del</h3>

  <p align="center">
    Aplikasi manajemen alumni, pengumuman, berita, dan lowongan kerja untuk IT Del.
  </p>
</div>

## Ringkasan singkat

Repo ini berisi aplikasi Laravel (backend + frontend menggunakan Vite) yang digunakan untuk mengelola data alumnus, survei, lowongan kerja, dan konten situs. README ini berfokus pada langkah cepat untuk menjalankan proyek secara lokal dan praktik dasar untuk menyiapkan deployment ke server produksi.

## Prasyarat (Prerequisites)

Sebelum instalasi, pastikan sistem target memenuhi persyaratan minimal:

-   PHP >= 8.2
-   Composer
-   Node.js >= 18 dan npm / pnpm
-   Database: MySQL / MariaDB / PostgreSQL atau SQLite
-   Ekstensi PHP umum: pdo_mysql (atau pdo_pgsql), mbstring, openssl, fileinfo, tokenizer, xml, ctype

Periksa versi Laravel dan PHP di `composer.json` (project ini menggunakan PHP ^8.2 dan Laravel ^11).

## Instalasi lokal (Quick start)

Ikuti langkah-langkah ini untuk menjalankan aplikasi di lingkungan development (Windows atau Linux).

1. Clone repository

```powershell
git clone https://github.com/mitsuha19/SI-PPKHA.git
cd SI-PPKHA
```

2. Install dependensi PHP

```powershell
composer install
```

3. Salin file environment dan atur variabel

```powershell
copy .env.example .env
# Edit .env sesuai konfigurasi database dan mail
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:ZFLtM7gyW1TbsKBnaZJRfvyuYt2bg8KwyQN2debKwKk=
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_URL=http://localhost

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
# APP_MAINTENANCE_STORE=database

PHP_CLI_SERVER_WORKERS=4

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=si_ppkha
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=log
MAIL_SCHEME=null
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"

API_URL=https://cis-dev.del.ac.id/api
NOCAPTCHA_SITEKEY=6LeDePQqAAAAACoMyLtBkHhjotRVN5nm0ASa85iB
NOCAPTCHA_SECRET=6LeDePQqAAAAAJYUbmPgaP-gT07DyLsvrnHRyare

LOGIN_REQUIRE_CAPTCHA=true
```

4. Generate application key

```powershell
php artisan key:generate
```

5. Siapkan database dan migrasi

Sesuaikan koneksi database di `.env`, lalu jalankan:

```powershell
php artisan migrate
php artisan db:seed # opsional, jika ingin data awal
```

6. Buat symbolic link untuk storage (untuk file upload)

```powershell
php artisan storage:link
```

7. Install dependensi JS dan jalankan Vite (development) atau build (production)

```powershell
npm install
# Untuk development (live reload)
npm run dev
# Untuk production build
npm run build
```

8. Jalankan server lokal (opsional)

```powershell
php artisan serve
# lalu buka http://127.0.0.1:8000
```

## Perintah berguna

-   Jalankan test (jika ada): `php artisan test` atau `vendor\bin\phpunit`
-   Clear cache: `php artisan cache:clear`, `php artisan config:clear`, `php artisan route:clear`, `php artisan view:clear`
-   Optimasi untuk produksi: `php artisan config:cache`, `php artisan route:cache`, `php artisan view:cache`
