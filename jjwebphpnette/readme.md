# JJ Web PHP web running Nette framework

About Nette https://nette.org/en/download

## Create Nette project and run

Create new Nette project or use example (used https://github.com/nette/examples/tree/master/Fifteen)

```bash
composer create-project nette/web-project
composer update
php -S localhost:80 -t www
```

## Configure Azure Application Insights

Create new Azure Application Insights with type General and get key.

Change key in sourcecode:

- change instrumentationKey in app/presenters/templates/Default.default.latte for client side analytics
- change setInstrumentationKey in app/factories/AIFactory.php for sample backend telemetry

## Prepare docker image and run

```bash
docker build jjwebphpnette -t jjwebphpnette
docker run -p 80:80 jjwebphpnette
```

Open browser with url http://localhost

## Deploy to Azure Container Registry

TODO

## Run in Azure Container Instance

TODO