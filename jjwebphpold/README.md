# JJWeb PHP site 7.0

This repo prepares PHP docker image running unsupported version of PHP. This image is prepared to run on Azure Web App for Linux.
Website running supported PHP version you can run directly as code.

Supported PHP versions - https://www.php.net/supported-versions.php

## Compile image

```bash
cd jjwebphpold
docker build . -t jjwebphpold
docker images
```

Check container is running locally

```bash
docker run -it -p 80:80 jjwebphpold
```

## Push image to ACR

Create Azure Container Registry and push image. Follow this [tutorial](https://docs.microsoft.com/en-us/azure/container-registry/container-registry-get-started-portal)

```bash
docker login jjakscontainers.azurecr.io -u jjakscontainers -p <ADMIN_PASSWORD>
docker tag jjwebphpold jjakscontainers.azurecr.io/jjwebphpold:v1
docker push jjakscontainers.azurecr.io/jjwebphpold:v1
```

## Run in Azure WebApp for Containers

Browse Azure portal and create new service Web App for Containers (Microsoft publisher) - name jjweblinux.
Select Azure Container Repository, specify images and click Create.

Browse https://jjweblinux.azurewebsites.net

You can check Development Tools -> SSH console is running
