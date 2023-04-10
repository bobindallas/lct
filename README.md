# LCT - Lasek Code Test

This is a rudimentary recipe database app with tags and ingredients for searching (not implemented here)

We're using:

* Laravel 10.6
* PHP 8.2
* Laravel Blueprint => https://github.com/laravel-shift/blueprint
* Laravel Breeze => https://github.com/laravel/breeze
* Tailwind => https://tailwindcss.com/
* Alpine.js => https://alpinejs.dev/

#### Install Instructions:

1) clone repo
2) composer install (or update) - install the rest of the required code
3) create your database (mysql)
4) copy .env.example to .env
5) php artisan key:generate - set the application key 
6) edit .env to set your db name and credentials
7) edit .env to set your SMTP settings and credentials (I used sendinblue)
8) php artisan migrate (or migrate:refresh to clear tables) - run migrations to create tables
9) php artisan db:seed
10) npm install, npm run build
11) register an account

### Video walkthrough:
https://youtu.be/gFtmhHP1KBE
