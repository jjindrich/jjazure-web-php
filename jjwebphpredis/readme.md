# JJWeb PHP with Redis

## Deployment Azure VM with Azure Cache for Redis

Create in Azure

- Virtual Machine Ubuntu
- Azure Cache for Redis - with non-SSL access

Login into VM with SSH and run [install.sh](src-php/install.sh)

### Run test 

```bash
composer require predis/predis

php -f query.php
```