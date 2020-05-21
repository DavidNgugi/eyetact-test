# Eyetact Interview Test

Built on Laravel 7.0

## Installation:

Ensure you have installed `composer` package manager and `node` on your computer.

Clone this repo, cd into the directory and install the PHP and JS packages

```bash
composer install
````

```bash
npm install && npm run dev
```

Create a new MySQL database to setup the DB credentials in the project's `.env` file.

Run the migration to create all the database tables.

``` bash
php artisan migrate
```

Seed your database with dummy data that I have set up.

``` bash
php artisan db:seed
```

## Run app

Run the following command and then navigate to `http://localhost:8000`

```bash
php artisan serve
```