# Laravel

Contoh form sederhana saja dari laravel, cara-cara install :

1. Clone project `git clone muhginanjar/laravel_default`
2. jalankan : `composer install`
3. jalankan : `cp .env.example .env`
4. jalankan : `php artisan key:generate`
5. edit file .env pada database :

       DB_CONNECTION=mysql  
       DB_HOST=127.0.0.1  
       DB_PORT=3306  
       DB_DATABASE=[database yang diinginkan]  
       DB_USERNAME=[username mysql]  
       DB_PASSWORD=[password mysql]

6. jalankan : `php artisan migrate:fresh --seed`
7. jalankan : `php artisan ui bootstrap` untuk mendapatkan css dan js bootstrap 5
8. jalankan : `npm install`
9. jalankan : `npm run build`
10. jalankan :  `php artisan serve` untuk melihat hasil dari proses diatas
