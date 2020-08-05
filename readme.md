<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## Installation (PHP 7.1+)
> 1. `git clone https://github.com/Anntie/getcode.git`
> 2. Create .env - `cp .env.example .env`
> 3. Configure .env
> 4. `composer install`
> 7. `php artisan migrate`
> 8. `php artisan db:seed` 

## Supervisor config example
```
[program:laravel-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /var/www/getcode/artisan queue:work --sleep=3 --tries=3 --daemon
autostart=true
autorestart=true
numprocs=8
user=laradock
redirect_stderr=true
```

