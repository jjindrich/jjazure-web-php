# JJAzure PHP Nette site with redirect and login
- .htaccess.azure needs to be used on Linux containers to rewrite domain.tld/www to domain.tld.
- Initialize an empty local.neon config in app/config.
- Uncomment line 16 in app/Bootstrap.php to enable Tracy for better debugging.
- Do not forget to remove app cache after every change/deploy if Tracy is disabled. `rm -rf app/temp/cache/*`
