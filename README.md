<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# DevStagram

## Setup

To run the project you need install the dependencies:

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

If you have problems with the validations of the forms, you can run the next command or project root dir to install the validation in spanish:

```bash
git clone https://github.com/MarcoGomesr/laravel-validation-en-espanol.git resources/lang
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
