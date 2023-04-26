<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# DevStagram

The project is a social network for developers, where they can share their projects and comment on other projects.

## General Information

The project was developed with Laravel 9, using the Docker setup provided by Laravel Sail. Was created to practice the
use
of Laravel, and get familiar with the framework and its features.

## Technologies

- Laravel 9
- Laravel Sail
- Tailwind CSS
- Livewire
- PHP 8.1
- MySQL 8.0
- Docker

## Features

- Authentication
- User profile
- Follow/Unfollow users
- Create/Delete posts
- Comment posts
- Like/Unlike posts
- Feed with posts of the users that you follow

## Requirements

To run the project you need to have installed:

- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)
- [PHP 8.1](https://www.php.net/)
- [Composer](https://getcomposer.org/)

## Setup

After clone the repository you need install the dependencies:

```bash
composer update
```

```bash
./vendor/bin/sail composer install
```

```bash
./vendor/bin/sail npm install
```

Now you need to create an `.env` file and copy the content of `.env.example` to it. You can use the next command:

```bash
cp .env.example .env
```

After that to run the project use the next commands

```bash
./vendor/bin/sail up -d
```

```bash
./vendor/bin/sail artisan migrate
```

```bash
./vendor/bin/sail npm run dev
```

Now you can access the project in http://localhost

If you have problems with the validations of the forms, you can run the next command or project root dir to install the
validation in spanish:

```bash
git clone https://github.com/MarcoGomesr/laravel-validation-en-espanol.git resources/lang
```

Then open the `resources/lang/es/validation.php` file and add the next code to the end of the file:

```php
'attributes' => [
  'name' => 'nombre',
  'username' => 'usuario',
  'email' => 'correo electrónico',
  'password' => 'contraseña',
  'title' => 'título',
  'description' => 'descripción',
  'image' => 'imagen',
  'comment' => 'comentario'
],
```

This allows us to translate the attributes of the forms to spanish.

## Demo

You can see a demo of the project in [DevStagram](https://devstagram.angelcruzl.dev)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
