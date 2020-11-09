# JJWeb PHP with MySql

## Deployment in Azure

It creates

- Azure Database for MySql (without SSL enforcement)
- Virtual Machine Ubuntu

Run ARM deployment [deploy.ps1](arm-deploy/deploy.ps1)

Login into VM with SSH and run [install.sh](src-php/install.sh)

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

If you use **persistent connections**, you will get better performance:

```bash
Connected in 0.046870946884155 seconds
Connected in 0.0019738674163818 seconds
Connected in 0.0019018650054932 seconds
Connected in 0.0018720626831055 seconds
Connected in 0.0020480155944824 seconds
Connected in 0.0020530223846436 seconds
Connected in 0.0018038749694824 seconds
Connected in 0.0020110607147217 seconds
Connected in 0.0025179386138916 seconds
Connected in 0.0014710426330566 seconds
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

## Run connectivity test to mySql running in container

Provision mySql on Azure Container Instance and update connection string to jjtestmysql.westeurope.azurecontainer.io

```bash
php -f select.php
```

Results mysqli driver without persistent connections

```bash
Connected in 0.010722875595093 seconds
Connected in 0.0086610317230225 seconds
Connected in 0.0086190700531006 seconds
Connected in 0.008882999420166 seconds
Connected in 0.0092010498046875 seconds
Connected in 0.0092408657073975 seconds
Connected in 0.0090560913085938 seconds
Connected in 0.010896921157837 seconds
Connected in 0.0089740753173828 seconds
Connected in 0.012285947799683 seconds
```

Results mysqli driver with persistent connections

```bash
Connected in 0.012356042861938 seconds
Connected in 0.0045828819274902 seconds
Connected in 0.0053219795227051 seconds
Connected in 0.0049490928649902 seconds
Connected in 0.0047738552093506 seconds
Connected in 0.0053098201751709 seconds
Connected in 0.005108118057251 seconds
Connected in 0.0053060054779053 seconds
Connected in 0.009221076965332 seconds
Connected in 0.0051779747009277 seconds
```

## Run connectivity test with ProxySql

Install ProxySql on Azure Virtual Machine https://proxysql.com/documentation/installing-proxysql/

```bash
wget https://github.com/sysown/proxysql/releases/download/v2.0.14/proxysql_2.0.14-ubuntu16_amd64.deb
sudo dpkg -i proxysql_2.0.14-ubuntu16_amd64.deb
```

Change config file /etc/proxysql.cnf

```json
mysql_servers =
(
{
address="jjtestmysql.mysql.database.azure.com"
port=3306
hostgroup=0
max_connections=200
}
)

mysql_users:
(
{
username = "jj@jjtestmysql"
password = "Azure-12345"
default_hostgroup = 0
max_connections=1000
default_schema="information_schema"
active = 1
}
)
```

Star it and test it

```bash
service proxysql start
mysql -h 127.0.0.1 -u jj@jjtestmysql -pAzure-12345 -P6033
```

Reconfigure connection string to 127.0.0.1 and port 6033

Results mysqli driver using ProxySql

```bash
Connected in 0.00052285194396973 seconds
Connected in 0.0005338191986084 seconds
Connected in 0.00028514862060547 seconds
Connected in 0.0005338191986084 seconds
Connected in 0.0003349781036377 seconds
Connected in 0.00028300285339355 seconds
Connected in 0.00034594535827637 seconds
Connected in 0.00034999847412109 seconds
Connected in 0.00030279159545898 seconds
Connected in 0.00031113624572754 seconds
```

Results mysqli driver using ProxySql with persistent connections

```bash
Connected in 0.00044393539428711 seconds
Connected in 0.00010299682617188 seconds
Connected in 0.00011301040649414 seconds
Connected in 0.00010299682617188 seconds
Connected in 0.00011682510375977 seconds
Connected in 0.00011491775512695 seconds
Connected in 0.00014400482177734 seconds
Connected in 0.00012302398681641 seconds
Connected in 0.00012516975402832 seconds
Connected in 0.00014281272888184 seconds
```
