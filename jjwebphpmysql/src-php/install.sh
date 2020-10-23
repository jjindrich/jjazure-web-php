sudo apt update
sudo apt install php php-mysql mysql-client -y

mysql -h jjtestmysql.mysql.database.azure.com -u jj@jjtestmysql -pAzure-12345 -e 'CREATE DATABASE jj;'

php -f setup.php
