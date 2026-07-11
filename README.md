# Media Player

Laravel backend for the media player project.

## Requirements

- PHP 8.4 or newer
- Composer 2
- A database supported by Laravel

## Setup

Install PHP dependencies:

```bash
composer install
```

Create an environment file and application key:

```bash
cp .env.example .env
php artisan key:generate
```

Configure the database connection in `.env`, then run migrations:

```bash
php artisan migrate
```

Start the local server:

```bash
php artisan serve
```

## Verification

Run the PHP 8.4 compatibility checks:

```bash
composer check-platform-reqs
php artisan test
composer audit
```

The project currently targets Laravel 12 and PHP 8.4 through `composer.json`.
