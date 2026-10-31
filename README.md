# Website Katalog Indo Jamur Crispy

Pengembangan Katalog Produk Berbasis Website untuk Usaha Indo Jamur Crispy

## Teknologi yang digunakan

- Framework : Laravel 13.x (PHP 8.3)
- Desain UI : Bootstrap 5.3
- Database : MySQL 8.4 LTS

## Menjalankan proyek

Pastikan PHP 8.3, Composer, dan MySQL 8.4 sudah terpasang, lalu MySQL dijalankan

1. `composer install`
2. `copy .env.example .env`, lalu `php artisan key:generate`
3. Buat database `indo_jamur_crispy`
4. `php artisan migrate --seed` (mengisi data contoh, bukan data asli)
5. `php artisan storage:link`
6. `php artisan serve`

## Peran

- Zulfan Akbar Putra - Project Manager
- Ardiash Tegar Bahtiar - Back End
- Frendi Geri Nugratama - Front End
