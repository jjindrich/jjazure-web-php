# JJWeb PHP with MySql

## Deployment in Azure

It creates

- Azure Database for MySql (without SSL enforcement)
- Virtual Machine Ubuntu

Run ARM deployment [deploy.ps1](/arm-deploy/deploy.ps1)

Login into VM with SSH and run [install.sh](/src-php/install.ps1)

## Run connectivity test

```bash
watch -n 1 time php -f select.php
```

```bash
Connected in 0.04810905456543 seconds
Reading data from table...
Query in 0.00077986717224121 seconds

real    0m0.063s
user    0m0.008s
sys     0m0.008s
```

## Run connectivity test with DotNet Core

```bash
dotnet build .
dotnet run bin/Debug/netcoreapp3.1/mysqltest.dll
```

```bash
Connecting mySql...
Executed in 00:00:00.4223733
```
