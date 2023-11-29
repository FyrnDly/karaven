<p align="center"><a href="https://laravel.com" target="_blank"><img src="public/user/assets/icon/karaven_txt.svg" width="400" alt="Karaven Logo"></a></p>

# Tentang Website <img src="public/user/assets/icon/karaven.svg" alt="K Logo" height='26' >araven

Website Karaven dibuat untuk mendukung proses karaoke menggunakan alat <b><i>Karaoke Vending Machine</i></b> yang telah dibuat di Curug Cikoneng pada 25 November 2023. Website ini diharapkan dapat membantu proses bernyanyi karaoke yang mudah melalui berbagai fitur unggulan, diantaranya:

- `Tampilan yang mudah dipahami dan responsive`
- `Fitur Pencarian Lagu Cepat` menggunakan [Teknologi Algolia](https://www.algolia.com/)
- `Pemutaran Lagu` yang `Mudah` dan `Cepat`
- `Kemudahan` dalam <b>Menambahkan, Mengubah, & Menghapus</b> berbagai Lagu, Genre, Penyanyi, dan Playlist
- `Pembagian Level User` dalam mengelola website

## Cara Menjalankan

### Download File
Download file melalui [repositori github](https://github.com/FyrnDly/karaven) dan ekstrak file tersebut atau melakukan pull dengan menggunakan git
```
git init
git remote add origin https://github.com/FyrnDly/karaven
git pull origin main
```
### Install Vendor
Setelah selesai download lakukan proses installasi semua vendor dan library yang akan digunakan melalui [composer](https://getcomposer.org/) dengan perintah
```
composer install
```
### Konfigurasi environtment
Setelah selesai proses installasi semua vendor dan library, lakukan konfigurasi environtment dengan mengubah nama `.env.example` menjadi <b>`.env`</b>. Kemudian lakukan konfigurasi sebagai berikut.
- <b>Database</b> untuk server mysql default hanya perlu mengubah nama database
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE={nama db}
DB_USERNAME=root
DB_PASSWORD=
```
- <b>APP</b>, konfigurasi APP dengan menambahkan APP_KEY untuk enkripsi website
```
APP_NAME=Karaven
APP_ENV=local
APP_KEY={APP KEY}
APP_DEBUG=true
APP_URL=http://localhost
```
- <b>Mail Server</b>, konfigurasi Mail Server yang digunakan baik menggunakan [MailTrap](https://mailtrap.io/) untuk percobaan pada lokal ataupun menggunkan SMTP Server Langsung
```
MAIL_MAILER=smtp
MAIL_HOST={ Mail host }
MAIL_PORT={ port Mail }
MAIL_USERNAME={ Username Mail Server }
MAIL_PASSWORD={ Password Mail Server }
MAIL_ENCRYPTION={ Metode Enkripsi }
MAIL_FROM_ADDRESS={ From Address }
MAIL_FROM_NAME="${APP_NAME}"
```
- <b>Algolia</b>, konfigurasi algolia untuk proses search sebagai berikut
```
SCOUT_DRIVER=algolia
ALGOLIA_APP_ID={Algolia ID}
ALGOLIA_SECRET={Password Algolia}
```
### Migrasi dan Seed
Setelah environtment berhasil dikonfigurasi, lakukan proses migrasi untuk database dan isi dengan data seeder yang telah disediakan menggunakan perintah
```
php artisan migrate:fresh --seed
```
### Jalankan Website
Setelah berhasil melakukan migrasi dan seeder, jalankan website menggunakan perintah
```
php artisan serve
```