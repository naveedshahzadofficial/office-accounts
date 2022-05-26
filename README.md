I developed this using Laravel Valet ; PHP 8.1.4 , MySQL 8.0.19. Firstly, you install composer and then get your MySQL running, then launch the server console to install Laravel and the other dependencies. Below are the steps taken:

1. Clone Laravel in folder named 'office-accounts'
```cmd
git clone git@github.com:naveedshahzadofficial/office-accounts.git .
```
2. Install dependencies
```cmd
composer install
```
3. .env file modify with details relevant to your database
```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=office-accounts
DB_USERNAME=****
DB_PASSWORD=********
```
4 At this point you can run your migration to create database table
```cmd
php artisan migrate --seed
```
