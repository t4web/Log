# Log
ZF2 Module. For logging anything

Installation
------------
### Main Setup

#### By cloning project

Clone this project into your `./vendor/` directory.

#### With composer

Add this project in your composer.json:

```json
"require": {
    "t4web/log": "~1.0.0"
}
```

Now tell composer to download Authentication by running the command:

```bash
$ php composer.phar update
```

#### Post installation

Enabling it in your `application.config.php`file.

```php
<?php
return array(
    'modules' => array(
        // ...
        'T4web\Log',
    ),
    // ...
);
```

Configuring
------------
For define custom scopes, describe it in config:

```php
't4web-log' => [
   'scopes' => [
       1 => 'general',
       2 => 'payments',
       3 => 'users',
       4 => 'background-jobs',
   ],
],
```

Using
------------
```php
$logger = $this->getServiceLocator()->get(\T4web\Log\Logger::class);
$logger->log('general', 'test message');
$logger->log('general', 'test message', \T4web\Log\Logger::PRIORITY_ERR, ['file' => __FILE__, 'line' => __LINE__]);
```

If you use `t4web\admin` it will looks like this:
![log list](http://teamforweb.com/var/admin-log-2.jpg)
