INSTALL :

1. clone repo
2. composer install
4. copy .env.example to .env (edit database info)
5. php artisan key:generate
6. php migrate:fresh --seed
