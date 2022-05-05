# Run PHP Laravel on Azure

## Create project

https://dockerize.io/guides/php-laravel-guide
https://laravel.com/docs/9.x/installation#installation-via-composer

Create and run project

```
curl -s https://getcomposer.org/installer | php
php composer.phar create-project laravel/laravel jjweblaravel

php artisan serve
```

## Build container

```
docker build -t jjweblaravel .

docker run -it -p 8080:8000  jjweblaravel 
```

