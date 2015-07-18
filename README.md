# PHP Value Objects
A set of [PHP Value Objects](http://aerendir.me/?p=396) to manage composite values.

## Available Value Objects

Currently, this ibrary supports the following Value Objects:

* **Address**: Just a proxy for the library [commerceguys/addressing](https://github.com/commerceguys/addressing);
* **Email**: A basic class derived from [Wowo's gist EmailValueObject](https://gist.github.com/wowo/b49ac45b975d5c489214). It implements [egulias/email-validator](https://github.com/egulias/EmailValidator) to validate emails;
* **Money**: Just a proxy for the library [sebastian/money](https://github.com/sebastianbergmann/money);
* **Phone**: Just a proxy for the library [giggsey/libphonenumber-for-php](https://github.com/giggsey/libphonenumber-for-php);
* **Uri**: Just a proxy for the library [Zend\Uri](https://github.com/zendframework/zend-uri).

## Install via Composer

    $ composer require serendipity_hq/php_value_objects

or, in your composer.json

    "require": {
      "serendipity_hq/php_value_objects": "~0.0"
    }
  

This library follows the http://semver.org/ versioning conventions.

# ! ! ! IMPORTANT NOTES ! ! !

As this library uses sebastian/money, you are required to install the Intl PHP extension in order to use it.

You can find [here](http://aerendir.me/?p=452) instruction about how to do this on a Mac with MAMP.
