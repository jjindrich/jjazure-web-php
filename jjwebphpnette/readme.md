#JJ Web PHP web running Nette framework
About Nette https://nette.org/en/download

## Create Nette project and run
```php
composer create-project nette/web-project
php -S localhost:8000 -t www
```

## Prepare docker image and run
```
docker build jjwebphpnette -t jjwebphpnette
docker run -p 80:80 jjwebphpnette
```