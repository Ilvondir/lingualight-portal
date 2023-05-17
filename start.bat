%systemDrive%\xampp\mysql\bin\mysql -uroot -e "CREATE DATABASE IF NOT EXISTS lingualight_portal;"
php -r "copy('.env.example', '.env');"
call composer install
call php artisan key:generate
call php artisan storage:link
call php artisan migrate
call php artisan db:seed
call php artisan serve
start http://127.0.0.1:8000
