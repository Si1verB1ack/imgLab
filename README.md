start mysql service in Xammp.

composer update

cp .env.example .env

php artisan key:generate

php artisan:migrate

php artisan db:seed

php artisan serve
