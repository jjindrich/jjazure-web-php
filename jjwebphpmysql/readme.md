# JJWeb PHP with MySql

## Deployment in Azure

It creates

- Azure Database for MySql (without SSL enforcement)
- Virtual Machine Ubuntu

Run ARM deployment [deploy.ps1](/arm-deploy/deploy.ps1)

Login into VM with SSH and run [install.sh](/src-php/install.sh)

## Run connectivity test

```bash
watch -n 1 time php -f select.php
php -f select.php
```

```bash
Connected in 0.04613208770752 seconds
Connected in 0.036362886428833 seconds
Connected in 0.04773998260498 seconds
Connected in 0.047152996063232 seconds
Connected in 0.054957866668701 seconds
Connected in 0.037756204605103 seconds
Connected in 0.035069942474365 seconds
Connected in 0.038208961486816 seconds
Connected in 0.049767017364502 seconds
Connected in 0.036150932312012 seconds
```

## Run connectivity test with DotNet Core

```bash
dotnet build .
dotnet run bin/Debug/netcoreapp3.1/mysqltest.dll
```

```bash
Connecting mySql...
Executed in 00:00:00.4345362
Executed in 00:00:00.0089680
Executed in 00:00:00.0028932
Executed in 00:00:00.0023729
Executed in 00:00:00.0026272
Executed in 00:00:00.0024963
Executed in 00:00:00.0019841
Executed in 00:00:00.0028826
Executed in 00:00:00.0023343
Executed in 00:00:00.0025311
```
