
## Click Analytic System

1. git clone https://github.com/armmar87/clickanaliticsystem.git
2. composer update
3. create .env file and copied .env.example
4. php artisan vendor:publish --provider="JeroenNoten\LaravelAdminLte\ServiceProvider" --tag=assets
5. php artisan key:generate
6. php artisan migrate
