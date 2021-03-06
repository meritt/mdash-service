# mdash-service

A realisation php service for an [EMT typographer](https://github.com/emuravjev/mdash) API endpoint, written by Evgeny Muravjev. Works well with [node-mdash](https://github.com/meritt/node-mdash).

## How to run

Download [mdash-service](https://github.com/meritt/mdash-service/archive/master.zip), put it to your host and configure.

#### Configure for Nginx

Assume your site address is `http://mdash.local`, and the folder with to be mdash-service is `/usr/www/mdash.local` then settings will look like this.

```nginx
server {
  listen 80;

  server_name mdash.local;
  index index.php;

  location ~ index\.php$ {
    fastcgi_pass unix:/var/run/php5-fpm.sock;
    fastcgi_index index.php;
    fastcgi_param SCRIPT_FILENAME /usr/www/mdash.local/index.php;
    fastcgi_split_path_info ^(.+\.php)(/.+)$;
  }
}
```

#### Configure for Apache

Assume your site address is `http://mdash.local`, and the folder with to be mdash-service is `/usr/www/mdash.local` then settings will look like this.

```apache
<VirtualHost *:80>
  DocumentRoot /usr/www/mdash.local
  ServerName mdash.local

  <IfModule dir_module>
    DirectoryIndex index.php
  </IfModule>

  <Directory "/usr/www/mdash.local">
    AllowOverride All

    Order allow,deny
    Allow from all
  </Directory>
</VirtualHost>
```

## Supported PHP versions

* PHP >= 5.2

## Author

  - [Alexey Simonenko](https://github.com/meritt)

## License

The public domain license, see the included `License.md` file.