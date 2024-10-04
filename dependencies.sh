# !/bin/bash
composer require filament/filament:"^3.2" -W

php artisan filament:install --panels

php artisan make:filament-user
