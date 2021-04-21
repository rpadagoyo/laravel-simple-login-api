## Laravel - Simple Login API

## Installation

Install packages via Composer.

```bash
composer install
```

Create a copy of .env file from .env.example (Windows)

```bash
copy .env.example .env
```

Create a copy of .env file from .env.example (Linux)

```bash
cp .env.example .env
```

Generate an app_key for your Laravel App

```bash
php artisan key:generate
```

Migrate database and seed some sample data

```bash
php artisan migrate --seed
```

## Usage

Authenticate and get user token

```bash
curl  -H "Accept: application/json" --data "email=kayla.zulauf@example.net&password=password" -X POST http://domain.test/api/login
```
Get user details

```bash
curl -i -H "Accept: application/json" -H "Authorization: Bearer 6|7hkD95s9MR3HcvdD1thtEXW467iRLQnkfHodudu9" -X GET http://domain.test/api/user
```

