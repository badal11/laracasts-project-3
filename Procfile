web: vendor/bin/heroku-php-apache2 public/
release: php artisan scout:import 'App\Thread'
sqs: php artisan queue:work --timeout=1800
