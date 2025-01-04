<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Alternative installation is possible without local dependencies relying on [Docker](#docker). 

Clone the repository

    https://github.com/sufianto/Gudang-Logistic.git

Switch to the repo folder

    cd Gudang-Logistic

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (Set the database connection in .env before migrating)

    php artisan migrate

If you need to reset and refresh the database, run:

    php artisan migrate:fresh

Seed the database with initial data

    php artisan migrate --seed

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000


## Login Credentials

To login, use the following credentials:

<ul>
    <li><strong>Email:</strong> admin@gmail.com</li>
    <li><strong>Password:</strong> P@55word</li>
</ul>


## credit
- [framework laravel](https://laravel.com/)
- [bootstrap](https://getbootstrap.com/docs/4.6/getting-started/introduction/)


