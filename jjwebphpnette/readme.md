# JJ Web PHP web running Nette framework
About Nette https://nette.org/en/download

## Create Nette project and run

Create new Nette project or use example (used https://github.com/nette/examples/tree/master/Fifteen)
```
composer create-project nette/web-project
composer update
php -S localhost:80 -t www
```

## Prepare docker image and run
```
docker build jjwebphpnette -t jjwebphpnette
docker run -p 80:80 jjwebphpnette
```

Open browser with url http://localhost/www

## Deploy to Azure Container Registry

TODO

## Run in Azure Container Instance

TODO