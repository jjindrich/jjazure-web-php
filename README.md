# JJWeb PHP site in Azure Web App with Docker
This project contains simple PHP website. This website is packaged into docker container.
Container is hosted in Azure Web App.

![Image](media/screen.png)

## Create docker image

Define first dockerfile based on [documentation](https://hub.docker.com/_/php/).
We have dockerfile with simple php webpage.

### Compile image

Get sourcecode from this repository and run. Dockerfile compiles resources to be working with Web App, check this [link](https://docs.microsoft.com/en-us/azure/app-service/containers/tutorial-custom-docker-image).

```bash
docker build jjwebphp -t jjwebphp
docker images
```

### Test image locally

Run docker image locally, check you have docker support on your machine.

```bash
docker run -it -p 80:80 jjwebphp
```

Run browser with [http://localhost](http://localhost)

## Upload image into docker repository

We will use Azure Container Repository service.
Create new service with name jjcontainers.azurecr.io

Login into new Azure Container Repository with provided credetials - found on Access keys

```bash
docker login jjcontainers.azurecr.io -u jjcontainers -p <password>
docker tag jjwebphp jjcontainers.azurecr.io/jjwebphp
docker push jjcontainers.azurecr.io/jjwebphp
```

## Create Azure Web App for containers

Browse Azure portal and create new service Web App for Containers (Microsoft publisher) - name jjweblinux.
Select Azure Container Repository, specify images and click Create.
![Image](media/webapp.png)

Browse website [http://jjweblinux.azurewebsites.net](http://jjweblinux.azurewebsites.net)

## Monitor with Application Insights

Azure Application Insights gives you great telemetry about using your website (jjwebphpai).
To enable it, go to Web App, select Monitoring section and enable AI. The resource in Azure will be created.
Use [Application Insights for PHP](https://github.com/Microsoft/ApplicationInsights-php) extension.

### Install PHP composer

Install PHP composer to get Application Insights packages.
https://getcomposer.org/download/

### Compile PHP project and compile image

```bash
cd jjwebphpai/src
php ~/composer.phar install

docker build jjwebphpai -t jjwebphp
docker images
```

## JJWeb PHP site in Azure Web App with PHP

This project contains simple PHP website. This website is running in Azure Web App with enabled PHP framework.

How to deploy in Web App ?
https://docs.microsoft.com/en-us/azure/app-service/app-service-web-get-started-php

How to customize Web App settings ?
https://docs.microsoft.com/en-us/azure/app-service/web-sites-php-configure

## JJWeb PHP site in Azure Kubernetes Service

Compile image and publish into Azure Container Registry associated with Azure Kubernetes Service (AKS).

```bash
docker build jjwebphpai -t jjwebphpai
docker tag jjwebphpai jjdotnetcoreaf9d.azurecr.io/jjwebphpai:1
ddocker push jjdotnetcoreaf9d.azurecr.io/jjwebphpai
```

Publish service in AKS

- Run AKS dashboard
- Select Overview and Create an App
- Type your container and Service External

Or you can use json definition from charts folder.

After several minutes there will be published external IP on AKS dashboard.

More details how to leverage AKS use this repo https://github.com/jjindrich/jjazure-web-dotnetcore