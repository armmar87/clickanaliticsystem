
## Click Analytic System

1. git clone https://github.com/armmar87/clickanaliticsystem.git
2. composer update
3. create db "clickanalytic"
4. create .env file and copied .env.example
5. php artisan vendor:publish --provider="JeroenNoten\LaravelAdminLte\ServiceProvider" --tag=assets
6. php artisan key:generate
7. php artisan migrate
