<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## About this project

PHP course -  Chapter: LARAVEL BASICS by instructor [Jens Simon ](https://github.com/j-simon)

## Vorbereitung

if port 80 is occupied
```bash
sudo service apache2 status
```
or
```bash
sudo service ngnix status
```
```bash
sudo service apache2 stop
```
or
```bash
sudo service nginx stop
```
when mysql is running
```bash
sudo service mysql stop
```

## Installation with docker

#### 1. Clone the project
```bash
git clone https://github.com/zerobitone/collectively.git
```


#### 2. Run `composer install`
Navigate into project folder using terminal and run

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

#### 3. Copy `.env.example` into `.env`
only when the project is initialized for the first time

```bash
cp .env.example .env
```

#### 4. Start the project in detached mode

```bash
./vendor/bin/sail up -d 
```

#### 5. Set encryption key
only when the project is initialized for the first time
```bash
./vendor/bin/sail artisan key:generate --ansi
```

#### 6. Run migrations
only when the project is initialized for the first time
```bash
./vendor/bin/sail artisan make:migration create_laravel_database
```
```bash
./vendor/bin/sail artisan migrate
```
### Access to the docker container
```bash
./vendor/bin/sail bash
```
inside docker container run
```bash
npm install
```
and
```bash
npm run dev
```
### to stop server
```bash
./vendor/bin/sail down -v
```
to start again
```bash
./vendor/bin/sail up -d
```
