#!/bin/bash
set -e

echo "Starting SSH ..."
service ssh start

php /var/www/php/index.php