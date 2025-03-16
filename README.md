
# WBS - BPKHTL Wilayah XI Yogyakarta

Whistleblowing System yang dibuat menggunakan Laravel adalah sebuah proyek pengembangan aplikasi yang bertujuan untuk memberikan sarana bagi karyawan atau pihak terkait di lingkungan BPKHTL Wilayah XI Yogyakarta untuk melaporkan pelanggaran, tindakan tidak etis, atau praktik korupsi yang terjadi di dalam organisasi.

Aplikasi ini didesain dan dikembangkan dengan menggunakan kerangka kerja Laravel, yang merupakan kerangka kerja PHP yang populer dan kuat untuk pengembangan aplikasi web. Laravel menyediakan berbagai fitur yang memudahkan pengembangan, seperti manajemen routing, database, keamanan, dan lainnya.

Fitur utama dari Whistleblowing System ini mencakup:

### Instalasi :


Install Aplikasi dengan Git Clone HTTPS

```bash
 https://gitlab.com/setiaendra18/app-whistle-blowing-system.git
  cd app-whistle-blowing-system
```
Install Dependencies : Jalankan Composer Install
```bash
composer install
```
Configure Environment Variables
```bash
cp .env.example .env
```
Generate Application Key
```bash
php artisan key:generate
```
Generate Application Key
```bash
php artisan key:generate
```
Run Database Migrations and Seeder
```bash
php artisan migrate --seed
php artisan laravolt:indonesia:seed
```
Jalankan Aplikasi
```bash
http://localhost/app-whistle-blowing-system
http://localhost/app-whistle-blowing-system/login
```
Password and Username
```bash
email : admin@gmail.com
password : 12345
```


