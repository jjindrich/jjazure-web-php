# JJWeb PHP site in docker
This project contains simple PHP website. This website is packaged into docker container.
Container is hosted in Azure Web App.

![Image](media/screen.png)

## Create docker image
Define first dockerfile based on <a href="https://hub.docker.com/_/php/">documentation</a>.
We have dockerfile with simple php webpage.

### Compile image
Get sourcecode from this repository and run:
```
docker build jjwebphp -t jjwebphp
docker images
```
### Test image
Run docker image locally, check you have docker support on your machine.
```
docker run -p 80:80 jjwebphp
```
Run browser with <a href="http://localhost">http://localhost</a>

## Upload image into docker repository
We will use Azure Container Repository service.
Create new service with name jjreg.azurecr.io

Login into new Azure Container Repository with provided credetials - found on Access keys
```
docker login jjreg.azurecr.io -u jjreg -p <password>
```
Tag your docker image and upload image into repository. You 
```
docker tag jjwebphp jjreg.azurecr.io/jjwebphp
docker push jjreg.azurecr.io/jjwebphp
```

## Create Azure Web App for containers
Browse Azure portal and create new service Web App for Containers (Microsoft publisher) - name jjweblinux.
Select Azure Container Repository, specify images and click Create.
![Image](media/webapp.png)

Browse website <a href="http://jjweblinux.azurewebsites.net">http://jjweblinux.azurewebsites.net</a>

## Monitor with Application Insights
Azure Application Insights gives you great telemetry about using your website.
To enable it, go to Web App, select Monitoring section and enable AI. The resource in Azure will be created.

php ~/composer.phar install

Now extend you php web application based on <a href="https://github.com/Microsoft/ApplicationInsights-php">Application Insights for PHP</a>.

