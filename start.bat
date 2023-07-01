%systemDrive%\xampp\mysql\bin\mysql -uroot -e "CREATE DATABASE IF NOT EXISTS lingualight_portal;"
php -r "copy('.env.example', '.env');"
call composer install
call php artisan key:generate
cd public
rmdir storage
cd ..
call php artisan storage:link
call php artisan migrate:fresh --seed
start http://127.0.0.1:8000
call php artisan serve
