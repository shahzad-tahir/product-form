# Product Form APP

This application is build on Laravel Framework 10.

## Installation

Clone the repository-
```
https://github.com/shahzad-tahir/product-form.git
```

Then cd into the folder with this command-
```
cd product-form
```

Then do a composer update
```
composer update
```

Then create a environment file using this command-
```
cp .env.example .env
```

I am using Database Json Laravel - php flat file database based on JSON files Library to use JSON files like a database.
Reference: https://github.com/alvin0/database-json-laravel

Now run this command to create database file-
```
php artisan databasejson:migrate 
```

Generate application key, which will be used for password hashing, session and cookie encryption etc.
```
php artisan key:generate
```

## Run server

Run server using this command-
```
php artisan serve
```

Then go to `http://localhost:8000` from your browser and see the app.
