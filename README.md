<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling.

## Requirements

See [Server Requirements for Laravel](https://laravel.com/docs/10.x/deployment#server-requirements)

|Software|Version|
|---|---|
|PHP|8.1.7|
|Composer|2.6.5|
|Node|18.16.0|
|NPM|9.5.1|

## Installation

* Clone the project `git clone https://github.com/muath-ye/forum-with-laravel-and-vue.git`
* Run `cd forum-with-laravel-and-vue`
* Run `cp .env.example .env`
* Create database for data and name it `forum_with_laravel_and_vue`
* Create database for testing and name it `forum_with_laravel_and_vue_test`
* Run `composer install`
* Run `php artisan key:generate`
* Run `php artisan migrate`
* Run `npm install`
* Run `npm run dev` or `npm run build`

## Usage

* Run `php artisan serve`
* Open `http://localhost:8000`

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
