# JJAzure PHP Nette site with redirect and login

- .htaccess.azure needs to be used on Linux containers to rewrite domain.tld/www to domain.tld.
- Initialize an empty local.neon config in app/config.
- Uncomment line 16 in app/Bootstrap.php to enable Tracy for better debugging.

**Do not forget to remove app cache after every change/deploy if Tracy is disabled. `rm -rf temp/cache/*`**

## Run locally

Create new file app\config\local.neon

```bash
composer update
php -S localhost:80 -t www
```

## Publish with Azure Application Gateway

We will use Azure Application Gateway V2 because we need rewrite rules. Rewrite rule needs some CMS frameworks because of their internal redirect mechanism.

1. Add Backend pool - select AppService or enter your_web.azurewebsites.net
2. Add Listener HTTPS with your certificate and type multiple sites with hostname web.jjdev.org (hostname as certificate common name)
3. Add HTTP-settings with HTTPS and select App Service
4. Create new Rule
5. Create new Rewrites header Request, assign with your rule and set value: for={var_add_x_forwarded_for_proxy};proto={var_request_scheme};host={var_host};by={var_client_ip}

You can check available server variables [here](https://docs.microsoft.com/en-us/azure/application-gateway/rewrite-http-headers#server-variables)

Change config local.neon (or common.neon) to, replace with your ip (REMOTE_ADDR)

```yaml
http:
    proxy: 0.0.0.0/0
```