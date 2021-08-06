<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laravel 8 Scaffold

Quickly set up skeleton for your Laravel 8.x app

## Features:
- PHP mess detector: `./vendor/bin/phpmd app,database,routes,tests text phpmd.xml`
- PHP_CodeSniffer: `./vendor/bin/phpcs`
- Auto check coding convention using Github Action
- Authentication by email & password

## Install:
1. Clone this project
2. Run `composer install`
3. Run `npm install & npm run dev`
4. Create .env file : `cp .env.example .env`
5. Generate app key : `php artisan key:generate`
6. Migrate database: `php artisan migrate`
7. Seed database: `php artisan db:seed`
8. Open up web server: `php artisan serve`
9. Browse app: `localhost:8000`
10. Login using test account: Email: `test@haposoft.com` / Password: `123456789`

## Technical support:
- [Skype Group](https://join.skype.com/HxHLdORRW2gO)
- [Facebook Group](https://www.facebook.com/laravelvn/)

## License

[MIT license](https://opensource.org/licenses/MIT).
