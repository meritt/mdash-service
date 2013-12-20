# mdash-service

A realisation php service for an [EMT typographer](http://mdash.ru) API endpoint, written by Evgeny Muravjev. Works well with [node-mdash](https://github.com/meritt/node-mdash).

## How to run

Download [mdash-service](https://github.com/meritt/mdash-service/archive/master.zip), put it to your host and configure.

#### Configure for Nginx

_TO BE DONE_

#### Configure for Apache

Assume your site address is `http://mdash.local`, and the folder with to be [mdash-service](https://github.com/meritt/node-mdash) is `/usr/www/mdash.local` then settings will look like this.

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

* [Alexey Simonenko](mailto:alexey@simonenko.su), [simonenko.su](http://simonenko.su)

## License

The public domain license, see the included `License.md` file.

[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/meritt/mdash-service/trend.png)](https://bitdeli.com/free "Bitdeli Badge")