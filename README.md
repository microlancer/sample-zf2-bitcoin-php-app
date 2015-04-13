# Sample ZF2 Bitcoin-PHP App

A sample application that uses Zend Framework 2 and the Bitcoin-PHP library.

## Install using composer

```
php composer.phar update
```

## Setup

Edit the config/autoload/local.php with your bitcoin server settings. 

```php
<?php
return array(
    'bitcoin' => array(
        'scheme' => 'http',
        'username' => 'bitcoinrpc',
        'password' => 'C5EBgc3ujAhdBeDraHiRRo8hU2jYeahtar4UuF9rCV7C',
        'address' => '127.0.0.1',
        'port' => 8332,
    ),
);
```


Note, for testing you can try running bitcoind with these parameters:

```
bitcoind -datadir=./data -server -rest -debug
```

Configure the public/.htaccess file (in case you're using a different base directory)

```
RewriteBase /myapp
```

Configure your webserver document root to point to the public folder, and then browse, e.g.

```
http://localhost/myapp/
```

You should see a page that shows you've connected to the bitcoin server and a list of commands.

## Writing your Own ZF2 Bitcoin Apps

You should take a look at the sample code in IndexController.php and composer.json. That's pretty much all you need to get started.

## Contributions

Pull requests are welcome!
