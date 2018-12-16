# Omniship: Royal Mail

**Royal Mail driver for the Omniship PHP shipping carrier library**

[Omniship](https://github.com/cjario/omniship-common) is a framework agnostic, multi-carrier shipping
library for PHP. This package implements Royal Mail support for Omniship.

## Installation

Omniship is installed via [Composer](http://getcomposer.org/). To install, simply require `cjario/omniship-royal-mail` with Composer:

```
composer require cjario/omniship-royal-mail
```


## Basic Usage

The following carriers are provided by this package:

* Royal Mail

For general usage instructions, please see the main [Omniship](https://github.com/cjario/omniship-common)
repository.

### Basic example

```php
$carrier = \Omniship\Omniship::create('RoyalMail');  
$carrier->initialize([
    'clientId' => Yii::$app->params['clientId'],
    'clientSecret' => Yii::$app->params['clientSecret']
]);


// Get the JWT token for authorization
$resp = $carrier->token([
    'username' => Yii::$app->params['username'],
    'password' => Yii::$app->params['password']
])->send();


 print_r($resp->getData());

```


## Support

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/cjario/omniship-royal-mail/issues),
or better yet, fork the library and submit a pull request.